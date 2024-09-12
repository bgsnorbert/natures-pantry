<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Orders
    </x-slot:page_title>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-200">
            <tr>
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
                    <a href="" class="text-blue-500">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>