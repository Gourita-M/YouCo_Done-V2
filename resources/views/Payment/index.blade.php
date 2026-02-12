<?php print_r($Reservation) ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reservation Payment</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-xl">
    <h1 class="text-2xl font-bold mb-6 text-center">
      Confirm Your Reservation
    </h1>
    
    <!-- Reservation Summary -->
    <div class="border rounded-xl p-4 mb-6 bg-gray-50">
      <p class="font-semibold mb-2">Booking Summary</p>
      <p class="text-sm text-gray-600">Restaurant: Example Restaurant</p>
      <p class="text-sm text-gray-600">Date: 20 Feb 2026</p>
      <p class="text-sm text-gray-600">Guests: 2</p>
      <p class="mt-2 font-bold">Total Price: 50DH</p>
    </div>

    <!-- Payment Choice -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Payment Option</label>

      <div class="flex items-center mb-2 gap-2">
        <input type="radio" name="payment_type" checked />
        <span>Pay Deposit (30%)</span>
      </div>

      <div class="flex items-center gap-2">
        <input type="radio" name="payment_type" />
        <span>Pay Full Amount</span>
      </div>
    </div>

      <button id="paybutton"
        class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold hover:bg-indigo-700 transition mb-2">
        Pay with PayPal
      </button>
    <p class="text-xs text-gray-400 text-center mt-6">
      Secure payment powered by Stripe / PayPal sandbox for testing.
    </p>
  </div>

  <!-- Overlay Popup -->
<div id="pay"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <!-- Modal Box -->
    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md relative">

        <!-- Close button -->
        <button onclick="document.getElementById('pay').classList.add('hidden')"
                class="absolute top-3 right-4 text-gray-500 hover:text-black text-xl">
            ✕
        </button>

        <h2 class="text-2xl font-bold text-center mb-6">
            Complete Payment
        </h2>

        <!-- Reservation info -->
        <div class="mb-6">
            <p class="text-gray-600">Reservation:</p>
            <p class="font-semibold">Restaurant Booking</p>

            <p class="text-gray-600 mt-2">Amount:</p>
            <p class="text-2xl font-bold text-green-600">$10.00</p>
        </div>

        <!-- PayPal Button -->
        <form action="" method="POST">
            @csrf
            <button
                class="w-full bg-yellow-400 hover:bg-yellow-500 
                       text-black font-semibold py-3 rounded-xl 
                       transition duration-300">
                Pay Now
            </button>
        </form>

        <!-- Cancel -->
        <button onclick="document.getElementById('pay').classList.add('hidden')"
                class="block w-full text-center mt-4 text-gray-500 hover:underline">
            Cancel Payment
        </button>

    </div>
</div>

  <script>
      const pay = document.getElementById('pay');
      const paybutton = document.getElementById('paybutton');
      
      paybutton.addEventListener('click', ()=> {
          pay.classList.remove('hidden');

      })
  </script>
</body>
</html>