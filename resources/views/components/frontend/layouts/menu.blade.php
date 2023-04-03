<div
    class="absolute z-20 items-center justify-between hidden h-24 max-w-6xl ml-auto mr-auto xl:max-w-7xl inset-3 sm:flex">
    <a href="{{ route('frontend.homepage') }}">
        <div class="flex items-center">
            <img src="/images/logo-white.png" class="object-cover w-[50px] lg:w-[70px] xl:w-[80px]" />

            <div>
                <p class="font-semibold"><span class="text-color text-[14px] xl:text-xl lg:text-lg">BEST</span>&nbsp;<span
                        class="text-[14px] lg:text-lg xl:text-xl text-white">ANGKOR</span></p>
                <fieldset class="border-t border-slate-300">
                    <legend class="px-[6px] mx-auto text-white xl:text-xl text-[14px] lg:text-lg !font-[satisfy]">
                        Driver</legend>
                </fieldset>
            </div>
        </div>
    </a>
    <div class="flex items-center justify-evenly">
        <ul class="mt-2 mr-2 lg:mr-8">
            <!-- Home -->
            <x-frontend.menulist title='HOME' href='homepage' />
            <x-frontend.menulist title='TOUR PACKAGES' href='tour-packages' />
            <x-frontend.menulist title='DESTINATIONS' href='destinations' />
            <x-frontend.menulist title='OUR SERVICES' href='our-services' />
            <x-frontend.menulist title='CONTACT US' href='contact-us' class="scale-x-[-1]" />
        </ul>
        <button class="" @click.stop="modelSearch=!modelSearch">
            <span class="sr-only">Open search</span>
            <x-frontend.icon name='css-search' class='w-5 h-5 min-[688px]:w-[22px] min-[688px]:h-[22px] xl:w-7 xl:h-7'
                color='text-white' />
        </button>
    </div>
</div>
