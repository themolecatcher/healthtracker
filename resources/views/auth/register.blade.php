<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

<form method="POST" action="/register">
    @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">

    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
         <x-form-label for="first_name">First name</x-form-label>

          <div class="mt-2">
           <x-form-input type="text" name="first_name" id="first_name" autocomplete="first_name" aria-placeholder="John" required/>
            <x-form-error name="first_name"/>
        </x-form-field>
        </div>

        <x-form-field>
         <x-form-label for="last_name">Last name</x-form-label>

          <div class="mt-2">
           <x-form-input type="text" name="last_name" id="last_name" autocomplete="last_name" aria-placeholder="Doe" required/>
            <x-form-error name="last_name"/>
        </x-form-field>
        </div>

        <x-form-field>
         <x-form-label for="email">Email</x-form-label>

          <div class="mt-2">
           <x-form-input type="email" name="email" id="email" autocomplete="email" aria-placeholder="example@test.com" required/>
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

        <x-form-field>
         <x-form-label for="password_confirmation">Confirm password</x-form-label>
          <div class="mt-2">
           <x-form-input type="password" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" required/>
            <x-form-error name="password_confirmation"/>
        </x-form-field>
        </div>

  <div class="mt-6 gap-x-6">
    <x-form-button>Register</x-form-button>
  </div>
</form>

</x-layout>
