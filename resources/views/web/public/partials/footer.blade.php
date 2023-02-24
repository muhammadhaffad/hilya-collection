@php
    /* use App\Models\Brand;
    use App\Models\Contact;

    $brands = Brand::all();
    $contact = Contact::first(); */

@endphp

<footer class="w-full bg-slate-800">
    <div class="container">
        <div class="block lg:flex space-y-4 py-8 px-3 gap-3 justify-between">
            <div id="about" class="space-y-4 w-full lg:w-1/3">
                <h1 class="block font-medium text-slate-500 underline text-md">Hubungi kami</h1>
                <div class="grid grid-cols-2 gap-2 max-w-md">
                    <div class="text-white text-sm">
                        <span class="text-lg font-medium text-white">
                            Hilya Collection
                        </span>
                        <p>
                            {{$contact->alamat}}
                        </p>
                    </div>
                    <div class="text-white">
                        <p>
                            Telp.
                        <div class="flex items-center gap-2 text-sm text-white">
                            <div class="float-left">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </div>
                            {{$contact->telp}}
                        </div>
                        </p>
                    </div>
                </div>
                {!! $contact->map !!}
            </div>
            <div id="socmed" class="space-y-4 w-full lg:w-1/3">
                <h1 class="block font-medium text-slate-500 underline py-1 text-md">Media Sosial kami</h1>
            </div>
            <div id="links" class="space-y-4 w-full lg:w-1/3">
                <h1 class="block font-medium text-slate-500 underline py-1 text-md">Tautan</h1>
                <nav>
                    <ul class="block space-y-2">
                        <li class="group">
                            <a href="{{ request()->is('') ? '#' : route('home.index').'#'  }}" class="text-sm text-white py-1 group-hover:text-blue-500">Beranda</a>
                        </li>
                        <li class="group">
                            <a href="#about" class="text-sm text-white py-1 group-hover:text-blue-500">Kontak</a>
                        </li>
                        <li class="group">
                            <a href="{{ request()->is('detail/*') ? route('home.index').'#brand' : '#brand' }}" class="text-sm text-white py-1 group-hover:text-blue-500">Brand</a>
                        </li>
                        <li class="group">
                            <a href="{{ request()->is('promo/products') ? '#' : route('home.type-products', ['status' => 'promo']) }}" class="text-sm text-white py-1 group-hover:text-blue-500">Promo</a>
                        </li>
                        <li class="group">
                            <a href="{{ request()->is('pre-order/products') ? '#' : route('home.type-products', ['status' => 'pre-order']) }}" class="text-sm text-white py-1 group-hover:text-blue-500">Pre Order</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>
<div class="w-full bg-slate-900">
    <div class="container">
        <div class="flex justify-center items-center py-2">
            <span class="text-xs font-thin text-center text-white">
                Dibuat dengan 💖, menggunakan <span class="text-blue-500">Tailwind CSS</span>
            </span>
        </div>
    </div>
</div>