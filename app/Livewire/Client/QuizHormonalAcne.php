<?php

namespace App\Livewire\Client;

use App\Models\client;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class QuizHormonalAcne extends Component
{
    public $data = [];
    public $score=0;
    public $level;
    public $answer;
    public $client;

    public $page=1;

    public function mount(client $client = null){
        if($client->type=="HormonalAcne"){
            $this->client=$client;
        }else{
            dd($client);
        }
        // $this->client->symptom=[];
        // $this->page=6;
    }
    public function render()
    {
        return view('livewire.client.quiz-hormonal-acne');
    }


    public function quiz_1Submit(){
        $select = $this->client->symptom;
        if($this->data['quiz_1']==1){
            $select[]='สิวเกิดขึ้นในช่วง ก่อนมีประจำเดือน 1 สัปดาห์';
            $this->score+=3;
        }else{
            // $this->level="GREEN LEVEL";
        }
        $this->client->symptom=$select;
        $this->next();
    }
    public function quiz_2Submit(){

        $select = $this->client->symptom;
        $ans=$this->ans($this->data['quiz_2']);
        foreach($ans as $a){
            if($a==1){
                $select[] = 'สิวอุดตันหัวดำ';
            }
            if($a==2){
                $select[] = 'สิวอุดตันหัวขาว';
            }
            if($a==3){
                $select[] = 'สิวตุ่มหนอง';
            }
            if($a==4){
                $select[] = 'สิวหัวช้าง';
            }
            if($a==5){
                $select[] = 'สิวผด';
            }
            if($a!=5){
                $this->score+=1;
            }
        }
        $this->client->symptom=$select;
        $this->next();
    }
    public function quiz_3Submit(){
        $select = $this->client->symptom;
        $ans=$this->data['quiz_3'];
        if($ans!=5){
            if($ans==1){
                $select[]='ประจำเดือนมา ๆ หาย ๆ เดาใจยากเหมือนคนคุย';
            }
            if($ans==2){
                $select[]='หน้ามัน เหมือนหนังปลาทู';
            }
            if($ans==3){
                $select[]='ขนดก เหมือนผู้ชายมาดแมน';
            }
            if($ans==4){
                $select[]='ผมร่วงเหมือนใบไม้แห้ง';
            }
            $this->score+=1;

            $this->client->type='HighTestosterone';
            $this->client->remark='change route';
            $this->client->save();
            redirect(route('QuizHighTestosterone',$this->client));
        }
        
        $this->client->symptom=$select;
        $this->next();
    }
    public function quiz_4Submit(){
        switch ($this->data['quiz_4']) {
            case 1:
                $this->next();
                // $this->getResult();
                break;
            default:
                $this->next();
                break;
        }
    }
    public function getResult(){
        if($this->score>=5){
            $this->client->lavel="red";
            // dd("result 1 level red");
        }elseif($this->score>=3){
            $this->client->lavel="yellow";
            // dd("result 2 level yellow");
        }elseif($this->score<=2){
            $this->client->lavel="green";
            // dd("result 3 level green");
        }

        $this->client->status="done";
        $this->client->save();
        return redirect(route('result',$this->client));
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
        $this->client->score=$this->score;
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
