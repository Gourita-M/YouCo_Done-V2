<?php 

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Auth;

  $Restaurant = new RestaurantController;

  $data = $Restaurant->showRestaurantsByUserId(Auth::user()->id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Owner Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

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
          src="{{ asset('storage/restaurants/' . ($restaurant->images[0]->restuarant_image ?? 'default.jpg')) }}"
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

</body>
</html>
