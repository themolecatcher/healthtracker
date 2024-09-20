@props(['name'])

@error($name)
<p {{$attributes->merge(['class'=> 'col-span-full flex p-1 mt-1 text-sm font-bold text-red-800 rounded-lg dark:text-red-400', 'role' => 'alert'])}}>{{ $message }}</p>
@enderror