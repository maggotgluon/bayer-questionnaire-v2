<?php

namespace App\Livewire\Admin;

use App\Models\client;
use Livewire\Component;

class Index extends Component
{
    public $clients;
    public $datefrom;
    public $dateto;
    public function mount(){
        $this->clients=client::all();
    }
    public function render()
    {
        $this->clients=$this->clients->when($this->datefrom,function($c,$value){
            // dd('from',$c,$value);
            return $c->where('created_at','>=',$value);
        })->when($this->dateto,function($c,$value){
            // dd('to',$c);
            return $c->where('created_at','<=',$value);
        });
        // dd($this->clients);
        return view('livewire.admin.index')->extends('layouts.admin');
    }

    public function download(){
        dd($this->clients);
    }
}
