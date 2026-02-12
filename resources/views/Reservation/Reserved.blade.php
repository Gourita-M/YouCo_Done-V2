<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Payment</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<header class="bg-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <a href="../">
      <h1 class="text-2xl font-bold text-orange-500">TableBooky</h1>
    </a>

    <nav class="hidden md:flex gap-8 text-sm font-medium">
      <a href="/Restaurants" class="hover:text-orange-500">Restaurants</a>
      <a href="/Favorites" class="hover:text-orange-500">My Favorites</a>
      <a href="/Reserved" class="hover:text-orange-500">Reservations</a>
    </nav>

    @if(Auth::user())
    <div class="relative" id="userMenuContainer">
      <button id="userMenuBtn" class="flex items-center gap-2 text-sm font-medium">
        <span>{{ Auth::user()->name }}</span>
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div id="userDropdown" class="absolute right-0 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden max-h-0 transition-all duration-300" style="pointer-events:none;">
        <a class="block px-4 py-2 text-sm hover:bg-gray-100" href="/user/profile">Profile</a>
        @role('admin')
        <a class="block px-4 py-2 text-sm hover:bg-gray-100" href="./admin/dashboard">Dashboard</a>
        @endrole
        @role('owner')
        <a class="block px-4 py-2 text-sm hover:bg-gray-100" href="./owner/dashboard">Dashboard</a>
        @endrole
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Log Out</button>
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
</header>

@if(session('success'))
<div id="success-popup" class="fixed top-6 left-1/2 -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg z-50 opacity-0 transition-opacity duration-500">
  {{ session('success') }}
</div>
@endif

<div class="max-w-5xl mx-auto py-10 px-4">
  <h1 class="text-3xl font-bold text-center mb-8">Your Reservations</h1>

  @foreach($reserved as $reserv)
  <div class="bg-white rounded-2xl shadow-md p-6 mb-6 border hover:shadow-lg transition">
    <div class="grid md:grid-cols-2 gap-4 text-gray-700">
      <div><strong>Restaurant:</strong> {{$reserv->name}}</div>
      <div><strong>Date:</strong> {{$reserv->date}}</div>
      <div><strong>Time:</strong> {{$reserv->time_slot}} PM</div>
      <div><strong>Guests:</strong> {{$reserv->amount}}</div>
      <div><strong>Total:</strong> {{$reserv->total_price}} DH</div>
      <div>
        <strong>Status:</strong>
        @if($reserv->status === False)
          <span class="text-yellow-600 font-semibold">Awaiting Payment</span>
        @else
          <span class="text-green-600 font-semibold">Paid</span>
        @endif
      </div>
    </div>

    <div class="flex justify-end mt-6">
      @if($reserv->status === False)
      <a href="/Payment/{{$reserv->id}}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl shadow transition">
        Confirm Online Booking
      </a>
      @else
      <div class="bg-green-500 text-white px-6 py-3 rounded-xl">Paid</div>
      @endif
    </div>
  </div>
  @endforeach
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const btn = document.getElementById('userMenuBtn');
  const dropdown = document.getElementById('userDropdown');

  if(btn){
    btn.addEventListener('click', function(e) {
      e.stopPropagation();
      const isOpen = dropdown.style.maxHeight && dropdown.style.maxHeight !== "0px";
      dropdown.style.maxHeight = isOpen ? "0" : dropdown.scrollHeight + "px";
      dropdown.style.pointerEvents = isOpen ? "none" : "auto";
    });

    document.addEventListener('click', () => {
      dropdown.style.maxHeight = "0";
      dropdown.style.pointerEvents = "none";
    });

    dropdown.addEventListener('click', e => e.stopPropagation());
  }

  const popup = document.getElementById('success-popup');
  if(popup){
    popup.classList.remove('opacity-0');
    popup.classList.add('opacity-100');
    setTimeout(()=>{
      popup.classList.remove('opacity-100');
      popup.classList.add('opacity-0');
    }, 10000);
  }
});
</script>

</body>
</html>
