<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Authors
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6">

                <!-- Add Button -->
                <div class="mb-6">
                    <a href="{{ route('authors.create') }}"
                       class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                        Add Author
                    </a>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Bio</th>
                                <th class="px-4 py-2 text-left">Total Books</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($authors as $author)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $author->name }}</td>
                                <td class="px-4 py-2">{{ $author->bio }}</td>
                                <td class="px-4 py-2">{{ $author->books_count }}</td>

                                <td class="px-4 py-2 flex gap-2">

                                    <a href="{{ route('authors.edit', $author) }}"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('authors.destroy', $author) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition"
                                                onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>