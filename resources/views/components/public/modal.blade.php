@aware([
    'modalId', 
    'modalContent', 
    'modalHeader',
    'modalBody',
    'modalFooter'
    ])
<div>
    <div id="{{ $modalId }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full" {{ $attributes->merge(['class'])->merge() }}>
        <div {{ $attributes->merge(['class'=>'relative p-4 w-full max-w-4xl h-full md:h-auto']) }}>
            <!-- Modal content -->
            <div {{ $modalContent->attributes->merge(['class' => 'relative rounded-lg shadow']) }}>
                <!-- Modal header -->
                <div {{ $modalHeader->attributes->merge(['class' => 'flex justify-between items-center p-4 rounded-t']) }}>
                    {{ $modalHeader }}
                </div>
                <!-- Modal body -->
                <div {{ $modalBody->attributes->merge(['class' => 'p-6 space-y-6']) }}>
                    {{ $modalBody }}
                </div>
                <!-- Modal footer -->
                <div {{ $modalFooter->attributes->merge(['class' => 'flex justify-end items-center p-6 space-x-2 rounded-b']) }} >
                    {{ $modalFooter }}
                </div>
            </div>
        </div>
    </div>
</div>
