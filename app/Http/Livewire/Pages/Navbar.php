<?php

namespace App\Http\Livewire\Pages;

use App\Contact;
use Livewire\Component;

class Navbar extends Component
{
    public $message,$countMessage;
    public function mount(){
        $this->message = Contact::orderByDesc('id')->take(5)->get();
        $this->countMessage = Contact::whereDate('created_at', today())->orderByDesc('id')->count();
    }
    public function render()
    {
        return view('livewire.pages.navbar');
    }
}
