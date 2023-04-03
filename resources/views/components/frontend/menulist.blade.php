<li
    class="float-left text-slate-200 last:pr-3 pl-3 lg:pl-4 xl:pl-5 2xl:pl-6 hover:text-white mb-0.5 last:mb-0 @if (in_array(Request::segment(1), [$attributes['href'] === 'homepage' ? '' : $attributes['href']])) {{ '!text-[#c7ad1e] ' }} @endif">
    <a class="block pb-[6px] link link-underline link-underline-black"
        href="{{ route('frontend.' . $attributes['href']) }}">
        <div class="flex items-center justify-between">
            <div class="flex items-center grow">
                <span
                    class="text-[11.5px] min-[688px]:text-[13px] lg:text-sm xl:text-base 2xl:text-lg">{{ $attributes['title'] }}</span>
            </div>
        </div>
    </a>

</li>
