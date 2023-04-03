<div class="flex">
    @if ($attributes['link'])
        <a href="{{ $attributes['link'] }}">
            <x-frontend.icon name='css-chevron-left' class='w-8 h-8 mr-2' color='text-gray-700' />
        </a>
    @endif
    <h1 class="text-2xl font-bold">{{ $attributes['title'] }}</h1>

</div>
