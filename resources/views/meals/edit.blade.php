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
        <x-form-field>
         <x-form-label for="title">Title</x-form-label>
          <div class="mt-2">
           <x-form-input type="text" name="title" id="title" :value="$meal->title" required/>
            <x-form-error name="title"/>
        </x-form-field>
        </div>

        <x-form-field>
            <x-form-label for="date">Date and time</x-form-label>
            <div>
                <x-form-input type="datetime-local" name="date" id="date" :value="$meal->date" required/>
            </div>
            <x-form-error name="date"/>
        </x-form-field>

        <x-form-field>
          <x-form-label for="ingredients">Ingredients</x-form-label>
          <div class="mt-2">
            <textarea style="resize:none" id="ingredients" name="ingredients" rows="3" class="block w-full rounded-md border-0 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>{{ old('ingredients', $meal->ingredients) }}</textarea>
          </div>
          <x-form-error name="ingredients"/>
        </x-form-field>

<div class="col-span-full flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-40 justify-stretch">

  <x-form-field class="flex-1">
    <p class="block text-m font-medium leading-6 text-gray-900">Symptoms</p>       
    <div class="pt-2 grid grid-cols-1 sm:grid-cols-2 gap-2">
      @foreach ($symptoms as $symptom)
              <div class="col-span-1">
                  <input type="checkbox" name="symptoms[]" value="{{ $symptom->id }}" id="symptom-{{ $symptom->id }}"
                      {{ in_array($symptom->id, old('symptoms', $meal->symptoms->pluck('id')->toArray())) ? 'checked' : '' }}>
                  <label for="symptom-{{ $symptom->id }}" class="text-sm font-medium leading-6 text-gray-900">
                      {{ ucfirst($symptom->name) }}
                  </label>
              </div>
          @endforeach
    </div>
  </x-form-field>

  <x-form-field class="flex-1">
                  <p class="block text-m font-medium leading-6 text-gray-900">Allergens</p>
                  <div class="pt-2 grid grid-cols-1 sm:grid-cols-2 gap-2">
                      @foreach ($allergens as $allergen)
                      <div class="col-span-1">
                          <input type="checkbox" name="allergens[]" value="{{ $allergen->id }}" id="allergen-{{ $allergen->id }}" {{ in_array($allergen->id, old('allergens', $meal->allergens->pluck('id')->toArray())) ? 'checked' : '' }}>
                          <label for="allergen-{{ $allergen->id }}" class="text-sm font-medium leading-6 text-gray-900">{{ ucfirst($allergen->name) }}</label>
                      </div>
                      @endforeach
                  </div>
  </x-form-field>
</div>
    
</div>
    <x-form-field>
          <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Photos of your meal (optional)</label>
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
    </x-form-field>

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




    <x-form-field>
            <div class="text-center">
            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
              <x-form-button>Save</x-form-button>
            </div>
              </x-form-field>
          </div>
        </div>
      </div>