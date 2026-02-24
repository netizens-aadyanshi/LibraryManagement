<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Book
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6">

                <form action="{{ route('books.store') }}" method="POST">
                    @csrf

                    <!-- Title -->
                    <div class="mb-6">
                        <label for="title" class="block font-semibold text-gray-700">Title</label>
                        <input type="text" name="title" id="title"
                               value="{{ old('title') }}"
                               class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Author -->
                    <div class="mb-6">
                        <label for="author_id" class="block font-semibold text-gray-700">Author</label>
                        <select name="author_id" id="author_id"
                                class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                            <option value="">Select Author</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('author_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Published Year -->
                    <div class="mb-6">
                        <label for="published_year" class="block font-semibold text-gray-700">Published Year</label>
                        <input type="text" name="published_year" id="published_year"
                               value="{{ old('published_year') }}"
                               class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        @error('published_year')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Total Copies -->
                    <div class="mb-6">
                        <label for="total_copies" class="block font-semibold text-gray-700">Total Copies</label>
                        <input type="number" name="total_copies" id="total_copies"
                               value="{{ old('total_copies') }}"
                               class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        @error('total_copies')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Available Copies -->
                    <div class="mb-6">
                        <label for="available_copies" class="block font-semibold text-gray-700">Available Copies</label>
                        <input type="number" name="available_copies" id="available_copies"
                               value="{{ old('available_copies') }}"
                               class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        @error('available_copies')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                            Save
                        </button>

                        <a href="{{ route('books.index') }}"
                           class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>