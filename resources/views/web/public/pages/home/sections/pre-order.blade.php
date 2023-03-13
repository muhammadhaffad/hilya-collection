<section id="preorder">
    <div class="container space-y-8">
        <div class="flex justify-start space-x-2 items-center">
            <x-public.section-badge 
                icon="fad fa-shipping-timed" 
                sectionName="Preorder" 
                class="text-green-500 bg-green-100 dark:bg-slate-600 dark:text-green-300">
            </x-public.section-badge>
            @if ($preorder->count() > 10)
                <a href="{{ route('home.type-products', ['status' => 'preorder']) }}"
                    class="self-baseline text-xs text-blue-500 hover:text-blue-800 focus:text-blue-800 focus:font-semibold font-semibold block lg:text-lg">Lihat
                    Semua</a>
            @endif
        </div>
        @if ($preorder->count() < 1)
            <x-public.products-empty text="Mohon maaf 🙏, data masih kosong..."></x-public.products-empty>
        @else
            <div class="grid grid-cols-2 gap-4 lg:gap-9 px-3 lg:grid-cols-4">
                @for ($i = 0; $i < 8; $i++)
                    @php
                        if ($i < count($preorder)) {
                            $prod = $preorder[$i];
                        } else {
                            break;
                        }
                    @endphp
                    <x-public.product-card :product="$prod"></x-public>
                @endfor
                @if ($preorder->count() > 8)
                    <a href="{{ route('home.type-products', ['status' => 'promo']) }}">
                        <div class="group h-full">
                            <div
                                class="relative flex justify-center items-center cursor-pointer w-full rounded-lg bg-green-100 h-full">
                                <span class="font-semibold text-green-500 text-center">
                                    Lihat semua promo...
                                </span>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
        @endif
    </div>
</section>
