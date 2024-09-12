<x-layout>
    <x-slot:page_title>
        Your Cart
    </x-slot:page_title>

    <h1 class="my-6">Your Shopping Cart</h1>

    @if (session('success'))
    <div>{{ session('success') }}</div>
    @endif

    @if (session('warning'))
    <div>{{ session('warning') }}</div>
    @endif

    @if (count($cart) > 0)
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th class="px-7">Price</th>
                <th>Quantity</th>
                <th class="px-7">Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $id => $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td class="px-7">${{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td class="px-7">${{ $item['price'] * $item['quantity'] }}</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a class="mt-4 block" href="/checkout">Proceed to Checkout</a>
    @else
    <p>Your cart is empty.</p>
    @endif
</x-layout>