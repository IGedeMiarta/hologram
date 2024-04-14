<?php

namespace App\Http\Livewire\Order;

use App\Client;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $client,$due_date;
    public $client_id;
    public $products;
    public $product_id;
    public $jml;
    public $notes;
    public $total = 0;
    public $desain_front;
    public $desain_back;
    public $order_notes;
    public $dp_amount;
    public $disc_name;
    public $disc_percent;
    public $disc_amount;
    public $charge_name;
    public $charge_percent;
    public $charge_amount;
    public $fin_amount;
    

    public $table = [];
    public function mount(){
        $this->client = Client::all();
        $this->products = Product::all();
    }
    public function addProduk()
    {
        // Validate input data if needed
        $no = count($this->table) +1;
        $product = Product::find($this->product_id);
        $this->table[] = [
            'no'        => $no,
            'produk_id' => $this->product_id,
            'produk_name' => $product->name,
            'size'         => strtoupper($product->size),
            'color'         => $product->color,
            'produk_jml' => $this->jml,
            'produk_price' => num($product->harga_jual),
            'total'         => num($this->jml * $product->harga_jual),
            'produk_notes' => $this->notes,
        ];
        $this->total =  $this->getTotalAmount();
        
        $this->product_id = null;
        $this->jml = null;
        $this->notes = null;
        $this->fin_amount = $this->getFinAmount();
    }
    public function submitOrder(){
        $client = $this->client_id;
        $trx = trx(); 
        $due = $this->due_date;
        $notes = $this->order_notes;
        $cashier_id = auth()->user()->id;
        $total = $this->total;
        $charge_name = $this->charge_name;
        $charge_percent = $this->charge_percent??0;
        $charge_amount = getAmount($this->charge_amount??0);

        $disc_name = $this->disc_name;
        $disc_percent = getAmount($this->disc_percent);
        $disc_amount = getAmount($this->disc_amount??0);


        // $desain_front = $this->desain_front->store('order');
        if ($this->desain_front) {
            $desainFrontPath = $this->desain_front->store('public/images/order');
            $desainFrontUrl = Storage::url($desainFrontPath);
            // Use $desainFrontUrl as needed
            $desain_front =   $desainFrontUrl;
        } else {
            $desain_front = null;
        }
        if ($this->desain_back) {
            $desainBackPath = $this->desain_back->store('public/images/order');
            $desainBackUrl = Storage::url($desainBackPath);
            // Use $desainBackUrl as needed
            $desain_back =   $desainBackUrl;
        } else {
            $desain_back = null;
        }
        dd($client,$trx,$due,$desain_front,$desain_back,$disc_amount,$charge_amount);
    }
    public function setProductId($id){
        $this->product_id = $id;
    }
    public function render()
    {
        return view('livewire.order.create');
    } 
    public function getTotalAmount()
    {
        $totalAmount = 0;
        foreach ($this->table as $item) {
            $totalAmount += getAmount($item['total']??0);
        }
        
        return $totalAmount;
    }
    public function getFinAmount(){
        $total = $this->getTotalAmount();
        //cek diskon %;
        if($this->disc_percent != 0||$this->disc_percent != null){
            $disc_percen = $total * $this->disc_percent/100;
        }else{
            $disc_percen = 0;
        }
        // total dikurangi diskon;
        $total -= $disc_percen;
        $total -= getAmount($this->disc_amount);

        if($this->charge_percent != 0 || $this->charge_percent != null){
            $charge_percent = $total * $this->charge_percent/100;
        }else{
            $charge_percent = 0;
        }

        $total += $charge_percent;
        $total += getAmount($this->charge_amount);

        return $total;

    }
    public function checkAmount(){

        $this->fin_amount = $this->getFinAmount();
        $this->render();
    }

    public function deleteRow($index)
    {
        unset($this->table[$index]);
        $this->total =  $this->getTotalAmount();
    }

    protected $listeners = ['reloadClient'];
    public function reloadClient()
    {
        $client = Client::orderByDesc('id')->first();
        $this->client = $client->id;
        $this->mount();
        $this->render();
    }
}
