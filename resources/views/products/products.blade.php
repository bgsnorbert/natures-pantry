<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Products
    </x-slot:page_title>
    <div class="flex justify-between">
        <div class="my-5  ">Products page</div>
        <x-link href="/products/create">New</x-link>
    </div>
    @foreach ($products as $product)
    <a href="/products/{{$product['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg mb-4">
        <div class="font-bold text-green-400">
            Name: {{$product->name}}
        </div>
        <div class="mb-8">
            Price: {{$product->price}}$
        </div>
    </a>
    @endforeach
</x-layout>