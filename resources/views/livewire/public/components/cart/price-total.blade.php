<div>
    <div class="sticky top-4 shadow-lg p-6 rounded-lg space-y-4">
        <span class="text-lg block leading-none">Total Harga:</span>
        <div>
            <span class="text-2xl font-semibold block">@rupiah($total)</span>
            <span class="text-sm font-medium block">{{'@'.$berat}}gram</span>
        </div>
        <p class="text-sm text-gray-500">*Harga belum termasuk ongkir dan admin pembayaran</p>
        <x-public.button-primary buttonName="Checkout" color="green" class="w-full"></x-public.button-primary>
    </div>
</div>
