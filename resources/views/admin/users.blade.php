<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Admin dashboard users
    </x-slot:page_title>
    <x-admin-layout>
        <div class="ml-8">
            <h1 class="text-xl font-bold mb-4">Manage Users</h1>

            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-2">First Name</th>
                        <th class="px-4 py-2">Last Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $user->first_name }}</td>
                        <td class="px-4 py-2">{{ $user->last_name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->role }}</td>
                        <td class="px-4 py-2">
                            <!-- Delete Form -->
                            <form class="text-center" action="/admin/users/{{ $user->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" class="bg-red-500 hover:bg-red-700 text-white">Delete</x-button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-admin-layout>
</x-layout>