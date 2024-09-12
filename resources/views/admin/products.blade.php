<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Admin products
    </x-slot:page_title>
    <x-admin-layout>
        <div class="ml-8">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold mb-4">Product List</h1>
                <x-link href="/admin/products/create" class="mb-4">Add New Product</x-link>
            </div>

            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-2 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Category</th>
                        <th class="px-4 py-2 border">Price</th>
                        <th class="px-2 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td class="px-4 py-2 border">{{ $product->id }}</td>
                        <td class="px-4 py-2 border">{{ $product->name }}</td>
                        <td class="px-4 py-2 border">{{ $product->category->name ?? 'Uncategorized' }}</td>
                        <td class="px-4 py-2 border">{{ $product->price }}$</td>
                        <td class="px-4 py-2 border">
                            <div class="flex justify-center space-x-2">
                                <a href="/admin/products/{{$product['id']}}/edit" class="block w-fit px-2 py-1 border border-gray-200 rounded-lg">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                    </svg>
                                </a>
                                <form method="POST" action="/admin/products/{{$product->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-white px-2 py-1  hover:bg-red-400 focus:ring-red-300 dark:focus:ring-red-400">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </x-admin-layout>
</x-layout>