<?= $reserved ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Payment</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  @if(session('success'))
  <div id="success-popup" class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 opacity-0 transition-opacity duration-500">
    ✅  {{session('success')}}
  </div>
  @endif
  <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg">
    <!-- Restaurant Info -->
    <div class="mb-6">
      <h1 class="text-3xl text-center font-bold mb-2">Reservations</h1>
    
    </div>

  @foreach($reserved as $reserv)
   <hr class="my-6">
    <div class="mb-6">
      <h2 class="text-2xl font-semibold mb-4">Your Reservation</h2>
      <div class="grid grid-cols-2 gap-4 text-gray-700">
        <div class="font-medium">Restaurant :</div>
        <div>{{$reserv->name}}</div>

        <div class="font-medium">Date:</div>
        <div>{{$reserv->date}}</div>

        <div class="font-medium">Time:</div>
        <div>{{$reserv->time_slot}} PM</div>

        <div class="font-medium">Number of Guests:</div>
        <div>{{$reserv->amount}}</div>

        <div class="font-medium">Total Price:</div>
        <div>{{$reserv->total_price}}DH</div>

        <div class="font-medium">Status:</div>
      @if($reserv->status === False)
        <div>Await Payment</div>
      @else
        <div>Payed</div>
      @endif
      </div>
      <div class="flex justify-end">
       @if($reserv->status === False)
      <a href="/Payment/{{$reserv->id}}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
        Confirm online booking
      </a>
      @else
        <div class="bg-green-600 text-white px-6 py-3 rounded-lg  transition">
        Payed
        </div>
      @endif
    </div>
    </div>
  @endforeach
  </div>

  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const popup = document.getElementById('success-popup');

      // Show the popup
      popup.classList.remove('opacity-0');
      popup.classList.add('opacity-100');

      // Hide after 10 seconds
      setTimeout(() => {
        popup.classList.remove('opacity-100');
        popup.classList.add('opacity-0');
      }, 10000);
    });
  </script>
</body>
</html>
