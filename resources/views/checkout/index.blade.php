<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Checkout
    </x-slot:page_title>
    <h1 class="text-xl font-bold mb-4">Checkout - Cash on Delivery</h1>

    @if($cart)
    <table class="table-auto w-full bg-white shadow-md rounded-lg mb-6">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="px-4 py-2">Product</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
            <tr class="border-b">
                <td class="text-center px-4 py-2">{{ $item['name'] }}</td>
                <td class="text-center px-4 py-2">{{ number_format($item['price'], 2) }}$</td>
                <td class="text-center px-4 py-2">{{ $item['quantity'] }}</td>
                <td class="text-center px-4 py-2">{{ number_format($item['price'] * $item['quantity'], 2) }}$</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="font-bold">
                <td></td>
                <td></td>
                <td></td>
                <td class="px-4 py-2 text-center">Total {{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}$</td>
            </tr>
        </tfoot>
    </table>

    <!-- Checkout Form -->
    <form action="/checkout" method="POST">
        @csrf
        <div class="mb-6">
            <label for="address" class="block mb-2">Shipping Address</label>
            <input type="text" name="address" id="address" class="block w-full px-3 py-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-6">
            <label for="phone" class="block mb-2">Phone Number</label>
            <input type="text" name="phone" id="phone" class="block w-full px-3 py-2 border border-gray-300 rounded" required>
        </div>

        <x-button type="submit" class="bg-blue-500 text-white">Place Order (Cash on Delivery)</x-button>
    </form>
    @else
    <p>Your cart is empty. <a href="/products" class="text-blue-500">Continue shopping</a></p>
    @endif
</x-layout>