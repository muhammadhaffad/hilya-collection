<div class="container relative space-y-8">
    <x-public.section-badge 
        icon="" 
        sectionName="#INV-123123" 
        class="text-blue-500 bg-blue-100 dark:bg-slate-600 dark:text-blue-300">
    </x-public.section-badge>
    <div class="flex gap-8 px-3">
        <div class="w-3/5">
            <div class="p-5 border space-y-4 rounded-lg">
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="nama-lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama lengkap:</label>
                        <span class="font-medium">Muhammad Haffad</span>
                    </div>
                    <div class="w-1/2">
                        <label for="nomor-tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor telepon:</label>
                        <span class="font-medium">085807198536</span>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provinsi:</label>
                        <span class="font-medium">Jawa Timur</span>
                    </div>
                    <div class="w-1/2">
                        <label for="kabupaten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kabupaten:</label>
                        <span class="font-medium">Lamongan</span>
                    </div>
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Alamat lengkap:</label>
                    <span class="font-medium">Ds. Ngambeg RT 07 RW 01, Kec. Pucuk, Kab. Lamongan, Jawa Timur</span>
                </div>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="kurir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kurir pengiriman:</label>
                        <span class="font-medium">JNE OKE (Rp15.000)</span>
                    </div>
                    <div class="w-1/2">
                        <label for="kurir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Metode pembayaran:</label>
                        <span class="font-medium">BRI VA</span>
                    </div>
                </div>
            </div>
            <x-public.checkout-item></x-public.checkout-item>
            <x-public.checkout-item></x-public.checkout-item>
            <x-public.checkout-item></x-public.checkout-item>
        </div>
        <div class="w-2/5">
            <div class="sticky top-4 shadow-lg p-6 border rounded-lg space-y-6">
                <div class="flex justify-between">
                    <span
                        class="flex items-center gap-1 w-max bg-yellow-500 h-min text-white text-xs font-semibold px-2.5 py-1 rounded dark:bg-yellow-200 dark:text-yellow-900">
                        BELUM DIBAYAR
                    </span>
                    <span
                        class="flex items-center gap-1 w-min bg-slate-800 h-min text-white text-xs font-semibold px-2.5 py-1 rounded dark:bg-slate-200 dark:text-slate-900">
                        <i class="fa fa-stopwatch text-white"></i>
                        23:59:40
                    </span>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between">
                        <span>Harga semua busana:</span>
                        <span>Rp320.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya ongkir(300gram):</span>
                        <span>Rp20.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya admin:</span>
                        <span>Rp4.000</span>
                    </div>
                </div>
                <span class="text-lg block leading-none">Total Harga:</span>
                <div class="flex justify-end">
                    <span class="text-2xl leading-none font-semibold block text-green-500">Rp344.000</span>
                </div>
                <hr>
                <x-public.button-primary buttonName="Bayar" color="green" class="w-full" data-modal-toggle="pilih-pembayaran"></x-public.button-primary>
            </div>
            <x-public.modal modalId="pilih-pembayaran" class="max-w-sm">
                <x-slot:modalContent class="bg-white dark:bg-slate-800 max-w-sm">
                    <x-slot:modalHeader class="border-b dark:border-slate-700">
                        <h3 class="font-semibold text-green-600 dark:text-green-300">
                            Langkah Pembayaran
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                            data-modal-toggle="pilih-pembayaran">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </x-slot:modalHeader>
                    <x-slot:modalBody>
                        <span>Bank Transfer</span>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="p-2 border flex justify-center items-center">
                                <img src="https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2020/09/fc68a00838f69124fddaf64e30f5e958_ca45aac69ce87ce691c3e6582894b6f0_compressed.png">
                            </div>
                            <div class="p-2 border flex justify-center items-center">
                                <img src="https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2020/09/0fcddd245474380834dfe5f3beb0492f_093eb297aba2188382cf91e556dd9bdf_compressed.png">
                            </div>
                            <div class="p-2 border flex justify-center items-center">
                                <img src="https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2020/09/f6f57e9126c57179cf729cc9586e47c0_e26ce4cce944fe379072ae509fe72ec1_compressed.png">
                            </div>
                            <div class="p-2 border flex justify-center items-center">
                                <img src="https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2020/09/11f8970a182ad8cf6aaf0a0cd22dd9ad_3948cb3bf5c4887c7cca7ca7ee421708_compressed.png">
                            </div>
                            <div class="p-2 border flex justify-center items-center">
                                <img src="https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2020/09/fd0b98e32adc5a52229b7be2e5872c92_bc5e15f9d4b3eedc3d459c45e2df7709_compressed.png">
                            </div>
                        </div>
                        <p class="text-sm text-slate-500">*Biaya administrasi Rp4.000 tiap transaksi</p>
                    </x-slot:modalBody>
                    <x-slot:modalFooter class="border-t dark:border-slate-700">
                        <x-public.button-secondary data-modal-toggle="pilih-pembayaran" buttonName="Tutup" color="green"></x-public.button-secondary>
                    </x-slot:modalFooter>
                </x-slot:modalContent>
            </x-public.modal>
        </div>
    </div>
</div>