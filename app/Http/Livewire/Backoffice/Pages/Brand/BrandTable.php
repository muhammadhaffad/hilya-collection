<?php

namespace App\Http\Livewire\Backoffice\Pages\Brand;

use App\Models\ProductBrand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandTable extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $brands = ProductBrand::search($this->search)->paginate(15);
        return view('livewire.backoffice.pages.brand.brand-table', [
            'brands' => $brands
        ]);
    }
}
