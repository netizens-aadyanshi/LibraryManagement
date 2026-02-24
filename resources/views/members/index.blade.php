<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Members
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6">

                <!-- Add Member Button -->
                <div class="mb-4">
                    <a href="{{ route('members.create') }}" 
                       class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                        Add Member
                    </a>
                </div>

                <!-- Members Table -->
                <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-700">Name</th>
                            <th class="px-4 py-2 text-left text-gray-700">Email</th>
                            <th class="px-4 py-2 text-left text-gray-700">Phone</th>
                            <th class="px-4 py-2 text-left text-gray-700">Membership Date</th>
                            <th class="px-4 py-2 text-left text-gray-700">Status</th>
                            <th class="px-4 py-2 text-left text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($members as $member)
                        <tr>
                            <td class="px-4 py-2">{{ $member->name }}</td>
                            <td class="px-4 py-2">{{ $member->email }}</td>
                            <td class="px-4 py-2">{{ $member->phone }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($member->membership_date)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">
                                @if($member->is_active)
                                    <span class="px-2 py-1 bg-green-200 text-green-800 rounded-full text-sm">Active</span>
                                @else
                                    <span class="px-2 py-1 bg-gray-300 text-gray-700 rounded-full text-sm">Inactive</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('members.edit', $member) }}" 
                                   class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Edit</a>

                                <form action="{{ route('members.toggle', $member) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" 
                                            class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                                        {{ $member->is_active ? 'Deactivate' : 'Activate' }}
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
</x-app-layout>