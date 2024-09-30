<x-layout>

    @section('title', 'Unauthorized')

<section>
    <x-slot:heading>
        Unauthorized
    </x-slot:heading>
        <p>Sorry, you are not allowed to access this page.</p> </br>
        <a class="underline" href="{{ url('/meals') }}">Go back to your meals</a>
</section>

</x-layout>

