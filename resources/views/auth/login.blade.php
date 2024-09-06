<x-layout>
    <x-slot:page_title>
        Nature's Pantry - Login
    </x-slot:page_title>
    <div class="mt-5 ">Login page</div>
    <form method="POST" action="/login" class="max-w-md mx-auto">
        @csrf
        <x-form-field>
            <x-form-input type="email" name="email" id="email" placeholder=" " required :value="old('email')">
            </x-form-input>
            <x-form-label for="email">
                Email
            </x-form-label>
            <x-form-error name="email" />
        </x-form-field>
        <x-form-field>
            <x-form-input type="password" name="password" id="password" placeholder=" " required>
            </x-form-input>
            <x-form-label for="password">
                Password
            </x-form-label>
        </x-form-field>
        <div class="my-4">You don't have an account? <a href="/register" class="text-teal-500">Register</a></div>
        <a href="/" class="mr-5 px-4 py-2.5 bg-orange-400 text-white rounded-md">Cancel</a>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
    </form>
</x-layout>