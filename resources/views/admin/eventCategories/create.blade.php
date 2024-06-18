<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events Categories Create') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6">Create New Event Category</h2>
            <form action="{{ route('eventCategories.store') }}" method="POST" class="w-full max-w-lg">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Enter event category name"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" rows="3"
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              placeholder="Describe the event category"></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create Category
                    </button>
                    <a href="{{ route('eventCategories.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>