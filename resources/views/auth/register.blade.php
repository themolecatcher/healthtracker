<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

<form method="POST" action="/meals">
    @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
         <x-form-label for="email">Email</x-form-label>
          <div class="mt-2">
           <x-form-input type="text" name="email" id="email" autocomplete="email" aria-placeholder="example@test.com" required/>
            <x-form-error name="email"/>
        </x-form-field>
        </div>

        <x-form-field>
         <x-form-label for="password">Password</x-form-label>
          <div class="mt-2">
           <x-form-input type="password" name="password" id="password" autocomplete="password" required/>
            <x-form-error name="password"/>
        </x-form-field>
        </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <x-form-button>Register</x-form-button>
  </div>
</form>

</x-layout>
