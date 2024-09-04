@props(['name'])

@error($name)
<div class="text-red-600 italic text-sm font-semibold">
    {{$message}}
</div>
@enderror