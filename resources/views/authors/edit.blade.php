@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold text-red-500 mb-6">Edit Author</h1>

    <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold">Name</label>
            <input type="text" name="name" id="name" class="block w-full mt-2 p-2 border border-gray-300 rounded" value="{{ old('name', $author->name) }}">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bio" class="block font-semibold">Bio</label>
            <textarea name="bio" id="bio" class="block w-full mt-2 p-2 border border-gray-300 rounded">{{ old('bio', $author->bio) }}</textarea>
            @error('bio')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="btn">Update</button>
            <a href="{{ route('authors.index') }}" class="btn bg-gray-300 hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection