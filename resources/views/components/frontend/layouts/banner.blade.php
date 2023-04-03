<div class="relative w-full h-full sm:h-[240px] md:h-[320px] lg:h-[390px] xl:h-[480px] 2xl:h-[65vh]">
    <x-frontend.layouts.menu />
    <img src="{{ $attributes['banner'] }}" class="object-cover w-full h-full" />
    <div class="absolute inset-0 bg-gradient-to-t from-[#0000003c] to-[#000000cb] ">
        <div class="table w-full h-full">
            <div class="table-cell px-8 align-middle">
                <div class="flex flex-col items-center justify-center max-w-2xl ml-auto mr-auto 2xl:max-w-4xl">
                    <p
                        class="text-[26px] sm:text-[28px] md:text-[30px] lg:text-[32px] xl:text-[36px] 2xl:text-[38px] tracking-widest font-extrabold text-white">
                        {{ $attributes['title'] }}</p>
                    <p class="mt-4 text-base tracking-wider sm:text-lg lg:text-xl xl:text-2xl text-color">
                        {{ $attributes['description'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
