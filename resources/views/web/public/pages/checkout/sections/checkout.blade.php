<div class="container relative space-y-8">
    <x-public.section-badge 
        icon="fad fa-cart-arrow-down" 
        sectionName="Checkout" 
        class="text-blue-500 bg-blue-100 dark:bg-slate-600 dark:text-blue-300">
    </x-public.section-badge>
    <div class="flex gap-8 px-3">
        <div class="w-3/5">
            <div class="p-5 border space-y-4 rounded-lg">
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="nama-lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama lengkap</label>
                        <input type="text" id="nama-lengkap" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="w-1/2">
                        <label for="nomor-tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor telepon</label>
                        <input type="number" id="nomor-tlp" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provinsi</label>
                        <select type="text" id="provinsi" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>- Pilih provinsi -</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="kabupaten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kabupaten</label>
                        <select type="text" id="kabupaten" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>- Pilih kabupaten -</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Alamat lengkap</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                </div>                
            </div>
            <x-public.checkout-item></x-public.checkout-item>
            <x-public.checkout-item></x-public.checkout-item>
            <x-public.checkout-item></x-public.checkout-item>
        </div>
        <div class="w-2/5">
            <div class="sticky top-4 shadow-lg p-6 border rounded-lg space-y-6">
                <div class=" space-y-2">
                    <span>Pilih kurir pengiriman</span>
                    <div class="flex">
                        <div class="flex items-center mr-4">
                            <input id="kurir-radio" type="radio" value="" name="kurir-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="kurir-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">JNE</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input id="kurir-2-radio" type="radio" value="" name="kurir-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="kurir-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">TIKI</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input checked id="kurir-checked-radio" type="radio" value="" name="kurir-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="kurir-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">POS</label>
                        </div>
                    </div>
                </div>
                <div class=" space-y-2">
                    <span>Pilih service kurir</span>
                    <div class="flex">
                        <div class="flex items-center mr-4">
                            <input id="service-kurir-radio" type="radio" value="" name="service-kurir-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="service-kurir-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">OKE - Rp15.000</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input id="service-kurir-2-radio" type="radio" value="" name="service-kurir-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="service-kurir-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">REG - Rp20.000</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="space-y-1">
                    <div class="flex justify-between">
                        <span>Harga semua busana:</span>
                        <span>Rp320.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya ongkir(300gram):</span>
                        <span>Rp20.000</span>
                    </div>
                </div>
                <span class="text-lg block leading-none">Total Harga:</span>
                <div class="flex justify-end">
                    <span class="text-2xl leading-none font-semibold block text-green-500">Rp340.000</span>
                </div>
                <hr>
                <x-public.button-secondary buttonName="Pilih Pembayaran" color="green" class="w-full" data-modal-toggle="pilih-pembayaran"></x-public.button-secondary>
            </div>
            <x-public.modal modalId="pilih-pembayaran" class="max-w-sm">
                <x-slot:modalContent class="bg-white dark:bg-slate-800 max-w-sm">
                    <x-slot:modalHeader class="border-b dark:border-slate-700">
                        <h3 class="font-semibold text-blue-600 dark:text-blue-300">
                            Pilih Pembayaran
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
                        <x-public.button-secondary data-modal-toggle="pilih-pembayaran" buttonName="Tutup" color="blue"></x-public.button-secondary>
                    </x-slot:modalFooter>
                </x-slot:modalContent>
            </x-public.modal>
        </div>
    </div>
</div>