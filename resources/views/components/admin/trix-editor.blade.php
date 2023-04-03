<div class="{{ $attributes['class'] ?? 'col-span-1 sm:col-span-2' }}">
    <label for="{{ $attributes['name'] }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $attributes['title'] }} @if ($attributes['required'])
            *
        @endif
    </label>
    <input type="hidden" id="{{ $attributes['name'] }}" value="{{ $attributes['value'] }}"
        name="{{ $attributes['name'] }}">
    <div wire:ignore>
        <trix-editor class="trix-content" input="{{ $attributes['name'] }}" wire:model.defer="{{ $attributes['model'] }}">
        </trix-editor>
    </div>
    @error($attributes['model'])
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
<script>
    var trixEditor = document.getElementById("{{ $attributes['name'] }}")

    addEventListener("trix-blur", function(event) {
        @this.set("{{ $attributes['model'] }}", trixEditor.getAttribute('value'))
    })
    // prevents attachments:
    addEventListener("trix-file-accept", function(event) {
        event.preventDefault();
    });
</script>
