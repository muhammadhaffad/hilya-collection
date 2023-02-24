<div class="container relative space-y-8">
    <x-public.section-badge 
        icon="fad fa-shopping-cart" 
        sectionName="Keranjang" 
        class="text-blue-500 bg-blue-100 dark:bg-slate-600 dark:text-blue-300">
    </x-public.section-badge>
    <form action="{{route('home.store-checkout')}}" method="post">
        @csrf
        <div class="flex gap-8 px-3">
            <div class="w-2/3">
                @foreach ($carts as $item)
                    @livewire('public.components.cart.cart-item', ['cartItem' => $item])
                @endforeach
            </div>
            <div class="w-1/3">
                @livewire('public.components.cart.price-total')
            </div>
        </div>
    </form>
    @livewire('public.components.cart.item-delete-modal')
</div>