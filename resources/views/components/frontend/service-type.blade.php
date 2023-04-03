@props([
    'service_type' => null,
])

@if ($service_type)
    <div class="mb-16">
        <div class="flex items-center gap-4 ">
            <x-frontend.icon name='{{ $service_type->icon }}' class="w-6 h-6 transform -scale-x-100" />
            <p class="text-lg font-bold tracking-wide text-gray-700">{{ $service_type->title }}
            </p>
        </div>
        <div class="flex-col w-full mt-6 divide-y-2">
            @foreach ($service_type->services as $service_key => $service)
                @if ($service_key === 0)
                    <div class="flex py-4">
                        <p class="w-8/12 text-[14px] font-medium tracking-wide text-gray-500 uppercase">
                            {{ $service_type->service_title }}</p>
                        @if ($service->people)
                            <p class="w-2/12 text-[14px] font-medium tracking-wide text-center text-gray-500">
                                PEOPLE
                            </p>
                        @endif
                        @if ($service->price)
                            <p class="w-2/12 text-[14px] font-medium tracking-wide text-right text-gray-500">
                                PRICE
                            </p>
                        @endif
                        @if ($service->van_price)
                            <p class="w-2/12 text-[14px] font-medium tracking-wide text-right text-gray-500">
                                VAN
                            </p>
                        @endif
                        @if ($service->car_price)
                            <p class="w-2/12 text-[14px] font-medium tracking-wide text-right text-gray-500">
                                CAR
                            </p>
                        @endif
                    </div>
                @endif
                <div class="flex py-6">
                    <p class="w-8/12 text-[14px] tracking-wide text-gray-800">
                        {{ $service->title }}
                    </p>
                    @if ($service->people)
                        <p class="w-2/12 text-[14px] tracking-wide text-center text-gray-800">
                            {{ $service->people }}</p>
                    @endif
                    @if ($service->price)
                        <p class="w-2/12 text-[14px] tracking-wide text-right text-gray-800">
                            {{ convert($service->price) }}
                        </p>
                    @endif
                    @if ($service->car_price)
                        <p class="w-2/12 text-[14px] tracking-wide text-right text-gray-800">
                            {{ convert($service->car_price) }}
                        </p>
                    @endif
                    @if ($service->van_price)
                        <p class="w-2/12 text-[14px] tracking-wide text-right text-gray-800">
                            {{ convert($service->van_price) }}
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
