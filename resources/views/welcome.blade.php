<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Details</title>
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
   </head>
   <body class="bg-gray-100 p-6">
      <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
         <!-- User Details Section -->
         <div class="mb-6">
            <h2 class="text-2xl font-bold mb-2">User Details</h2>
            <div class="border-b border-gray-200 pb-4">
               <p class="text-gray-600">Name: <span class="font-semibold">{{ $user->name }}</span></p>
               <p class="text-gray-600">Email: <span class="font-semibold">{{ $user->email }}</span></p>
            </div>
         </div>
         <!-- Order section -->
         @if($user->orders->isNotEmpty())
         <div>
            <h2 class="text-2xl font-bold mb-4">Orders</h2>
            <!-- Each Order -->
            @foreach($user->orders as $order)
            <div class="mb-6">
               <div class="bg-gray-100 p-4 rounded-lg shadow-sm mb-4">
                  <h3 class="text-lg font-semibold mb-2">Order ID : <span class="font-semibold">{{ $order->id }}</span></h3>
                  <p class="text-gray-600">Order Date: <span class="font-semibold">{{ $order->order_date }}</span></p>
                  <p class="text-gray-600">Status: <span class="font-semibold text-green-600">{{ $order->status }}</span></p>
                  <p class="text-gray-600">Total Amount: <span class="font-semibold">{{ $order->total_amount }}</span></p>
                  <!-- Payments Section -->
                  <div class="mt-4">
                     <h4 class="text-lg font-bold mb-2">Payments</h4>
                     <ul class="space-y-2">
                        <!-- Each Payment -->
                        @foreach($order->payments as $payment)
                        <li class="bg-white p-4 rounded-lg shadow">
                           <p class="text-gray-600">Payment ID: <span class="font-semibold">{{ $payment->id }}</span></p>
                           <p class="text-gray-600">Amount: <span class="font-semibold">{{ $payment->amount }}</span></p>
                           <p class="text-gray-600">Payment Method: <span class="font-semibold">{{$payment->payment_method}}</span></p>
                           <p class="text-gray-600">Payment Date: <span class="font-semibold">{{$payment->payment_date}}</span></p>
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         @else
         <p class="text-gray-600">No orders found for this user.</p>
         @endif
      </div>
   </body>
</html>
