<x-app-layout>
<x-slot name="header">Edit Member</x-slot>

<form method="POST" action="{{ route('members.update',$member) }}">
@csrf @method('PUT')
<input name="name" value="{{ $member->name }}" class="border p-2 w-full mb-2">
<input name="email" value="{{ $member->email }}" class="border p-2 w-full mb-2">
<input name="phone" value="{{ $member->phone }}" class="border p-2 w-full mb-2">
<button class="bg-indigo-600 text-white px-3 py-1 rounded">Update</button>
</form>
</x-app-layout>