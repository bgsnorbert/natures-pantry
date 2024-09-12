<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Product
    </x-slot:page_title>
    <div class="flex justify-between">
        <div class="mt-5 ">Single product page</div>
        @if (Auth::check() && Auth::user()->role === 'admin')
        <x-link href="/admin/products/{{$product->id}}/edit">
            Edit
        </x-link>
        @endif
    </div>
    <div class="mt-5">Name: {{$product->name}} </div>
    <div class="">Price: {{$product->price}}$ </div>
    <form method="POST" action="{{ route('cart.add', $product->id) }}">
        @csrf
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Add to Cart</button>
    </form>
</x-layout>