<x-app-layout>
  {{-- <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Contact Us') }}
      </h2>
  </x-slot> --}}
    <style>
     
.body-b {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f3f4f6;
  margin: 0;
  padding: 0;
  /* display: flex;
  justify-content: center;
  align-items: center; */
  min-height: 100vh;
  background-image: linear-gradient(135deg, #b1c9f2, #f3f4f6);
}

.container-c {
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
  padding: 25px;
  width: 85%;
  max-width: 450px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  /* margin-top: 15px; */
}

.container-c:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

/* Heading styles */
h2 {
  color: #3a6f8f;
  text-align: center;
  margin-bottom: 20px;
  font-size: 26px;
  position: relative;
  font-weight: 500;
}

h2:after {
  content: '';
  position: absolute;
  width: 50px;
  height: 2px;
  background-color: #76b3c4;
  bottom: -8px;
  left: 50%;
  transform: translateX(-50%);
  transition: width 0.3s ease;
}

.container-c:hover h2:after {
  width: 80px;
}

/* Form elements styling */
#contact-form {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.inp, textarea {
  padding: 12px;
  border: 1px solid #dfe4e8;
  border-radius: 6px;
  font-size: 14px;
  transition: all 0.3s ease;
  outline: none;
  background-color: #fafafa;
}

.inp:focus, textarea:focus {
  border-color: #76b3c4;
  box-shadow: 0 0 0 2px rgba(118, 179, 196, 0.2);
  background-color: white;
}

/* Button styling */
.bttn {
  background-color: #3a6f8f;
  color: white;
  border: none;
  padding: 12px;
  font-size: 15px;
  font-weight: 500;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.3s ease;
  letter-spacing: 0.5px;
  margin-top: 5px;
}

.bttn:hover {
  background-color: #2d5e72;
  transform: translateY(-2px);
  box-shadow: 0 3px 10px rgba(58, 111, 143, 0.2);
}

.bttn:active {
  transform: translateY(0);
}

/* Feedback message styling */
#feedback, #loading {
  text-align: center;
  margin-top: 12px;
  font-weight: 500;
  font-size: 14px;
}

#feedback {
  color: #5cb85c;
}

#loading {
  color: #3a6f8f;
}

/* Error message styling */
.error-message {
  color: #f44336;
  font-size: 13px;
  margin-top: 5px;
  text-align: center;
}

/* Animation for input fields - softer */
@keyframes gentlePulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.01); }
  100% { transform: scale(1); }
}

.inp:focus, textarea:focus {
  animation: gentlePulse 1.5s infinite;
  border-color: #76b3c4;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .container-c {
    width: 90%;
    padding: 20px;
  }
  
  h2 {
    font-size: 22px;
  }
  
  .inp, textarea, .bttn {
    padding: 10px;
    font-size: 14px;
  }
}

/* Hotel booking specific elements - softer color scheme */
::placeholder {
  color: #c1c9d5;
  opacity: 0.8;
}

.inp:hover, textarea:hover {
  border-color: #c1c9d5;
  background-color: rgba(193, 201, 213, 0.05);
}

/* Success animation - softer */
@keyframes gentleSuccessPulse {
  0% { background-color: #5cb85c; }
  50% { background-color: #4cae4c; }
  100% { background-color: #5cb85c; }
}

#feedback {
  padding: 8px;
  border-radius: 4px;
  animation: gentleSuccessPulse 3s infinite;
}

/* Textarea specific */
textarea {
  height: 120px;
}

main{
  display: flex;
  /* height: 70vh; */
  justify-content: center;
  align-content: center;
  margin: 3vh;
}

    </style>
  <body class="body-b" >
    <div class="container-c">
      <h2>Contact Us</h2>
      <form id="contact-form">
        <input type="text" id="name" placeholder="Name" name="name" required class="inp" />
        <input type="text" id="phone" placeholder="070-000-000-0" name="phone" required class="inp" />
        <input type="email" id="email" placeholder="Email" name="email" required class="inp" />
        <textarea id="message" name="message" placeholder="Your message..." required style="resize: vertical; width: 100%; height: 150px"></textarea>
        <button type="submit" class="bttn">Submit</button>
      </form>
      <p id="loading" style="display: none; color: blue">Sending...</p>
      <p id="feedback" style="display: none; color: green">Your message has been sent successfully!</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function () {
        emailjs.init("Hg_bctqQtq2raKq_1"); // User ID

        $("#contact-form").submit(function (event) {
          event.preventDefault();
          $("#loading").show();
          $("#feedback").hide();
          $(".error-message").remove();

          let name = $("#name").val().trim();
          let email = $("#email").val().trim();
          let phone = $("#phone").val().trim();
          let message = $("#message").val().trim();

          let formValid = true;
          if (!name || !email || !phone || !message) {
            formValid = false;
            showError("All fields are required!");
          }
          if (!validateName(name)) {
            formValid = false;
            showError("Please enter a valid name (only letters).");
          }
          if (!validateEmail(email)) {
            formValid = false;
            showError("Please enter a valid email address.");
          }
          if (!validatePhone(phone)) {
            formValid = false;
            showError("Please enter a valid phone number (10-15 digits).");
          }
          if (!formValid) {
            $("#loading").hide();
            return;
          }

          let params = { name, email, phone, message };
          emailjs.send("service_843dy3s", "template_mgzxx43", params)
            .then(() => {
              $("#feedback").show();
              $("#loading").hide();
              $("#contact-form")[0].reset();
            })
            .catch((error) => {
              alert("Failed to send email.");
              console.error("FAILED...", error);
            })
            .always(() => {
              $("#loading").hide();
            });
        });

        function validateEmail(email) {
          const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          return re.test(String(email).toLowerCase());
        }

        function validateName(name) {
          const re = /^[a-zA-Z؀-ۿ\s]+$/;
          return re.test(String(name));
        }

        function validatePhone(phone) {
          const re = /^\+?\d{10,15}$/;
          return re.test(String(phone));
        }

        function showError(message) {
          let errorSpan = $('<span class="error-message" style="color: red;"></span>').text(message);
          $("#contact-form").append(errorSpan);
        }
      });
    </script>
  </body>
</x-app-layout>
