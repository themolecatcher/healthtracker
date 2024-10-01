<x-layout>
    <x-slot:heading>
        Meals
    </x-slot:heading>
  
<div class="space-y-3" >
@foreach ($meals as $meal) 
        <a href="/meals/{{$meal['id']}}" class="hover:underline block px-4 py-6 border border-gray-200 rounded-lg">

            <div>
                <p><strong>Meal title: </strong>  {{ $meal->title }}</p>
                <p><strong>Date: </strong> {{ \Carbon\Carbon::parse($meal->date)->format('F jS, H:i') }}</p>
                <p><strong>Ingredients: </strong> {{ $meal->ingredients }}</p>
                <p> <strong>Symptoms: </strong> 
                 @if($meal->symptoms->isNotEmpty())
                     {{ implode(', ', $meal->symptoms->pluck('name')->toArray()) }}
                @else
                     No symptoms selected
                @endif</p>

                <p> <strong>Allergens: </strong> 
                 @if($meal->allergens->isNotEmpty())
                     {{ implode(', ', $meal->allergens->pluck('name')->toArray()) }}
                @else
                     No allergens selected
                @endif</p>
            </div>
            
        </a>
@endforeach  
    <div class="mt-10">
                {{ $meals->links() }}
    </div>
</div>   

</x-layout>
