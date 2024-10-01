<x-layout>
    <x-slot:heading>
        Add a new meal
    </x-slot:heading>

<form method="POST" action="/meals">
    @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Today's meal</h2>

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

        <div class="col-span-full flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-40 justify-stretch">
            
            {{-- Symptoms Section --}}
            <x-form-field class="flex-1">
                <p class="block text-m font-medium leading-6 text-gray-900">Symptoms</p>
                <div class="pt-2 grid grid-cols-1 sm:grid-cols-2 gap-2">
                    @foreach ($symptoms as $symptom)
                    <div class="col-span-1">
                        <input type="checkbox" name="symptoms[]" value="{{ $symptom->id }}" id="symptom-{{ $symptom->id }}">
                        <label for="symptom-{{ $symptom->id }}" class="text-sm font-medium leading-6 text-gray-900">{{ ucfirst($symptom->name) }}</label>
                    </div>
                    @endforeach
                </div>
            </x-form-field>

            <x-form-field class="flex-1">
                <p class="block text-m font-medium leading-6 text-gray-900">Allergens</p>
                <div class="pt-2 grid grid-cols-1 sm:grid-cols-2 gap-2">
                    @foreach ($allergens as $allergen)
                    <div class="col-span-1">
                        <input type="checkbox" name="allergens[]" value="{{ $allergen->id }}" id="allergen-{{ $allergen->id }}">
                        <label for="allergen-{{ $allergen->id }}" class="text-sm font-medium leading-6 text-gray-900">{{ ucfirst($allergen->name) }}</label>
                    </div>
                    @endforeach
                </div>
            </x-form-field>
        </div>

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
    

  
</form>

</x-layout>
