<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events Types') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between items-center pb-4">
                <h2 class="text-xl font-semibold leading-tight">Event Types</h2>
                <a href="{{ route('eventTypes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add New Event Type
                </a>
            </div>
            
            <table class="min-w-full divide-y divide-gray-200">
                
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($eventTypes as $eventType)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $eventType->name }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $eventType->description }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                            <a href="{{ route('eventTypes.edit', $eventType) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('eventTypes.destroy', $eventType) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>