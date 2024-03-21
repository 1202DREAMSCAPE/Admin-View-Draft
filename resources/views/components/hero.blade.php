@props([
  'title' => null,
  'afterTitle' => null,
])

<!--margin sa title and content-->
<div {{ $attributes->merge(['class' => 'py-5 bg-gray-100 text-black mb-2']) }}>
  <x-container>
    <h1 class="text-4xl">{{ $title ?? $slot }}</h1>

    @if ($afterTitle)
      <div class="mt-4">
        {{ $afterTitle }}
      </div>
    @endif
  </x-container>
</div>
