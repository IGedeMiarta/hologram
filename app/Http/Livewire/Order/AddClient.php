<?php

namespace App\Http\Livewire\Order;

use App\Client;
use Livewire\Component;

class AddClient extends Component
{
    public $clientName,$clientPhone,$clientAddress,$clientNotes;

    public function render()
    {
        return view('livewire.order.add-client');
    }
    public function save()
    {
        Client::create([
            'name'=> $this->clientName,
            'phone'=> $this->clientPhone,
            'address'=> $this->clientAddress,
            'notes'=> $this->clientNotes,
        ]);
        $this->emit('closeModal');
        $this->emit('reloadClient');
        $this->emit('success');
    }
}
