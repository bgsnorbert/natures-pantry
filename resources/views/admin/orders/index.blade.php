<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Admin dashboard orders
    </x-slot:page_title>
    <x-admin-layout>
        <div class="ml-8">
            <h1 class="text-xl font-bold mb-4">Orders</h1>

            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-2 px-4 border">Order ID</th>
                        <th class="py-2 px-4 border">Customer Name</th>
                        <th class="py-2 px-4 border">Total Amount</th>
                        <th class="py-2 px-4 border">Status</th>
                        <th class="py-2 px-4 border">Payment Method</th>
                        <th class="py-2 px-4 border">Order Date</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td class="py-2 px-4 border">{{ $order->id }}</td>
                        <td class="py-2 px-4 border">{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                        <td class="py-2 px-4 border">${{ number_format($order->total, 2) }}</td>
                        <td class="py-2 px-4 border">{{ ucfirst($order->status) }}</td>
                        <td class="py-2 px-4 border">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</td>
                        <td class="py-2 px-4 border">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="py-2 px-4 border">
                            <form method="POST" action="/admin/orders/{{$order->id}}/status">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-blue-500">Mark as Paid</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-admin-layout>
</x-layout>