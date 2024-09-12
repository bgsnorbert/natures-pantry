<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Admin create product
    </x-slot:page_title>
    <x-admin-layout>
        <div class="mt-5 ">New Product</div>

        <form method="POST" action="/admin/products" class="max-w-md mx-auto">
            @csrf
            <x-form-field>
                <x-form-input type="text" name="name" id="name" placeholder=" " required>
                </x-form-input>
                <x-form-label for="name">
                    Name
                </x-form-label>
            </x-form-field>
            <div class="relative z-0 w-full mb-5 group">
                <x-form-input type="number" name="price" id="price" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" placeholder=" " required>
                </x-form-input>
                <x-form-label for="price">
                    Price (number with up to 2 decimal places)
                </x-form-label>
            </div>


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

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </x-admin-layout>
</x-layout>