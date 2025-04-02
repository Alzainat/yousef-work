<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function hotels()
    {
        return view('hotels.index');
    }

    public function contact()
    {
        return view('contact');
    }
}
