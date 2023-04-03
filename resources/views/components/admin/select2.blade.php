<div wire:ignore>
    <label for="{{ $attributes['name'] }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $attributes['title'] }} @if ($attributes['required'])
            *
        @endif
    </label>
    {{ $slot }}
</div>
@error($attributes['model'])
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
@enderror
