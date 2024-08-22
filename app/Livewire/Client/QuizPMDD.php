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
        // $this->client->answer=[];
        // $this->page=9;
    }

    public function render()
    {
        return view('livewire.client.quiz-PMDD');
    }

    public function quiz_1Submit(){
        
        $ans=$this->ans($this->data['quiz_1']);
        $select = $this->client->answer;
        foreach($ans as $a){
            // dd($a);
            if($a!=5){
                $this->score+=1;
            }
            if($a==1){
                $select[]='มนุษย์ถ้ำจำศีลที่อยากอยู่เงียบ ๆ คนเดียว';
            }
            if($a==2){
                $select[]='มนุษย์ดราม่า น้ำตาไหลเหมือนน้ำจะท่วม';
            }
            if($a==3){
                $select[]='มนุษย์ขี้วีน โมโหฉ่ำเหมือนพายุเข้า';
            }
            if($a==4){
                $select[]='เครียด วิตกกังวล';
            }
            if($a==5){
                $select[]='ไม่มีอาการทางอารมณ์';
            }
        }
        $this->client->answer=$select;
        $this->client->save();
        // dd($select,$this->client->answer);

        
        $this->next();
        // dd($this->data['quiz_1'],$ans,$this->score);
    }

    public function quiz_2Submit(){
        $select=$this->client->answer;
        $ans=$this->ans($this->data['quiz_2']);
        foreach($ans as $a){

            if($a==1){
                $select[]='นอนไม่หลับ ร่างกายกระสับกระส่าย';
            }
            if($a==2){
                $select[]='ตัวบวม หน้าบวมเหมือนลูกโป่งเดินได้';
            }
            if($a==3){
                $select[]='ไม่อยากอาหาร เหมือนคนอกหัก';
            }
            if($a==4){
                $select[]='เจ็บเต้านม';
            }
            if($a==5){
                $select[]='ปวดกล้ามเนื้อ เหมือนโดนทับ';
            }

            if($a==6){
                $this->level="green";
                return $this->goto(8);
            }else{
                $this->score+=1;
            }
        }
        $this->client->answer=$select;
        $this->client->save();
        $this->next();
        // dd($this->data['quiz_2'],$ans);
    }
    public function quiz_3Submit(){
        // $ans=$this->ans($this->data['quiz_3']);
        $select=$this->client->answer;
        if($this->data['quiz_3']==1){
            $select[]='อาการเหล่านี้เกิดขึ้นก่อนมีประจำเดือนภายใน 1 สัปดาห์';
            $this->client->answer=$select;
            $this->client->save();

            $this->score+=3;
        }else{
            $this->level="green";
            return $this->goto(8);
        }
        $this->next();
        // dd($this->data['quiz_3']);
    }
    public function quiz_4Submit(){
        // dd($this->client);
        // $ans=$this->ans($this->data['quiz_4']);
        // dd($this->data['quiz_4']);
        switch ($this->data['quiz_4']) {
            case 1:
                $this->getResult();
                break;
            default:
                $this->next();
                break;
        }
        // foreach($ans as $a){
        //     if($a==6){
        //         // $this->level="GREEN LEVEL";
        //     }else{
        //         // $this->score+=1;
        //     }
        // }

    }
    public function getResult(){
        if($this->score>=7){
            $this->client->lavel="red";
            // dd("ไม่ไหวแล้ว...
            // ทุกอย่างเกินที่เธอจะรับไหว
            // ใช่ไหม");
        }elseif($this->score>=3){
            $this->client->lavel="yellow";
            // dd('level yellow');
            // dd("เพราะคิดว่าฮอร์โมน
            // เปลี่ยนแปลงใช่ไหม
            // อารมณ์ที่เปลี่ยนไป");
        }elseif($this->score<=2){
            $this->client->lavel="green";
            // dd('level green');
            // dd("เธอเป็นคนธรรมดา
            // แต่อย่าชะล่าใจกับการไม่เปลี่ยนแปลง");
        }
        $this->client->status="done";
        $this->client->save();
        return redirect(route('result',$this->client));
        dd($this->client);
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
