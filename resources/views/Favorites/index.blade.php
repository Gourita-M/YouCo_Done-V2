<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TableBooky – Your Favorites</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <h1 class="text-2xl font-bold text-orange-500">TableBooky</h1>

      <nav class="hidden md:flex gap-8 text-sm font-medium">
        <a href="/dashboard" class="hover:text-orange-500">Dashboard</a>
        <a href="/Restaurants" class="hover:text-orange-500">Restaurants</a>

        <a href="#" class="hover:text-orange-500">Contact</a>
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

  <div class="mt-10"></div>
  <!-- Favorites Section -->
  <section class="max-w-7xl mx-auto px-6 py-16">
    <div class="flex justify-between items-center mb-10">
      <h3 class="text-2xl font-semibold">Your Favorite Restaurants</h3>
      <a href="/Restaurants" class="text-orange-500 font-medium">Browse More</a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
@if($data)
    @foreach($data as $da)
      <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
        <div class="p-5">
          <h4 class="font-semibold text-lg">{{$da->name}}</h4>
          <p class="text-sm text-gray-500">{{$da->cuisine_type}} • {{$da->city}}</p>
          <div class="flex justify-between items-center mt-4">
          <a href="./details/{{$da->id}}" class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm">
            View Details
          </a>
        </div>
        </div>
      </div>
    @endforeach
@else
    
      <p class="text-center text-gray-500 col-span-full mt-20">You haven't added any favorite restaurants yet.</p>
@endif
    </div>
  </section>
  <div class="mt-40"></div>
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
