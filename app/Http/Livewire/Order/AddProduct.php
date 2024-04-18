<?php

namespace App\Http\Livewire\Order;

use App\Product;
use App\ProductType;
use Livewire\Component;

class AddProduct extends Component
{
    public $allType,$name,$size,$product_type,$color,$harga_jual;
    public $stok = 0;
    public $hpp = 0;
    public function mount(){
        $this->allType = ProductType::all();
    }
    public function save(){
        $product = new Product();
        $product->name = $this->name;
        $product->type = $this->product_type;
        $product->size = strtoupper($this->size);
        $product->color = strtoupper($this->color);
        $product->stock  = $this->stok;
        $product->hpp = getAmount($this->hpp??0);
        $product->harga_jual = getAmount($this->harga_jual??0);
        $product->save();

        $this->reset();
        $this->emit('closeModal');
        $this->emit('reloadProduk');
        $this->emit('success');
    }
    public function render()
    {
        return view('livewire.order.add-product');
    }
}
