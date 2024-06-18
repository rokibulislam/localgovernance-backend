<x-guest-layout>

    <main>

        <section class="bg-blue-600 text-white text-center p-12 ">
            <h2 class="text-3xl font-bold">Join the Leading Event of the Year</h2>
            <p class="mt-2">October 3-5, 2024 | Brno City Convention Center</p>
            <a href="/register" class="inline-block mt-4 bg-white text-blue-600 font-bold py-2 px-4 rounded">Register Now</a>
        </section>

        <section class="p-8 text-center text-black bg-gray-100">
            <h2 class="text-2xl font-bold">About the Event</h2>
            <p class="mt-4 max-w-4xl mx-auto">This premier event brings together tech enthusiasts, industry leaders, and innovators from around the globe to explore the latest in technology and business strategies.</p>
        </section>

        <section class="p-8 text-black bg-gray-100">
            <h2 class="text-2xl font-bold text-center">Event Highlights</h2>



                
                <div class="flex flex-wrap justify-center gap-6 mt-4">
            
                    @foreach( $events as $event ) 
                            
                            <div class="w-60 bg-white rounded-lg shadow p-4">
                                <h3 class="font-semibold"> {{ $event->name }} </h3>
                                <p> {{ $event->description }} </p>
                            </div>

                    @endforeach

                </div>

        </section>

        <section class="bg-gray-200 p-8 text-center">
            <h2 class="text-2xl font-bold">Hear from Our Attendees</h2>
            <blockquote class="max-w-xl mx-auto mt-4 italic">"One of the most impactful tech events I've attended. Can't wait for this year's conference!" - Jane Doe</blockquote>
        </section>

        <section class="p-8 text-center text-white">
            <h2 class="text-2xl font-bold">Stay Updated</h2>
            <form action="#" method="POST" class="mt-4">
                <input type="email" placeholder="Enter your email" class="px-4 py-2 border rounded-l-lg focus:outline-none">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg">Subscribe</button>
            </form>
        </section>
    </main>

</x-guest-layout>