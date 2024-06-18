<x-app-layout>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

            <div class="flex justify-between items-center pb-4">
                <h1 class="text-xl font-semibold leading-tight">Bookings</h1>
            </div>


            <table class="min-w-full divide-y divide-gray-200 text-black">
                
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Event Name
                        </th>

                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Ticket Type
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>


                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>


                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($bookings as $booking)
                            <tr>
                                <td> {{ $booking->event->name }}</td>
                                <td> {{ $booking->ticket->type }}</td>
                                <td> {{ $booking->quantity }}</td>
                                <td> {{ $booking->price }}</td>
                            </tr>
                        @endforeach

                </tbody>

            </table>

        </div>
    </div>

</x-app-layout>