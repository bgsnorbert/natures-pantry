<x-layout>
    <x-slot:page_title>
        Nature's Pantry - New Product
    </x-slot:page_title>
    <div class="mt-5 ">New Product</div>

    <form method="POST" action="/products" class="max-w-md mx-auto">
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

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</x-layout>