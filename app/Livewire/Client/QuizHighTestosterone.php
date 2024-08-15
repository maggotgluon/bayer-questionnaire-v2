<?php

namespace App\Livewire\Client;

use App\Models\client;
use Livewire\Component;

class QuizHighTestosterone extends Component
{

    public $client;

    public $page=1;

    public function mount(client $client = null){
        if($client->type=="HighTestosterone"){
            $this->client=$client;
        }else{
            dd($client);
        }
    }
    public function render()
    {
        return view('livewire.client.quiz-high-testosterone');
    }


    public function goto($page=null){
        if($page){
            $this->page=$page;
        }else{
            $this->page+=1;
        }
    }
    public function back(){
        $this->page-=1;
        if($this->page<=1){
            $this->page=1;
        }
        $this->updateClientProgress();
    }
    public function next(){
        $this->page+=1;
        if($this->page>=8){
            $this->page=8;
        }
        $this->updateClientProgress();
    }
    public function updateClientProgress(){
        $this->client->progress=$this->page;
        $this->client->save();
    }
}
