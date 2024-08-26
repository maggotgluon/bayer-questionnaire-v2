<?php

namespace App\Livewire\Admin;

use App\Models\client as ModelsClient;
use Livewire\Component;

class Client extends Component
{
    public $client;
    public function mount(){
        $this->client=ModelsClient::all();
    }
    public function render()
    {
        return view('livewire.admin.client')->extends('layouts.admin');
    }
}
