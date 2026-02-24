<x-app-layout>
<x-slot name="header">Add Member</x-slot>

<form method="POST" action="{{ route('members.store') }}">
@csrf
<input name="name" placeholder="Name" class="border p-2 w-full mb-2">
<input name="email" placeholder="Email" class="border p-2 w-full mb-2">
<input name="phone" placeholder="Phone" class="border p-2 w-full mb-2">
<button class="bg-green-600 text-white px-3 py-1 rounded">Save</button>
</form>
</x-app-layout>