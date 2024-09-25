<x-layout>
    <x-slot:heading>
        Add a new meal
    </x-slot:heading>

<form method="POST" action="/meals">
    @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Today's meals</h2>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
         <x-form-label for="title">Title</x-form-label>
          <div class="mt-2">
           <x-form-input type="text" name="title" id="title" autocomplete="title" required/>
            <x-form-error name="title"/>
        </x-form-field>
        </div>

        <x-form-field>
            <x-form-label for="date">Date and time</x-form-label>
            <div>
                <x-form-input type="datetime-local" name="date" id="date" required/>
            </div>
            <x-form-error name="date"/>
        </x-form-field>

        <x-form-field>
          <x-form-label for="ingredients">Ingredients</x-form-label>
          <div class="mt-2">
            <textarea style="resize:none" id="ingredients" name="ingredients" rows="3" class="block w-full rounded-md border-0 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required></textarea>
          </div>
          <x-form-error name="ingredients"/>
        </x-form-field>


<x-form-field>
    <p class="pb-0 block text-m font-medium leading-6 text-gray-900">Symptoms</p>
</div>        
<div class="pt-0">
    <div class="pt-0 col-span-full">
    @foreach ($symptoms as $symptom)
    <div class="col-span-1">
        <input type="checkbox" name="symptoms[]" value="{{ $symptom->id }}" id="symptom-{{ $symptom->id }}">
        <label for="symptom-{{ $symptom->id }}" class="text-sm font-medium leading-6 text-gray-900">{{ ucfirst($symptom->name) }}</label>
    </div>
@endforeach
 </x-form-field>
    
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

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <x-form-button>Save</x-form-button>
  </div>
</form>

</x-layout>
