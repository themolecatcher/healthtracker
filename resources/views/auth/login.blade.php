<x-layout>
    <x-slot:heading>
       Login
    </x-slot:heading>

<form method="POST" action="/login">
    @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">

    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        <x-form-field>
         <x-form-label for="email">Email</x-form-label>

          <div class="mt-2">
           <x-form-input type="email" name="email" id="email" autocomplete="email" :value="old('email')" required/>
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

  <div class="mt-6 gap-x-6">
    <x-form-button>Login</x-form-button>
  </div>
</form>

</x-layout>
