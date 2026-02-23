@extends('layouts.app')

@section('content')
<h1>Authors</h1>

<a href="{{ route('authors.create') }}" class="btn">Add Author</a>

<table class="min-w-full border border-gray-200 divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-4 py-2 text-left text-gray-700">Name</th>
            <th class="px-4 py-2 text-left text-gray-700">Bio</th>
            <th class="px-4 py-2 text-left text-gray-700">Total Books</th>
            <th class="px-4 py-2 text-left text-gray-700">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($authors as $author)
        <tr>
            <td class="px-4 py-2">{{ $author->name }}</td>
            <td class="px-4 py-2">{{ $author->bio }}</td>
            <td class="px-4 py-2">{{ $author->books_count }}</td>
            <td class="px-4 py-2 flex gap-2">
                <a href="{{ route('authors.edit', $author) }}" class="btn">Edit</a>
                <form action="{{ route('authors.destroy', $author) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection