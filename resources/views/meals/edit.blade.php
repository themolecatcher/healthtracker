<x-layout>
    <x-slot:heading>
        Edit meal: {{ $meal->title }}
    </x-slot:heading>

<form method="POST" action="/meals/{{ $meal->id }}">
    @csrf
    @method('PATCH')

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Today's meals</h2>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-m font-medium leading-6 text-gray-900">Title</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input type="text" 
              name="title" id="title" 
              autocomplete="title" 
              class="block flex-1 rounded-md border-0 py-1.5 pl-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
              placeholder="f.e. Oatmeal with protein powder"
              value="{{ $meal->title }}" 
              required>
            </div>
            @error('title')
            <p class="col-span-full flex p-1 mt-1 text-sm font-bold text-red-800 rounded-lg dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="col-span-full">
        <label for="date" class="block text-m font-medium leading-6 text-gray-900">Date and time</label>
        <div>
            <input type="datetime-local" 
            name="date" id="date" 
            class="block flex-1 rounded-md border-0 py-1.5 pl-1 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-0 sm:text-sm sm:leading-6" 
            value="{{ $meal->date }}" 
            required>
        </div>
        @error('date')
            <p class="col-span-full flex p-1 mt-1 text-sm font-bold text-red-800 rounded-lg dark:text-red-400" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-full">
          <label for="ingredients" class="block text-m font-medium leading-6 text-gray-900">Ingredients</label>
          <div class="mt-2">
            <textarea 
            style="resize:none" 
            id="ingredients" 
            name="ingredients" 
            rows="3" 
            class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
            required>{{ $meal->ingredients }}</textarea>
          </div>
          @error('ingredients')
            <p class="col-span-full flex p-1 mt-1 text-sm font-bold text-red-800 rounded-lg dark:text-red-400" role="alert">{{ $message }}</p>
            @enderror
        </div>


<div class="pb-0 col-span-full">
    <p class="pb-0 block text-m font-medium leading-6 text-gray-900">Symptoms</p>
</div>        
<div class="pt-0">
    <div class="pt-0 col-span-1">
        <input type="checkbox" name="symptoms[]" value="energized" id="energized">
        <label for="energized" class="text-sm font-medium leading-6 text-gray-900">Energized</label>
    </div>
    <div class="col-span-1">
        <input type="checkbox" name="symptoms[]" value="tired" id="tired">
        <label for="tired" class="text-sm font-medium leading-6 text-gray-900">Tired</label>
    </div>
    <div class="col-span-1">
        <input type="checkbox" name="symptoms[]" value="cramps" id="cramps">
        <label for="energized" class="text-sm font-medium leading-6 text-gray-900">Cramps</label>
    </div>
    <div class="col-span-1">
        <input type="checkbox" name="symptoms[]" value="nausea" id="nausea">
        <label for="energized" class="text-sm font-medium leading-6 text-gray-900">Nausea</label>
    </div>
    <div class="col-span-1">
        <input type="checkbox" name="symptoms[]" value="nosymptoms" id="nosymptoms">
        <label for="energized" class="text-sm font-medium leading-6 text-gray-900">No symptoms</label>
    </div>
    
</div>


        <div class="col-span-full">
          <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Photos of your meal (optional) </label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                  <span>Upload a photo</span>
                  <input id="file-upload" name="file-upload" type="file" class="sr-only">
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG or GIF up to 10MB</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="mt-6 flex items-center justify-between gap-x-6">
    <div class="flex items-center">
        <button form="delete-form" name="save_multiple_checkbox" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
    </div>
    <div class="flex items-center gap-x-6">
        <a href="/meals/{{$meal->id}}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
        <div>
        <button type="submit" name="save_multiple_checkbox" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </div>
  </div>
</form>

<form method="POST" action="/meals/{{ $meal->id }}" class="hidden" id="delete-form">
    @csrf
    @method('DELETE')
</form>
</x-layout>
