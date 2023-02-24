<section id="brand" class="my-8">
    <div class="container space-y-8">
        <x-public.section-badge 
            icon="fad fa-tags" 
            sectionName="Brands" 
            class="text-blue-500 bg-blue-100 dark:bg-slate-600 dark:text-blue-300">
        </x-public.section-badge>
        <div class="flex-wrap px-3 justify-center grid grid-cols-3 lg:grid-cols-6 gap-3">
            @if (count($brands) > 5)
                @for ($i = 0; $i < 1; $i++)
                    <div class="block">
                        <x-public.brand :brand="$brands[$i]"></x-public.brand>
                    </div>
                @endfor
                <div class="block">
                    <button type="button" data-modal-toggle="brandsList"
                        class="flex flex-col items-center p-4 gap-2 h-full justify-center rounded-lg bg-blue-100 text-blue-500 dark:bg-slate-600 dark:text-blue-300">
                        <span class="text-center text-sm lg:text-base">Lihat lainnya...</span>
                    </button>
                </div>
            @else
                @for ($i = 0; $i < count($brands); $i++)
                    <div class="block">
                        <x-public.brand :brand="$brands[$i]"></x-public.brand>
                    </div>
                @endfor
            @endif
        </div>
    </div>
    @if (count($brands) > 5)
        <x-public.modal modalId="brandsList">
            <x-slot:modalContent class="bg-white dark:bg-slate-800">
                <x-slot:modalHeader class="border-b dark:border-slate-700">
                    <h3 class="font-semibold text-blue-600 dark:text-blue-300">
                        Daftar brand lainnya
                    </h3>
                    <button type="button"
                        class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                        data-modal-toggle="brandsList">
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
                    <div class="flex-wrap px-3 justify-center grid grid-cols-3 lg:grid-cols-5 gap-3">
                        @for ($j = $i; $j < count($brands); $j++)
                            <div class="block">
                                <x-public.brand :brand="$brands[$i]"></x-public.brand>
                            </div>
                        @endfor
                    </div>
                </x-slot:modalBody>
                <x-slot:modalFooter class="border-t dark:border-slate-700">
                    <x-public.button-secondary data-modal-toggle="brandsList" buttonName="Tutup" color="blue"></x-public.button-secondary>
                </x-slot:modalFooter>
            </x-slot:modalContent>
        </x-public.modal>
    @endif
</section>
