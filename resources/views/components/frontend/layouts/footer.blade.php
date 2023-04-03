{{-- Footer --}}
<div class="flex-col items-center justify-center pt-8 md:pt-12 lg:pt-16 bg-slate-800">
    <div class="w-full px-6 xl:max-w-7xl xl:mx-auto">
        <div class="grid grid-cols-1 gap-6 divide-gray-500 md:divide-x-2 md:grid-cols-3 divide-dashed">
            <div>
                <p class="text-xl font-bold tracking-wider text-white">About Us</p>
                <p class="mt-4 text-sm tracking-wide text-white">{{ $company->about_us }}</p>
            </div>
            <div class="md:pl-6">
                <p class="text-xl font-bold tracking-wider text-white">Contact Us</p>
                <div class="flex-col mt-4">
                    <a href="tel:<?php echo preg_replace('/^0?/', '+855', $company->phone_number); ?>" class="flex items-center">
                        <x-frontend.icon name='bi-phone-fill' class='w-4 h-4' />&nbsp;&nbsp;<span
                            class="text-sm text-white">{{ preg_replace('/^0?/', '+855(0) ', $company->phone_number) }}</span>
                    </a>
                    <a href="tel:<?php echo preg_replace('/^0?/', '+855', $company->hotline); ?>" class="flex items-center mt-2">
                        <x-frontend.icon name='fas-phone' class='w-4 h-4' />&nbsp;&nbsp;<span
                            class="text-sm text-white">{{ preg_replace('/^0?/', '+855(0) ', $company->hotline) }}</span>
                    </a>
                    <a href="mailto:{{ $company->email }}" class="flex items-center mt-2">
                        <x-frontend.icon name='uiw-mail' class='w-4 h-4' />&nbsp;&nbsp;<span
                            class="text-sm text-white">{{ $company->email }}</span>
                    </a>
                    <div class="flex items-center mt-2">
                        <x-frontend.icon name='fontisto-map-marker-alt' class='w-4 h-4' />&nbsp;&nbsp;<span
                            class="text-sm text-white">{{ $company->address }}</span>
                    </div>
                </div>
            </div>
            <div class="flex md:justify-center">
                <div>
                    <p class="text-xl font-bold tracking-wider text-white">WeChat</p>
                    <p class="text-sm tracking-wide text-white">ID: {{ $company->wechat_id }}</p>
                    <img src="{{ $company->wechatPath }}" width="120" height="120" class="mt-4" />
                </div>
            </div>
        </div>
    </div>
    <div class="flex pt-10 pb-6 pl-6 md:pl-0 md:justify-center">
        <div class="flex flex-col gap-6 pb-4 md:flex-row">
            <p class="text-gray-400">© 2023-2024 <a href="https://bestangkordriver.com/"
                    class="text-blue-300">{{ config('app.name', 'Best Angkor Driver') }}</a>
                All Rights Reserved.</p>
            <p class="text-gray-400">Power By: <a href="https://tecgos.com/" class="text-blue-300">Tecgos
                    Cambodia</a></p>
        </div>
    </div>
</div>
