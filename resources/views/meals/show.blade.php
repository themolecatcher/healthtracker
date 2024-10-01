<x-layout>
    <x-slot:heading>
        Meal
    </x-slot:heading>
  
<h2 class=text-bold>Meal: {{ $meal->title}}</h2>
<h3>Date: {{ \Carbon\Carbon::parse($meal->date)->format('F jS, H:i') }}</h3>
<h3>Ingredients: {{ $meal->ingredients }}</h3>
<h3>Symptoms: {{ implode(', ', $meal->symptoms->pluck('name')->toArray()) }}</h3>
<h3>Allergens: {{ implode(', ', $meal->allergens->pluck('name')->toArray()) }}</h3>

@can('edit', $meal)
    <p class="mt-6">
    <x-button href="/meals/{{ $meal->id }}/edit">Edit meal</x-button>
    </p>
@endcan    
</x-layout>