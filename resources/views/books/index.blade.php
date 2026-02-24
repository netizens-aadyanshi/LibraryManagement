<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Books
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6">

                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Add Book -->
                <div class="mb-6">
                    <a href="{{ route('books.create') }}"
                       class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                        Add Book
                    </a>
                </div>

                <!-- Books Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">Title</th>
                                <th class="px-4 py-2 text-left">Author</th>
                                <th class="px-4 py-2 text-left">Published Year</th>
                                <th class="px-4 py-2 text-left">Total Copies</th>
                                <th class="px-4 py-2 text-left">Available Copies</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $book->title }}</td>
                                <td class="px-4 py-2">{{ $book->author->name }}</td>
                                <td class="px-4 py-2">{{ $book->published_year }}</td>
                                <td class="px-4 py-2">{{ $book->total_copies }}</td>
                                <td class="px-4 py-2">{{ $book->available_copies }}</td>
                                <td class="px-4 py-2 flex gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('books.edit', $book) }}"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                        Edit
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('books.destroy', $book) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition"
                                                onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>

                                    <!-- Borrow -->
                                    <form action="{{ route('books.borrow', $book->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="px-3 py-1 rounded-md transition
                                                {{ $book->available_copies == 0 
                                                        ? 'bg-gray-400 cursor-not-allowed' 
                                                        : 'bg-indigo-600 hover:bg-indigo-700 text-white' }}"
                                            {{ $book->available_copies == 0 ? 'disabled' : '' }}>
                                            {{ $book->available_copies == 0 ? 'Unavailable' : 'Borrow' }}
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