<?php print_r($data) ?>
<!DOCTYPE html>
<html lang="en" >
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

    <form action="/restaurant/update" method="POST" enctype="multipart/form-data" class="space-y-8 bg-white rounded-2xl shadow p-8">
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
            <input type="text" id="adress" name="adress" value="123 Main Street"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500" required />
          </div>

          <div>
            <label for="openhours" class="block text-sm font-medium mb-1">Opening Time</label>
            <input type="time" id="openhours" name="openhours" value="09:00"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500" required />
          </div>

          <div>
            <label for="closehours" class="block text-sm font-medium mb-1">Closing Time</label>
            <input type="time" id="closehours" name="closehours" value="23:00"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500" required />
          </div>
        </div>
      </section>

      <section>
        <h2 class="text-xl font-semibold mb-6">Restaurant Image</h2>
        <div class="flex items-center gap-6">
          <img id="imagePreview" src="https://via.placeholder.com/240x160" alt="Restaurant Image"
               class="w-60 h-40 object-cover rounded-xl border" />
          <input type="file" id="restImage" name="restuarant_image" accept="image/*"
                 class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:bg-orange-500 file:text-white
                        hover:file:bg-orange-600" />
        </div>
      </section>

      <section>
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-semibold">Menu & Plats</h2>
          <button type="button" id="addPlatBtn"
                  class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
            + Add Plat
          </button>
        </div>

        <div id="platsContainer" class="space-y-4">

          <div class="border rounded-xl p-4 grid md:grid-cols-4 gap-4 items-center">
            <input type="text" name="plats[0][name]" placeholder="Plat name" value="Chicken Tajine"
                   class="border rounded-lg px-3 py-2" required />

            <input type="number" name="plats[0][price]" placeholder="Price" value="45" min="0"
                   class="border rounded-lg px-3 py-2" required />

            <input type="file" name="plats[0][image]" accept="image/*" class="text-sm text-gray-500" />

            <button type="button" class="removePlatBtn text-red-500 hover:text-red-700 font-semibold">Remove</button>
          </div>

          <div class="border rounded-xl p-4 grid md:grid-cols-4 gap-4 items-center">
            <input type="text" name="plats[1][name]" placeholder="Plat name" value="Beef Burger"
                   class="border rounded-lg px-3 py-2" required />

            <input type="number" name="plats[1][price]" placeholder="Price" value="60" min="0"
                   class="border rounded-lg px-3 py-2" required />

            <input type="file" name="plats[1][image]" accept="image/*" class="text-sm text-gray-500" />

            <button type="button" class="removePlatBtn text-red-500 hover:text-red-700 font-semibold">Remove</button>
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

  <script>

    const restImageInput = document.getElementById('restImage');
    const imagePreview = document.getElementById('imagePreview');

    restImageInput.addEventListener('change', e => {
      const [file] = e.target.files;
      if (file) {
        imagePreview.src = URL.createObjectURL(file);
      }
    });

    const addPlatBtn = document.getElementById('addPlatBtn');
    const platsContainer = document.getElementById('platsContainer');

    let platIndex = 2;

    addPlatBtn.addEventListener('click', () => {
      const platDiv = document.createElement('div');
      platDiv.classList.add('border', 'rounded-xl', 'p-4', 'grid', 'md:grid-cols-4', 'gap-4', 'items-center');

      platDiv.innerHTML = `
        <input type="text" name="plats[${platIndex}][name]" placeholder="Plat name" class="border rounded-lg px-3 py-2" required />
        <input type="number" name="plats[${platIndex}][price]" placeholder="Price" min="0" class="border rounded-lg px-3 py-2" required />
        <input type="file" name="plats[${platIndex}][image]" accept="image/*" class="text-sm text-gray-500" />
        <button type="button" class="removePlatBtn text-red-500 hover:text-red-700 font-semibold">Remove</button>
      `;

      platsContainer.appendChild(platDiv);

      platIndex++;

      platDiv.querySelector('.removePlatBtn').addEventListener('click', () => {
        platDiv.remove();
      });
    });

    document.querySelectorAll('.removePlatBtn').forEach(btn => {
      btn.addEventListener('click', e => {
        e.target.closest('div').remove();
      });
    });
  </script>

</body>
</html>
