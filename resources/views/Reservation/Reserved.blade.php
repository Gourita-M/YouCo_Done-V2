<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Payment</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg">
    <!-- Restaurant Info -->
    <div class="mb-6">
      <h1 class="text-3xl font-bold mb-2">Restaurant Name: <span class="text-blue-600">La Bonne Table</span></h1>
      <p class="text-gray-700">Cuisine: French</p>
      <p class="text-gray-700">Address: 123 Rue de Paris, Paris, France</p>
      <p class="text-gray-700">Phone: +33 1 23 45 67 89</p>
    </div>

    <hr class="my-6">

    <!-- Reservation Info -->
    <div class="mb-6">
      <h2 class="text-2xl font-semibold mb-4">Your Reservation</h2>
      <div class="grid grid-cols-2 gap-4 text-gray-700">
        <div class="font-medium">Date:</div>
        <div>2026-02-10</div>

        <div class="font-medium">Time:</div>
        <div>12:00 PM</div>

        <div class="font-medium">Number of Guests:</div>
        <div>4</div>

        <div class="font-medium">Total Price:</div>
        <div>$200</div>

        <div class="font-medium">Status:</div>
        <div>Pending Payment</div>
      </div>
    </div>

    <!-- Pay Button -->
    <div class="flex justify-end">
      <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
        Pay Now
      </button>
    </div>
  </div>

</body>
</html>
