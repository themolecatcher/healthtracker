<x-layout>
    <x-slot:heading>
        Meal
    </x-slot:heading>
  
<h2 class=text-bold>Meal: {{ $meal->title}}</h2>
<h3>Date: {{ $meal->date}}</h3>
<h3>Ingredients: {{ $meal->ingredients }}</h3>
<h3>Symptoms: {{$meal->symptoms->pluck('name')}}</h3>

    <p class="mt-6">
    <x-button href="/meals/{{ $meal->id }}/edit">Edit meal</x-button>
    </p>
</x-layout>
