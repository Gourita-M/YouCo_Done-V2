<?php print_r($data) ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Restaurant</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100">

  <div class="max-w-6xl mx-auto p-6">

    <h1 class="text-3xl font-semibold mb-8">🍽️ Edit Restaurant</h1>

    <form action="{{Route('restaurant.update', [$data->first()->id])}}" method="POST" class="space-y-8 bg-white rounded-2xl shadow p-8">
      @csrf

      <section>
        <h2 class="text-xl font-semibold mb-6">Restaurant Information</h2>
        <div class="grid md:grid-cols-2 gap-6">

          <div>
            <label for="name" class="block text-sm font-medium mb-1">Restaurant Name</label>
            <input type="text" id="name" name="name" value="{{$data->first()->name}}"
              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500" required />
          </div>

          <div>
            <label for="city" class="block text-sm font-medium mb-1">City</label>
            <input type="text" id="city" name="city" value="{{$data->first()->city}}"
              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500" required />
          </div>

          <div>
            <label for="cuisine_type" class="block text-sm font-medium mb-1">Cuisine Type</label>
            <input type="text" id="cuisine_type" name="cuisine" value="{{$data->first()->cuisine_type}}"
              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500" required />
          </div>

          <div>
            <label for="capacity" class="block text-sm font-medium mb-1">Capacity (Seats)</label>
            <input type="number" id="capacity" name="capacity" value="{{$data->first()->capacity}}" min="1"
              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500" required />
          </div>

          <div class="md:col-span-2">
            <label for="adress" class="block text-sm font-medium mb-1">Address</label>
            <input type="text" id="adress" name="adress" value="{{$data->first()->adress}}"
              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500" required />
          </div>

          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Opening Hour</label>
            <select
              name="openhours"
              required
              class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">
              <option value="01:00">01:00 AM</option>
              <option value="02:00">02:00 AM</option>
              <option value="03:00">03:00 AM</option>
              <option value="04:00">04:00 AM</option>
              <option value="05:00">05:00 AM</option>
              <option value="06:00">06:00 AM</option>
              <option value="07:00">07:00 AM</option>
              <option value="08:00">08:00 AM</option>
              <option value="09:00">09:00 AM</option>
              <option value="10:00">10:00 AM</option>
              <option value="11:00">11:00 AM</option>
              <option value="12:00">12:00 AM</option>
            </select>
          </div>

          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Closing Hour</label>
            <select
              name="closehours"
              required
              class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">
              <option value="13:00">13:00 PM</option>
              <option value="14:00">14:00 PM</option>
              <option value="15:00">15:00 PM</option>
              <option value="16:00">16:00 PM</option>
              <option value="17:00">17:00 PM</option>
              <option value="18:00">18:00 PM</option>
              <option value="19:00">19:00 PM</option>
              <option value="20:00">20:00 PM</option>
              <option value="21:00">21:00 PM</option>
              <option value="22:00">22:00 PM</option>
              <option value="23:00">23:00 PM</option>
              <option value="00:00">00:00 PM</option>
            </select>
          </div>
        </div>
      </section>

      <div class="flex justify-end gap-16">
        <button type="submit"
          class="bg-orange-500 text-white px-8 py-3 rounded-xl text-lg hover:bg-orange-600">
          💾 Save Changes
        </button>
        <a href="dashboard"
          class="bg-orange-500 text-white px-8 py-3 rounded-xl text-lg hover:bg-orange-600">
          💾 Cancel
        </a>
      </div>
    </form>
  </div>

</body>

</html>