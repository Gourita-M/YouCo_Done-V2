<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TableBooky – Discover & Book Restaurants</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
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

  <!-- Hero -->
  <section class="bg-gradient-to-r from-orange-50 to-white">
    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-4xl md:text-5xl font-bold leading-tight">Book the best restaurants<br><span class="text-orange-500">in seconds</span></h2>
        <p class="mt-6 text-gray-600 max-w-lg">Discover top restaurants, check availability in real-time, and reserve your table instantly. Restaurant owners can showcase their places and manage bookings easily.</p>
        <div class="mt-8 flex gap-4">
          <a href="/Restaurants" class="bg-orange-500 text-white px-6 py-3 rounded-xl font-medium hover:bg-orange-600">Explore Restaurants</a>
          <a class="border border-orange-500 text-orange-500 px-6 py-3 rounded-xl font-medium hover:bg-orange-50">List Your Restaurant</a>
        </div>
      </div>
      <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de" class="rounded-3xl shadow-lg" alt="Restaurant" />
    </div>
  </section>

  <!-- Restaurant Grid -->
  <section class="max-w-7xl mx-auto px-6 py-16">
    <div class="flex justify-between items-center mb-10">
      <h3 class="text-2xl font-semibold">Popular Restaurants</h3>
      <a href="#" class="text-orange-500 font-medium">View all</a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Card -->
      <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
        <img src="https://images.unsplash.com/photo-1555992336-cbfdb1d3fd12" class="h-48 w-full object-cover" />
        <div class="p-5">
          <h4 class="font-semibold text-lg">Villa Napoli</h4>
          <p class="text-sm text-gray-500">Italian • Downtown</p>
          <div class="flex justify-between items-center mt-4">
            <span class="text-orange-500 font-semibold">⭐ 4.7</span>
            <button class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm">Book</button>
          </div>
        </div>
      </div>

      <!-- Card -->
      <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
        <img src="https://images.unsplash.com/photo-1541544741938-0af808871cc0" class="h-48 w-full object-cover" />
        <div class="p-5">
          <h4 class="font-semibold text-lg">Sea Grill</h4>
          <p class="text-sm text-gray-500">Seafood • Beachside</p>
          <div class="flex justify-between items-center mt-4">
            <span class="text-orange-500 font-semibold">⭐ 4.5</span>
            <button class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm">Book</button>
          </div>
        </div>
      </div>

      <!-- Card -->
      <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
        <img src="https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c" class="h-48 w-full object-cover" />
        <div class="p-5">
          <h4 class="font-semibold text-lg">Tokyo Bites</h4>
          <p class="text-sm text-gray-500">Asian • City Center</p>
          <div class="flex justify-between items-center mt-4">
            <span class="text-orange-500 font-semibold">⭐ 4.8</span>
            <button class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm">Book</button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Owners CTA -->
  <section class="bg-orange-500">
    <div class="max-w-7xl mx-auto px-6 py-16 text-center text-white">
      <h3 class="text-3xl font-bold">Own a restaurant?</h3>
      <p class="mt-4 max-w-xl mx-auto">Join TableBooky and reach thousands of hungry customers. Manage reservations, tables, and visibility from one simple dashboard.</p>
      <button class="mt-8 bg-white text-orange-500 px-8 py-3 rounded-xl font-semibold">Register Your Restaurant</button>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-400">
    <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-4 gap-8">
      <div>
        <h4 class="text-white font-semibold text-lg mb-3">TableBooky</h4>
        <p class="text-sm">Smart restaurant booking platform for customers and owners.</p>
      </div>
      <div>
        <h5 class="text-white font-medium mb-3">Platform</h5>
        <ul class="space-y-2 text-sm">
          <li>How it works</li>
          <li>Restaurants</li>
          <li>For Owners</li>
        </ul>
      </div>
      <div>
        <h5 class="text-white font-medium mb-3">Support</h5>
        <ul class="space-y-2 text-sm">
          <li>Help Center</li>
          <li>FAQ</li>
          <li>Contact</li>
        </ul>
      </div>
      <div>
        <h5 class="text-white font-medium mb-3">Legal</h5>
        <ul class="space-y-2 text-sm">
          <li>Privacy Policy</li>
          <li>Terms of Service</li>
        </ul>
      </div>
    </div>
    <div class="text-center text-sm py-4 border-t border-gray-800">© 2026 TableBooky. All rights reserved.</div>
  </footer>

  <script>
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
</body>

</html>