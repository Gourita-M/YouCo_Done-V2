<?php 

use App\Http\Controllers\RestaurantController;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;

  $Restaurant = new RestaurantController;

  $data = $Restaurant->showRestaurantsByUserId(Auth::user()->id);

  $notification = Notifications::where('users_id', Auth::user()->id)
                                ->where('seen', false)->First();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Owner Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
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
<section class="max-w-7xl mx-auto px-6 py-14">

  <div class="flex flex-col md:flex-row justify-between md:items-center mb-10 gap-6">
    <div>
      <h2 class="text-3xl font-bold">My Restaurants</h2>
      <p class="text-gray-500 mt-1">Manage and publish your restaurants</p>
    </div>

    <a href="{{ url('addRestaurant') }}"
       class="bg-orange-500 text-white px-6 py-3 rounded-xl font-medium hover:bg-orange-600">
      + Publish New Restaurant
    </a>
  </div>

  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

    @forelse($data as $restaurant)
      <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">

        <img
          src="{{ asset('storage/restaurants/' . ($restaurant->images[0]->restaurant_image ?? 'default.jpg')) }}"
          class="h-48 w-full object-cover"
        >

        <div class="p-5">
          <h3 class="font-semibold text-lg">{{ $restaurant->name }}</h3>

          <p class="text-sm text-gray-500">
            {{ $restaurant->cuisine_type }} • {{ $restaurant->city }}
          </p>

          <p class="text-sm text-gray-500">
            {{ $restaurant->adress }}
          </p>

          <div class="flex justify-between items-center mt-5">

            <a href="{{ url('editRestaurant/'.$restaurant->id) }}"
               class="text-orange-500 text-sm font-medium">
              Edit
            </a>

            <a href="{{ url('addMenu/'.$restaurant->id) }}"
               class="text-blue-500 text-sm font-medium">
              Add Menu
            </a>

            <a href="{{ url('delete/'.$restaurant->id) }}"
               onclick="return confirm('Are you sure you want to delete this restaurant?')"
               class="text-red-500 text-sm font-medium">
              Delete
            </a>

          </div>
        </div>
      </div>

    @empty
      <p class="text-gray-500">No restaurants found.</p>
    @endforelse

  </div>

</section>

@if($notification && $notification->seen === false)
<div id="notification"
     class="fixed top-20 right-6 bg-white shadow-xl rounded-xl p-5 w-80 border border-gray-200 hidden">

    <div class="flex justify-between items-start">
        <h3 class="font-semibold text-lg">Notification</h3>

        <button onclick="closeNotification()"
                class="text-gray-400 hover:text-black text-xl">
            &times;
        </button>
    </div>

    <p class="text-gray-600 mt-2">
        {{$notification->message}}
    </p>
</div>
@endif

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

  function showNotification() {
    const el = document.getElementById('notification');
    el.classList.remove('hidden');

    // Hide after 1 minute (60000 ms)
    setTimeout(() => {
        el.classList.add('hidden');
    }, 60000);
}

function closeNotification() {
    document.getElementById('notification').classList.add('hidden');
}

// Demo auto show
showNotification();
  </script>
</body>
</html>
<?php 

 if($notification)
  $notification->update(['seen' => true]); 

?>