<x-guest-layout>
    
    <main class="p-8 text-black bg-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            
            @foreach( $events as $event ) 
           
            <!-- Event Card -->
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="font-bold text-lg"> 
                    <a href="{{ route('events.details', ['id' => $event->id]) }}">
                        {{ $event->name }} 
                    </a>
                </h2>
                <p class="text-gray-600"> {{ $event->start_date }} </p>
                <p class="mt-2"> {{ $event->description }} </p>
            </div>

            @endforeach

        </div>
    </main>


</x-guest-layout>