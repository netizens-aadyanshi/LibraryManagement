<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <!-- Dashboard Title -->
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>

            <!-- CRUD Links in one line -->
            <div class="flex items-center gap-3">
                <a href="{{ route('authors.index') }}"
                   class="px-3 py-1 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Authors
                </a>

                <a href="{{ route('books.index') }}"
                   class="px-3 py-1 bg-purple-600 text-white rounded-md hover:bg-purple-700 transition">
                    Books
                </a>

                <a href="{{ route('members.index') }}"
                   class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                    Members
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6">

                <h3 class="text-lg font-semibold mb-4">
                    Welcome 👋
                </h3>

                <p class="mb-6 text-gray-600">
                    You are successfully logged in.
                </p>

            </div>

        </div>
    </div>
</x-app-layout>