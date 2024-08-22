<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Product
    </x-slot:page_title>
    <div class="flex justify-between">
        <div class="mt-5 ">Single product page</div>
        <x-link href="/products/{{$product->id}}/edit">
            Edit
        </x-link>
    </div>
    <div class="mt-5">Name: {{$product->name}} </div>
    <div class="">Price: {{$product->price}}$ </div>
</x-layout>