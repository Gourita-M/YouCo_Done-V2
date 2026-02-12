<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reservation Payment</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
       <a href="../">
                        <h1 class="text-2xl font-bold text-orange-500">TableBooky</h1>
                    </a>

      <nav class="hidden md:flex gap-8 text-sm font-medium">
      <a href="/Restaurants" class="hover:text-orange-500">Restaurants</a>
        <a href="/Favorites" class="hover:text-orange-500">My Favorites</a>
        <a href="/Reserved" class="hover:text-orange-500 transition">Reservations</a>
      </nav>
      @if(Auth::user())
      <div class="flex items-center gap-3">
        <!-- User dropdown container -->
        <div class="relative" id="userMenuContainer">
          <button id="userMenuBtn" class="flex items-center gap-2 text-sm font-medium focus:outline-none cursor-pointer">
            <span>{{ Auth::user()->name }}</span>
            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div id="userDropdown" class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg overflow-hidden max-h-0 transition-all duration-300 ease-in-out" style="pointer-events: none;">
            <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="http://127.0.0.1:8000/user/profile">Profile</a>
          @role('admin')
            <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="./admin/dashboard">Dashboard</a>
          @endrole
          @role('owner')
            <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="./owner/dashboard">Dashboard</a>
          @endrole
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                Log Out
              </button>
            </form>
          
          </div>
        </div>
        @else
        <div class="flex gap-3">
          <a href="./login" class="text-sm font-medium">Sign in</a>
          <a href="./register" class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-orange-600">Register</a>
        </div>
        @endif
      </div>
    </div>
  </header>

<div class="bg-gray-50 min-h-screen flex items-center justify-center">

<div class="w-full max-w-2xl px-4">

  <!-- Main Card -->
  <div class="bg-white shadow-xl rounded-3xl p-8 border">
    <h1 class="text-3xl font-bold text-center mb-6">
      Confirm Your Reservation
    </h1>
    
    <!-- Reservation Summary -->
    <div class="border rounded-2xl p-6 mb-6 bg-gray-50 hover:shadow-md transition">
      <p class="font-semibold text-lg mb-3">Booking Summary</p>
      <div class="space-y-1 text-gray-600 text-sm">
        <p><strong>Restaurant:</strong> {{$Reservation->res}}</p>
        <p><strong>Date:</strong> {{$Reservation->date}}</p>
        <p><strong>Guests:</strong> {{$Reservation->amount}}</p>
      </div>
      <p class="mt-4 text-xl font-bold text-green-600">
        {{$Reservation->total_price}} DH
      </p>
    </div>

    <!-- Payment Info -->
    <div class="mb-6 text-center">
      <p class="font-semibold">Payment Info</p>
      <p class="text-sm text-gray-500">This amount will be added to your meal total.</p>
    </div>

    <button id="paybutton"
      class="w-full bg-orange-500 text-white py-3 rounded-2xl font-semibold
             hover:bg-orange-600 transition shadow-md">
      Pay with PayPal
    </button>

    <p class="text-xs text-gray-400 text-center mt-6">
      Secure sandbox payment via PayPal / Stripe for testing purposes.
    </p>
  </div>

</div>

<!-- Overlay Popup -->
<div id="pay" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50">

  <!-- Modal Box -->
  <div class="bg-white shadow-2xl rounded-3xl p-8 w-full max-w-md relative animate-fadeIn">

    <button onclick="document.getElementById('pay').classList.add('hidden')"
      class="absolute top-3 right-4 text-gray-400 hover:text-black text-xl">
      ✕
    </button>

    <h2 class="text-2xl font-bold text-center mb-6">
      Complete Payment
    </h2>

    <!-- Reservation info -->
    <div class="mb-6 text-center">
      <p class="text-gray-500">Reservation</p>
      <p class="font-semibold">{{$Reservation->res}} Restaurant</p>

      <p class="text-gray-500 mt-4">Amount</p>
      <p class="text-3xl font-bold text-green-600">
        {{$Reservation->total_price}} DH
      </p>
    </div>
        
    <!-- PayPal Button -->
    <form action="{{ Route('paypal.pay', $Reservation->id )}}" method="get">
      @csrf
      <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-black
                     font-semibold py-3 rounded-2xl transition shadow">
        Pay Now
      </button>
    </form>

    <button onclick="document.getElementById('pay').classList.add('hidden')"
      class="block w-full text-center mt-5 text-gray-500 hover:underline">
      Cancel Payment
    </button>

  </div>
</div>

<script>
const pay = document.getElementById('pay');
const paybutton = document.getElementById('paybutton');

paybutton.addEventListener('click', ()=> {
  pay.classList.remove('hidden');
});

 document.addEventListener('DOMContentLoaded', function() {
      const btn = document.getElementById('userMenuBtn');
      const dropdown = document.getElementById('userDropdown');

      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const isOpen = dropdown.style.maxHeight && dropdown.style.maxHeight !== "0px";

        if (isOpen) {
          // Slide up (hide)
          dropdown.style.maxHeight = "0";
          dropdown.style.pointerEvents = "none";
        } else {
          // Slide down (show)
          dropdown.style.maxHeight = dropdown.scrollHeight + "px";
          dropdown.style.pointerEvents = "auto";
        }
      });

      // Close dropdown when clicking outside
      document.addEventListener('click', function() {
        dropdown.style.maxHeight = "0";
        dropdown.style.pointerEvents = "none";
      });

      // Prevent closing when clicking inside dropdown
      dropdown.addEventListener('click', function(e) {
        e.stopPropagation();
      });
    });
</script>

</div>
</body>
</html>