<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events Edit') }}
        </h2>
    </x-slot>   

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6">Edit Event</h2>
        <form action="{{ route('events.update', $event->id) }}" method="POST" class="w-full max-w-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Event Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Event Name" value="{{ $event->name }}" required>
            </div>


            <!-- Category Dropdown -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category_id">
                        Category
                    </label>
                    <select name="category_id" id="category_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <!-- Single Type Selection -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                        Type
                    </label>
                    <select name="type_id" id="category" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">Select a Type</option>
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $event->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" required>{{ $event->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start_date">
                    Start Date
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start_date" name="start_date" type="datetime-local" 
                {{-- value="{{ $event->start_date->format('Y-m-d\TH:i') }}"  --}}
                value="{{ $event->start_date }}" 
                required
                >
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">
                    End Date
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end_date" name="end_date" type="datetime-local" 
                {{-- value="{{ $event->end_date->format('Y-m-d\TH:i') }}"  --}}
                value="{{ $event->end_date }}" 
                required
                >
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="location">
                    Location
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="location" name="location" type="text" placeholder="Location" value="{{ $event->location }}" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Event
                </button>
            </div>
        </form>
    </div>
</div>


</x-app-layout>