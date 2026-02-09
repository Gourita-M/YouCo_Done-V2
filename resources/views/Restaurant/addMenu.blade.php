<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Menu</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

<div class="bg-white shadow-lg rounded-xl max-w-2xl w-full p-8">

  <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">
    Add Plats To Your Menu
  </h1>

  <form action="{{ Route('adding.plats')}}" method="POST" class="space-y-6">
    @csrf
    <!-- Select Menu -->
    <input name="menutid" value="{{$menuname[0]['id']}}" hidden>
    <div>
      <label class="block font-medium mb-2">Menu Name</label>
      <p>{{$menuname[0]['title']}}</p>
    </div>

    <!-- Existing Plats -->
    <div>
      <label class="block font-medium mb-2">Select Existing Plats</label>

      <div class="grid grid-cols-3 gap-3 border rounded-md p-4 bg-gray-50">

      @foreach($PlatsNames as $pla)
        <label class="flex items-center space-x-2">
          <input type="checkbox" name="plats[]" value="{{$pla['id']}}"
            class="accent-orange-500">
          <span>{{$pla['content']}}</span>
        </label>
      @endforeach
      </div>
    </div>

    <!-- Submit -->
    <button
      type="submit"
      class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-md font-semibold transition">
      Save Menu
    </button>

  </form>

</div>

</body>
</html>
