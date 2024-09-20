<x-layout>
    <x-slot:heading>
        Meals
    </x-slot:heading>
  
<div class="space-y-3" >
@foreach ($meals as $meal) 
        <a href="/meals/{{$meal['id']}}" class="hover:underline block px-4 py-6 border border-gray-200 rounded-lg">

            <div>
                <strong>Meal title: </strong>  {{ $meal->title }}
                <br>
                <strong>Date: </strong> {{ $meal->date}} 
                <br>
                <strong>Ingredients: </strong> {{ $meal->ingredients }}
                <br>
                @foreach ($symptoms as $symptom)
                <strong>Symptoms: </strong>{{ $symptom->name}}
                @endforeach
            </div>
            
        </a>
@endforeach  

</div>   


</x-layout>
