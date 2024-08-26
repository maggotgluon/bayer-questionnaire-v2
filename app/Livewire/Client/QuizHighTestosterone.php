<?php

namespace App\Livewire\Client;

use App\Models\client;
use Livewire\Component;

class QuizHighTestosterone extends Component
{
    public $data = [];
    public $score=0;
    public $level;
    public $answer;
    public $client;

    public $page=1;

    public function mount(client $client = null){
        if($client->type=="HighTestosterone"){
            $this->client=$client;
        }else{
            dd($client);
        }
        // $this->client->symptom=[];
        // $this->page=6;
    }
    public function render()
    {
        return view('livewire.client.quiz-high-testosterone');
    }

    public function quiz_1Submit(){
        $select = $this->client->symptom;
        $answer = $this->client->answer;
        if($this->data['quiz_1']==1){
            $select[] = 'ประจำเดือนไม่มานานกว่า 35 วัน';
            $answer['q3-1'][]='a1';
            $this->score+=2;
        }
        if($this->data['quiz_1']==2){
            $select[] = 'ประจำเดือนยังไม่มา นานเกิน 90 วัน แต่เคยมาปกติ';
            $answer['q3-1'][]='a2';
            $this->score+=2;
        }
        if($this->data['quiz_1']==3){
            $select[] = 'ประจำเดือนมาปกติ รอบเดือนอยู่ที่ 21-35 วัน';
            $answer['q3-1'][]='a3';

            $this->level="GREEN LEVEL";
        }
        $this->client->answer = $answer;
        $this->client->symptom=$select;
        
        if($this->client->remark=='change route'){
            $this->goto(4);
        }else{
            $this->next();
        }
    }
    public function quiz_2Submit(){
        $select = $this->client->symptom;
        $answer = $this->client->answer;
        $ans=$this->ans($this->data['quiz_2']);
        foreach($ans as $a){
            if($a==1){$select[]='สิวเห่อ สิวผลุบๆ โผล่ๆ เหมือนตัวตุ่น';$answer['q3-2'][]='a1';}
            if($a==2){$select[]='หน้ามัน เหมือนหนังปลาทู';$answer['q3-2'][]='a2';}
            if($a==3){$select[]='ขนดก เหมือนผู้ชายมาดแมน';$answer['q3-2'][]='a3';}
            if($a==4){$select[]='ผมร่วง เหมือนใบไม้แห้ง';$answer['q3-2'][]='a4';}
            if($a==5){$select[]='ไม่มีอาการใด ๆ โชคดีเหมือนถูกหวย';$answer['q3-2'][]='a5';}
            if($a!=5){
                $this->score+=1;
            }
        }
        $this->client->answer = $answer;
        $this->client->symptom=$select;
        $this->next();
    }
    public function quiz_3Submit(){
        $answer = $this->client->answer;
        switch ($this->data['quiz_3']) {
            case 1:
                $answer['q3-3'][]='a1';
                break;
            case 0:
                $answer['q3-3'][]='a2';
                break;
            case -1:
                $answer['q3-3'][]='a3';
                break;
            default:
                break;
        }

        $this->client->answer = $answer;
        $this->next();
    }
    public function getResult(){
        if($this->score>=4){
            $this->client->lavel="red";
        }elseif($this->score=3){
            $this->client->lavel="yellow";
        }elseif($this->score<=2){
            $this->client->lavel="green";
        }
        $this->client->status="done";
        $this->client->save();
        return redirect(route('result',$this->client));
    }

    public function goto($page=null){
        if($page){
            $this->page+=1;
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
        }
        return $ans;
    }
}
