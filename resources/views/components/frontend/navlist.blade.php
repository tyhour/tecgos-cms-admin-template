<li
    class=" px-3 py-2 text-slate-200 hover:text-white truncate transition duration-150 rounded-lg mb-0.5 last:mb-0 @if (in_array(Request::segment(1), [$attributes['href'] === 'homepage' ? '' : $attributes['href']])) {{ 'bg-slate-900 text-[#c7ad1e] hover:text-[#f1d11e]' }} @endif">
    <a class="block" href="{{ route('frontend.' . $attributes['href']) }}" x-on:click="frontSidebarOpen = false; ">
        <div class="flex items-center justify-between">
            <div class="flex items-center grow">
                <x-frontend.icon name="{{ $attributes['name'] }}" class="w-5 h-5 {{ @$attributes['class'] }}"
                    color='none' />
                <span class="ml-2 text-sm">{{ $attributes['title'] }}</span>
            </div>
        </div>
    </a>
</li>
