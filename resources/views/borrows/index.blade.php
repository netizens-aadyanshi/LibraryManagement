<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Borrowed Books
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

                <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">Book</th>
                            <th class="px-4 py-2 text-left">Member</th>
                            <th class="px-4 py-2 text-left">Borrowed At</th>
                            <th class="px-4 py-2 text-left">Due Date</th>
                            <th class="px-4 py-2 text-left">Returned At</th>
                            <th class="px-4 py-2 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrows as $borrow)

                        @php
                            $isOverdue = $borrow->due_date < now() && is_null($borrow->returned_at);
                        @endphp

                        <tr class="border-t {{ $isOverdue ? 'bg-red-100' : '' }}">
                            <td class="px-4 py-2">{{ $borrow->book->title }}</td>
                            <td class="px-4 py-2">{{ $borrow->member->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $borrow->borrowed_at }}</td>

                            <td class="px-4 py-2">
                                {{ $borrow->due_date }}
                                @if($isOverdue)
                                    <span class="ml-2 px-2 py-1 text-xs bg-red-600 text-white rounded">
                                        Overdue
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-2">
                                {{ $borrow->returned_at ?? 'Not Returned' }}
                            </td>

                            <td class="px-4 py-2">
                                @if(!$borrow->returned_at)
                                    <form action="{{ route('borrows.return', $borrow->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                                            Return
                                        </button>
                                    </form>
                                @else
                                    <span class="px-3 py-1 bg-gray-400 text-white rounded-md">
                                        Returned
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</x-app-layout>