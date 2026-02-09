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

<header class="bg-white shadow-sm">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">
    <h1 class="text-2xl font-bold text-orange-500">TableBooky</h1>
    <nav class="flex gap-6 text-sm font-medium">
      <a href="#" class="hover:text-orange-500">Restaurants</a>
      <a href="#" class="hover:text-orange-500">Dashboard</a>
    </nav>
  </div>
</header>

<section class="max-w-6xl mx-auto px-6 py-10">

  <div class="bg-white rounded-2xl shadow overflow-hidden">

    <img src="{{ asset('storage/restaurants/' . $data->images[0]['restuarant_image'])}}"
         class="w-full h-64 object-cover">

    <div class="p-6">

        <div class="flex gap-80">
            <h2 class="text-3xl font-bold mb-2">{{$data['name']}}</h2>
            <form action="{{ route('favourite.add') }}" method="POST">
            @csrf
                <input name="restaurentid" type="hidden" value="{{$data['id']}}">
                <button class="flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-xl hover:bg-red-600">
                    ❤️ Add to Favourite
                </button>
            </form>

        </div>

      <p class="text-gray-500 mb-4">
        {{$data['cuisine_type']}} Cuisine • {{$data['city']}} • 
      </p>
      <p><span class="font-semibold">Adress : </span>{{$data['adress']}}</p><br>

      <div class="grid md:grid-cols-3 gap-4 text-sm">

        <div>
          <span class="font-semibold">Open:</span> {{$data['openhours']}} AM
        </div>

        <div>
          <span class="font-semibold">Close:</span> {{$data['closehours']}} PM
        </div>

        <div>
          <span class="font-semibold">Capacity:</span> {{$data['capacity']}} People
        </div>

      </div>

    </div>

  </div>

</section>

<section class="max-w-6xl mx-auto px-6 pb-16">

  <h3 class="text-2xl font-semibold mb-6">Menus</h3>

  <div class="bg-white rounded-xl shadow p-6 mb-8">

    <h4 class="text-xl font-semibold mb-4 text-orange-500">
      {{$data->menuses[0]['title']}} Menu
    </h4>

    <div class="grid md:grid-cols-2 gap-6">
    @foreach($menuss as $hahooowaaa)
      <div class="border rounded-lg p-4 hover:shadow transition">
        <h5 class="font-semibold">{{$hahooowaaa->content}}</h5>
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

</body>
</html>
