<?php

namespace App\Livewire\Client;

use App\Models\client;
use Livewire\Component;

class QuizPMDD extends Component
{

    public $data = [];
    public $score=0;
    public $level;
    public $answer;
    public $client;

    public $page=1;

    public function mount(client $client = null){
        if($client->type=="PMDD"){
            $this->client=$client;
        }else{
            dd($client);
        }
    }

    public function render()
    {
        return view('livewire.client.quiz-PMDD');
    }

    public function quiz_1Submit(){
        $ans=$this->ans($this->data['quiz_1']);
        foreach($ans as $a){
            if($a!=5){
                $this->score+=1;
            }
        }
        // dd($this->data['quiz_1'],$ans,$this->score);
    }

    public function quiz_2Submit(){
        
        $ans=$this->ans($this->data['quiz_2']);
        foreach($ans as $a){
            if($a==6){
                $this->level="GREEN LEVEL";
            }else{
                $this->score+=1;
            }
        }
        // dd($this->data['quiz_2'],$ans);
    }
    public function quiz_3Submit(){
        // $ans=$this->ans($this->data['quiz_3']);
        if($this->data['quiz_3']==1){
            $this->score+=3;
        }else{
            $this->level="GREEN LEVEL";
        }
        dd($this->data['quiz_3']);
    }
    public function quiz_4Submit(){}
    public function getResult(){
        if($this->score>=7){

        }elseif($this->score>=3){

        }elseif($this->score<=2){

        }
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
        if($this->page>=10){
            $this->page=10;
        }
        $this->updateClientProgress();
    }
    public function updateClientProgress(){
        $this->client->progress=$this->page;
        $this->client->save();
    }
    public function ans($d){
        $ans=[];
        foreach($d as $key=>$value){
            if($value){
                $ans[]=$key;
            }
            // dd($key,$value);
        }
        return $ans;
    }
}
