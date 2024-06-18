<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events Type Edit') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6">Edit Event Type</h2>
            <form action="{{ route('eventTypes.update', $eventType->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ $eventType->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $eventType->description }}</textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Event Type
                    </button>
                    <a href="{{ route('eventTypes.index') }}" class="text-sm text-blue-600 hover:text-blue-900">Cancel</a>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>