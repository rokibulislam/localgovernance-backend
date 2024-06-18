<x-guest-layout>
    
    <main class="p-8 text-black bg-gray-100">
        
        <section class="mb-8">
            <h2 class="text-3xl font-bold"> {{ $event->name }} </h2>
            <p class="mt-2">{{ $event->description }} </p>
            <p>Date: {{ $event->start_date }} </p>
        </section>

        @if($event->tickets->count() > 0)

            @if (session('success'))
                <div class="bg-green-500 text-white p-3 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-3 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('events.purchase', $event->id) }}" method="POST">
                @csrf
                <div class="mt-4">
                    <label for="ticket_id" class="block font-bold mb-2">Choose Ticket Type:</label>
                    <select name="ticket_id" id="ticket_id" class="block w-full border-gray-300 rounded-md shadow-sm">
                        @foreach ($event->tickets as $ticket)
                            <option value="{{ $ticket->id }}">
                                {{ $ticket->type }} - ${{ number_format($ticket->price, 2) }} ({{ $ticket->quantity }} available)
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <label for="quantity" class="block font-bold mb-2">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="10" class="block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Purchase Tickets
                </button>
            </form>
        @else
            <p>No tickets available for this event.</p>
        @endif
        
{{--         <section class="mb-8">
            <h2 class="text-2xl font-bold">Detailed Schedule</h2>
            <ul class="mt-4">
                <li><strong>Day 1:</strong> Keynote by Jane Doe, workshops, and networking sessions.</li>
                <li><strong>Day 2:</strong> Panel discussions, product demos, and evening social event.</li>
                <li><strong>Day 3:</strong> Closing remarks and hackathon finale.</li>
            </ul>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-bold">Speakers</h2>
            <div class="flex flex-wrap justify-around">
                <div class="p-4">
                    <img src="https://via.placeholder.com/150" alt="Jane Doe" class="rounded-full w-32 h-32">
                    <h3 class="mt-2 font-semibold">Jane Doe</h3>
                    <p>Chief Technology Officer at Tech Innovations Inc.</p>
                </div>
                <div class="p-4">
                    <img src="https://via.placeholder.com/150" alt="John Smith" class="rounded-full w-32 h-32">
                    <h3 class="mt-2 font-semibold">John Smith</h3>
                    <p>Founder of Smart Solutions</p>
                </div>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-bold">Registration</h2>
            <p class="mt-2">Sign up on our website or contact our ticket office at 555-1234. Early bird tickets available until July 1.</p>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-bold">FAQs</h2>
            <dl class="mt-4">
                <dt class="font-semibold">What should I bring to the event?</dt>
                <dd>- Bring your ID, ticket confirmation, and any required tech if attending workshops.</dd>
                <dt class="font-semibold">Are meals provided?</dt>
                <dd>- Lunch and coffee breaks are included with your registration.</dd>
            </dl>
        </section> --}}

    </main>

</x-guest-layout>