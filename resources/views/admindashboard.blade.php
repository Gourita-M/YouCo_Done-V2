<?php
  use App\Http\Controllers\AdminController;

  $admin = new AdminController;

  $Data = $admin->index();

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">

  <header class="flex justify-between items-center mb-10">
    <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
 
  </header>

  <!-- Stats -->
  <section class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12">
    <div class="bg-white rounded-xl shadow p-6 text-center">
      <h2 class="text-gray-500 font-semibold">Active Restaurants</h2>
      <p class="text-4xl font-bold mt-2 text-green-600">24</p>
    </div>
    <div class="bg-white rounded-xl shadow p-6 text-center">
      <h2 class="text-gray-500 font-semibold">Pending Registrations</h2>
      <p class="text-4xl font-bold mt-2 text-yellow-600">5</p>
    </div>
    <div class="bg-white rounded-xl shadow p-6 text-center">
      <h2 class="text-gray-500 font-semibold">Total Users</h2>
      <p class="text-4xl font-bold mt-2 text-blue-600">103</p>
    </div>
  </section>

  <!-- Restaurant Management -->
  <section class="bg-white rounded-xl shadow p-6 mb-12">
    <h2 class="text-2xl font-semibold mb-6">Manage Restaurants</h2>
    <table class="w-full border-collapse">
      <thead>
        <tr class="border-b border-gray-300">
          <th class="text-left py-3 px-4">Name</th>
          <th class="text-left py-3 px-4">City</th>
          <th class="text-left py-3 px-4">Status</th>
          <th class="text-left py-3 px-4">Actions</th>
        </tr>
      </thead>
      <tbody>
       @foreach($Data as $dada)
        <tr class="hover:bg-gray-50 border-b border-gray-200">
          <td class="py-3 px-4">{{$dada->name}}</td>
          <td class="py-3 px-4">{{$dada->city}}</td>
          <td class="py-3 px-4 text-green-600 font-semibold">Active</td>
          <td class="py-3 px-4">
            <a href="delete/{{$dada->id}}" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="return confirm('Are you sure You Want To Delete This Restaurant ?')">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </section>

  <!-- Roles & Permissions -->
  <section class="bg-white rounded-xl shadow p-6">
    <h2 class="text-2xl font-semibold mb-6">Roles & Permissions</h2>
    <div class="grid sm:grid-cols-2 gap-8">
      <div>
        <h3 class="text-xl font-semibold mb-3">Roles</h3>
        <ul class="space-y-2">
          <li class="bg-gray-100 p-3 rounded">Admin</li>
          <li class="bg-gray-100 p-3 rounded">Restaurant Owner</li>
          <li class="bg-gray-100 p-3 rounded">User</li>
        </ul>
      </div>
      <div>
        <h3 class="text-xl font-semibold mb-3">Permissions</h3>
        <ul class="space-y-2">
          <li class="bg-gray-100 p-3 rounded">Delete Restaurant</li>
          <li class="bg-gray-100 p-3 rounded">Create Restaurant</li>
          <li class="bg-gray-100 p-3 rounded">Manage Users</li>
        </ul>
      </div>
    </div>
  </section>

</body>
</html>
