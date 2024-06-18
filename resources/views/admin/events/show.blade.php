<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events Tickets') }}
        </h2>
    </x-slot>



    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        
        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-lg shadow-lg text-black">

            <h1>{{ $event->name }} - Tickets  </h1>
            
            <ul>
                
                @foreach ($event->tickets()->get() as $ticket)
                    <li> {{ $ticket->type }} - ${{ number_format($ticket->price, 2) }} ({{ $ticket->quantity }} available)</li>
                @endforeach
            </ul>

            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Add a new ticket
            </h2>
            
            <form method="POST" action="{{ route('events.addTicket', $event->id) }}">
                @csrf
                
                <div>
                    <x-input-label for="type" :value="__('Ticket Type')" class="block font-medium text-sm text-gray-700" />
                    <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" placeholder="Ticket Type" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="type" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" placeholder="Price" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="type" :value="__('Quantity')" />
                    <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" placeholder="Quantity" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                {{-- <input type="text" name="type" placeholder="Ticket Type" required> --}}
                {{-- <input type="text" name="price" placeholder="Price" required> --}}
                {{-- <input type="number" name="quantity" placeholder="Quantity" required> --}}
                {{-- <button type="submit">Add Ticket</button> --}}

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3"> {{ __('Add Ticket') }} </x-primary-button>
                </div>

            </form>

        </div>

    </div>


</x-app-layout>