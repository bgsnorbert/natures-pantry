<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Edit product
    </x-slot:page_title>
    <x-admin-layout>
        <div class="flex justify-between">
            <div class="mt-5 ">Edit Product</div>
            <form method="POST" action="/admin/products/{{$product->id}}">
                @csrf
                @method('DELETE')
                <x-button class="text-white bg-red-500 hover:bg-red-600 focus:ring-red-300 dark:focus:ring-red-600">Delete</x-button>
            </form>
        </div>

        <form method="POST" action="/admin/products/{{$product->id}}" class="max-w-md mx-auto">
            @csrf
            @method('PATCH')
            <x-form-field>
                <x-form-input type="text" name="name" id="floating_text" placeholder=" " value="{{$product->name}}" required />
                <x-form-label for="floating_text">
                    Name
                </x-form-label>
                <x-form-error name="name" />
            </x-form-field>
            <x-form-field>
                <x-form-input type="number" name="price" id="floating_price" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" placeholder=" " value="{{$product->price}}" required />
                <x-form-label for="floating_price">
                    Price (number with up to 2 decimal places)
                </x-form-label>
                <x-form-error name="price" />
            </x-form-field>

            <div class="relative z-0 w-full mb-5 group">
                <x-form-input type="text" name="new_category" id="new_category" placeholder=" ">
                </x-form-input>
                <x-form-label for="new_category">
                    New Category
                </x-form-label>
            </div>
            @if(! $categories->isEmpty())
            <div class="relative z-0 w-full mb-5 group">
                <select name="category_id" id="category_id" class="block w-full px-2 py-2 text-gray-900 border-0 border-b-2 border-gray-300 appearance-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="" disabled selected>Select a Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <a href="/admin/products">Cancel</a>
            <x-button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:focus:ring-blue-800">Update</x-button>
        </form>
    </x-admin-layout>
</x-layout>