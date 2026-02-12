<?= $id ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Restaurant Details – TableBooky</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-gray-50 text-gray-800">

<header class="bg-white shadow-sm sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <a href="../">
      <h1 class="text-2xl font-bold text-orange-500">TableBooky</h1>
    </a>

    <nav class="hidden md:flex gap-8 text-sm font-medium">
      <a href="/Restaurants" class="hover:text-orange-500 transition">Restaurants</a>
      <a href="/Favorites" class="hover:text-orange-500 transition">My Favorites</a>
       <a href="/Reserved" class="hover:text-orange-500 transition">Reservations</a>
    </nav>

    @if(Auth::user())
    <div class="flex items-center gap-3">
      <div class="relative" id="userMenuContainer">
        <button id="userMenuBtn" class="flex items-center gap-2 text-sm font-medium cursor-pointer">
          <span>{{ Auth::user()->name }}</span>
          <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <div id="userDropdown" class="absolute right-0 mt-2 w-44 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden max-h-0 transition-all duration-300" style="pointer-events: none;">
          <a class="block px-4 py-2 text-sm hover:bg-gray-100" href="http://127.0.0.1:8000/user/profile">Profile</a>

          @role('admin')
          <a class="block px-4 py-2 text-sm hover:bg-gray-100" href="../admin/dashboard">Dashboard</a>
          @endrole

          @role('owner')
          <a class="block px-4 py-2 text-sm hover:bg-gray-100" href="../owner/dashboard">Dashboard</a>
          @endrole

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
              Log Out
            </button>
          </form>
        </div>
      </div>
    </div>
    @else
    <div class="flex gap-3">
      <a href="./login" class="text-sm font-medium">Sign in</a>
      <a href="./register" class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-orange-600">Register</a>
    </div>
    @endif
  </div>
</header>

<section class="max-w-6xl mx-auto px-6 py-10">

  <div class="bg-white rounded-3xl shadow overflow-hidden">

    <div class="relative">
      <img src="{{ asset('storage/restaurants/' . $data->images[0]['restaurant_image'])}}"
           class="w-full h-72 object-cover">
      <div class="absolute inset-0 bg-black/30"></div>
      <h2 class="absolute bottom-6 left-6 text-white text-3xl font-bold">
        {{$data['name']}}
      </h2>
    </div>

    <div class="p-8 space-y-6">

      <div class="flex flex-wrap items-center gap-4 justify-between">
        <form action="{{ route('favourite.add') }}" method="POST">
          @csrf
          <input name="restaurentid" type="hidden" value="{{$data['id']}}">
          <button class="px-5 py-2 bg-red-500 text-white rounded-xl hover:bg-red-600 transition shadow">
            ❤️ Add to Favourite
          </button>
        </form>

        <a href="/Reservation/{{$id}}" class="px-6 py-2 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition shadow">
          Reserve Table
        </a>
      </div>

      <p class="text-gray-500">
        {{$data['cuisine_type']}} Cuisine • {{$data['city']}}
      </p>

      <p>
        <span class="font-semibold">Address:</span>
        {{$data['adress']}}
      </p>

      <div class="grid md:grid-cols-3 gap-6 pt-4 text-sm">
        <div class="bg-gray-50 rounded-xl p-4 shadow-sm">
          <span class="font-semibold">Open:</span>
          {{$data['openhours']}} AM
        </div>

        <div class="bg-gray-50 rounded-xl p-4 shadow-sm">
          <span class="font-semibold">Close:</span>
          {{$data['closehours']}} PM
        </div>

        <div class="bg-gray-50 rounded-xl p-4 shadow-sm">
          <span class="font-semibold">Capacity:</span>
          {{$data['capacity']}} People
        </div>
      </div>

    </div>
  </div>
</section>

<section class="max-w-6xl mx-auto px-6 pb-16">

  <h3 class="text-2xl font-semibold mb-6">Menus</h3>

  <div class="bg-white rounded-2xl shadow p-8">

    <h4 class="text-xl font-semibold mb-6 text-orange-500">
      {{$data->menuses[0]['title']}} Menu
    </h4>

    <div class="grid md:grid-cols-2 gap-6">
      @foreach($menuss as $hahooowaaa)
      <div class="border rounded-xl p-5 hover:shadow-lg transition flex justify-between items-center">
        <h5 class="font-medium">{{$hahooowaaa->content}}</h5>
        <span class="text-orange-500 font-semibold">
          {{$hahooowaaa->prize}} DH
        </span>
      </div>
      @endforeach
    </div>

  </div>
</section>

<footer class="bg-gray-900 text-gray-400 py-6 text-center text-sm">
  © 2026 TableBooky — All rights reserved
</footer>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('userMenuBtn');
    const dropdown = document.getElementById('userDropdown');

    btn.addEventListener('click', function(e) {
      e.stopPropagation();
      const isOpen = dropdown.style.maxHeight && dropdown.style.maxHeight !== "0px";

      if (isOpen) {
        dropdown.style.maxHeight = "0";
        dropdown.style.pointerEvents = "none";
      } else {
        dropdown.style.maxHeight = dropdown.scrollHeight + "px";
        dropdown.style.pointerEvents = "auto";
      }
    });

    document.addEventListener('click', function() {
      dropdown.style.maxHeight = "0";
      dropdown.style.pointerEvents = "none";
    });

    dropdown.addEventListener('click', function(e) {
      e.stopPropagation();
    });
  });
</script>

</body>
</html>