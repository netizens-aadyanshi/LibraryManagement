@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold text-red-500 mb-6">Author Details</h1>

    <div class="card">
        <div>
            <p><strong>Name:</strong> {{ $author->name }}</p>
            <p><strong>Bio:</strong> {{ $author->bio }}</p>
            <p><strong>Total Books:</strong> {{ $author->books()->count() }}</p>
        </div>
    </div>

    <div class="flex gap-2 mt-4">
        <a href="{{ route('authors.edit', $author) }}" class="btn">Edit</a>
        <a href="{{ route('authors.index') }}" class="btn bg-gray-300 hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection