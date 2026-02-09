{{Auth::user()->name}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Restaurant – TableBooky</title>
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
    <a href="./owner/dashboard" class="text-sm font-medium hover:text-orange-500">← Back to Dashboard</a>
  </div>
</header>

<!-- Form -->
<section class="max-w-3xl mx-auto px-6 py-16">
  <div class="bg-white rounded-3xl shadow p-8">
    <h2 class="text-2xl font-bold mb-6">Publish New Restaurant</h2>

    <form method="POST"
      action="{{ route('add.restaurant') }}"
      enctype="multipart/form-data"
      class="space-y-6">
  @csrf

  <!-- Restaurant Name -->
  <div>
    <label class="block text-sm font-medium mb-2">Restaurant Name</label>
    <input name="name" type="text" required
      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none"
      placeholder="Villa Napoli">
  </div>

  <!-- City -->
  <div>
    <label class="block text-sm font-medium mb-2">City</label>
    <input name="city" type="text" required
      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none"
      placeholder="Casablanca">
  </div>

  <!-- Cuisine Type -->
  <div>
    <label class="block text-sm font-medium mb-2">Cuisine Type</label>
    <input name="cuisine_type" type="text" required
      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none"
      placeholder="Italian, Seafood...">
  </div>

  <!-- Address -->
  <div>
    <label class="block text-sm font-medium mb-2">Address</label>
    <input name="adress" type="text" required
      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none"
      placeholder="123 Main Street">
  </div>

  <!-- Capacity -->
  <div>
    <label class="block text-sm font-medium mb-2">Capacity</label>
    <input name="capacity" type="number" min="1" required
      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none"
      placeholder="50">
  </div>

  <!-- Opening Hours -->
  <div>
    <label class="block text-sm font-medium mb-2">Opening Hour</label>
    <input name="openhours" type="time" required
      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">
  </div>

  <!-- Closing Hours -->
  <div>
    <label class="block text-sm font-medium mb-2">Closing Hour</label>
    <input name="closehours" type="time" required
      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">
  </div>

  <!-- Restaurant Image -->
  <div>
    <label class="block text-sm font-medium mb-2">Restaurant Image</label>
    <input name="restuarant_image" type="file" required
      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">
  </div>

  <div>
    <label class="block text-sm font-medium mb-2">Menu Name</label>
    <input name="menutitle" type="test" required
      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">
  </div>

  <button type="submit"
    class="w-full bg-orange-500 text-white py-3 rounded-xl font-semibold hover:bg-orange-600">
    Publish Restaurant
  </button>

</form>

  </div>
</section>

</body>
</html>
