<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
       <a href="../">
                        <h1 class="text-2xl font-bold text-orange-500">TableBooky</h1>
                    </a>

      <nav class="hidden md:flex gap-8 text-sm font-medium">
      <a href="/Restaurants" class="hover:text-orange-500">Restaurants</a>
        <a href="/Favorites" class="hover:text-orange-500">My Favorites</a>
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
            @role('admin')
            <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="../admin/dashboard">Dashboard</a>
          @endrole
          @role('owner')
            <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="../owner/dashboard">Dashboard</a>
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