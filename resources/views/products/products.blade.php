<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Products
    </x-slot:page_title>

    <form method="GET" action="/products" class="my-8">
        <div class="mb-2">Filter by Category:</div>
        <div class="flex flex-col">
            @foreach ($categories as $category)
            <label class="flex items-center mb-2">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                    {{ in_array($category->id, $selectedCategories ?? []) ? 'checked' : '' }}>
                <span class="ml-2">{{ $category->name }}</span>
            </label>
            @endforeach
        </div>
        <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded">Filter</button>
    </form>

    <div class="flex justify-between">
        <div class="my-5  ">Products page</div>
        <x-link href="/products/create">New</x-link>
    </div>
    @foreach ($products as $product)
    <a href="/products/{{$product['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg mb-4">
        <div class="font-bold text-green-400">
            Name: {{$product->name}}
        </div>
        <div>
            Category: {{$product->category->name ?? 'Uncategorized'}}
        </div>
        <div class="mb-8">
            Price: {{$product->price}}$
        </div>
    </a>
    @endforeach
    <div class="">
        {{$products->links()}}
    </div>
</x-layout>