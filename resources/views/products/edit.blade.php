<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Edit Product
    </x-slot:page_title>
    <div class="flex justify-between">
        <div class="mt-5 ">Edit Product</div>
        <form method="POST" action="/products/{{$product->id}}">
            @csrf
            @method('DELETE')
            <x-button class="text-white bg-red-500 hover:bg-red-600 focus:ring-red-300 dark:focus:ring-red-600">Delete</x-button>
        </form>
    </div>


    <form method="POST" action="/products/{{$product->id}}" class="max-w-md mx-auto">
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

        <x-link href="/products">Cancel</x-link>
        <x-button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:focus:ring-blue-800">Update</x-button>
    </form>
</x-layout>