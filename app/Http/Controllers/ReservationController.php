<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Hotel;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    // public function index()
    // {
    //     $hotels = Hotel::all();
    //     return view('reservations.index', compact('hotels'));
    // }

    public function showHotel($id)
    {
        $hotel = Hotel::with('rooms')->findOrFail($id);
        return view('reservations.hotel', compact('hotel'));
    }


    public function createReservation(Request $request, $roomId)
    {
        $room = Room::with('hotel')->findOrFail($roomId);
        return view('reservations.create', compact('room'));
    }

    public function checkAvailability(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }

        $roomId = $request->room_id;
        $checkIn = $request->check_in;
        $checkOut = $request->check_out;

        // Check if room is available for the selected dates
        $conflictingBookings = Booking::where('room_id', $roomId)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })->count();

        if ($conflictingBookings > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Room is not available for the selected dates.'
            ]);
        }

        $room = Room::findOrFail($roomId);
        $days = Carbon::parse($checkIn)->diffInDays(Carbon::parse($checkOut));
        $price = $room->price * $days;

        return response()->json([
            'status' => 'success',
            'data' => [
                'available' => true,
                'days' => $days,
                'price' => $price
            ]
        ]);
    }

    public function validateCoupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|exists:coupons,code',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid coupon code'
            ]);
        }

        $coupon = Coupon::where('code', $request->code)
            ->where('expiry_date', '>=', now()->format('Y-m-d'))
            ->first();

        if (!$coupon) {
            return response()->json([
                'status' => 'error',
                'message' => 'Coupon has expired'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'discount' => $coupon->discount,
                'coupon_id' => $coupon->id
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'price' => 'required|numeric|min:0',
            'coupon_id' => 'nullable|exists:coupons,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verify that the room is still available
        $roomId = $request->room_id;
        $checkIn = $request->check_in;
        $checkOut = $request->check_out;

        $conflictingBookings = Booking::where('room_id', $roomId)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })->count();

        if ($conflictingBookings > 0) {
            return redirect()->back()
                ->with('error', 'This room is no longer available for the selected dates.')
                ->withInput();
        }

        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->room_id = $request->room_id;
        $booking->coupon_id = $request->coupon_id;
        $booking->check_in = $request->check_in;
        $booking->check_out = $request->check_out;
        $booking->price = $request->price;
        $booking->status = 'pending';
        $booking->save();

        return redirect()->route('reservations.confirmation', $booking->id)
            ->with('success', 'Your reservation has been created successfully!');
    }

    public function confirmation($id)
    {
        $booking = Booking::with(['room.hotel', 'coupon', 'user'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('reservations.confirmation', compact('booking'));
    }

    public function userReservations()
    {
        $bookings = Booking::with(['room.hotel', 'coupon'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('reservations.my-reservations', compact('bookings'));
    }

    public function cancelReservation($id)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($id);
        
        // Only allow cancellation if check-in date is more than 24 hours away
        if (Carbon::parse($booking->check_in)->subDay()->isPast()) {
            return redirect()->back()
                ->with('error', 'Reservations can only be cancelled more than 24 hours before check-in.');
        }

        $booking->status = 'cancelled';
        $booking->save();

        return redirect()->back()
            ->with('success', 'Your reservation has been cancelled successfully.');
    }
}
?>