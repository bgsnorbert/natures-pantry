<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Product
    </x-slot:page_title>
    <div class="mt-5 ">Single product page</div>
    <div class="mt-5">Name: {{$product->name}} </div>
    <div class="">Price: {{$product->price}} </div>
</x-layout>