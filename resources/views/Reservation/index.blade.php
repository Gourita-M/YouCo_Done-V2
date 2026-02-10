<?= $data ?>
<?= $open ?>
<?= $close ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reservation</title>
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

<div class="bg-gray-100 min-h-screen flex items-center justify-center">


<div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-2xl">
<div class="mb-6 text-center">
<img src="{{ asset('storage/restaurants/' . ($data->images[0]->restaurant_image ?? 'default.jpg')) }}" alt="Restaurant" class="w-full h-40 object-cover rounded-xl mb-3" />
<h1 class="text-2xl font-bold">{{$data->name}}</h1>
<p class="text-gray-500">{{$data->city}} • {{$data->cuisine_type}}</p>
</div>

<br><br>

<form method="POST" action="{{Route('add.Reservation', [$data->id])}}">
@csrf

<div class="mb-6">
    <label class="block mb-2 font-semibold">Select Time Slot</label>

    <div class="grid grid-cols-3 gap-3">
        @for ($hour = $open; $hour <= $close; $hour++)
            <label class="cursor-pointer">
                <input type="radio" name="timeslot" 
                       value="{{ $hour . ':00'}}"
                       class="hidden peer">

                <div class="border rounded-lg py-2 text-center
                            peer-checked:bg-blue-500
                            peer-checked:text-white
                            hover:bg-blue-100">
                    {{ $hour . ':00'}}
                </div>
            </label>
        @endfor
    </div>
</div>

<div class="mb-6">
<label class="block mb-2 font-semibold">Number of Guests</label>
<input name="amount" type="number" min="1" placeholder="2" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 outline-none" required/>
</div>


<button class="w-full bg-blue-500 text-white py-3 rounded-xl font-semibold hover:bg-blue-600 transition">
Confirm Reservation
</button>
</form>
</div>


</div>

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
</div>
</body>
</html>
