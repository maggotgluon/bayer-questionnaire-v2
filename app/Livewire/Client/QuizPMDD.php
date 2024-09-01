<?php

namespace App\Livewire\Client;

use App\Models\client;
use Illuminate\Support\Arr;
use Livewire\Component;

class QuizPMDD extends Component
{

    public $data = [];
    public $score=0;
    public $level;
    public $answer;
    public $client;

    public $page=1;

    protected $messages =[
        'data.*.required' => 'จำเป็นต้องเลือกอย่างน้อย 1 ข้อ'
    ];
    
    public function mount(client $client = null){

        if($client->type=="PMDD"){
            $this->client=$client;
        }else{
            dd($client);
        }

        $this->data['quiz_1'] = [
            '1'=>false,
            '2'=>false,
            '3'=>false,
            '4'=>false,
            '5'=>false
        ];
        // $this->client->symptom=[];
        // $this->page=9;
    }

    public function render()
    {
        return view('livewire.client.quiz-PMDD');
    }

    public function updatedData($value, $key){
        $dataKey = explode('.',$key);
        // dd($value,$key,$dataKey,$this->data['quiz_1']);
        if($dataKey[0]=='quiz_1'){
            // dd($dataKey[1]);
            if($dataKey[1]=='1'||$dataKey[1]=='2'||$dataKey[1]=='3'||$dataKey[1]=='4'){
                $this->data['quiz_1']['5']=false;
            }
            elseif( $this->data['quiz_1']['5']==true){
                // dd($this->data['quiz_1'],$dataKey);
                $this->data['quiz_1']['1']=false;
                $this->data['quiz_1']['2']=false;
                $this->data['quiz_1']['3']=false;
                $this->data['quiz_1']['4']=false;
                // dd($value, $key,isset($value['a5']));
            }
        }
    }
    public function quiz_1Submit(){
        $validatedData = $this->validate([
            'data.quiz_1' => 'required'
        ]);
        $ans=$this->ans($this->data['quiz_1']);
        if($ans==[]){
            return $this->addError('data.quiz_1.*','จำเป็นต้องเลือกอย่างน้อย 1 ข้อ');
        }
        $select = $this->client->symptom;
        $answer = $this->client->answer;

        foreach($ans as $a){
            // dd($a);
            if($a!=5){
                $this->score+=1;
            }
            if($a==1){
                $answer['q1-1'][]='a1';
                $select[]='มนุษย์ถ้ำจำศีลที่อยากอยู่เงียบ ๆ คนเดียว';
            }
            if($a==2){
                $answer['q1-1'][]='a2';
                $select[]='มนุษย์ดราม่า น้ำตาไหลเหมือนน้ำจะท่วม';
            }
            if($a==3){
                $answer['q1-1'][]='a3';
                $select[]='มนุษย์ขี้วีน โมโหฉ่ำเหมือนพายุเข้า';
            }
            if($a==4){
                $answer['q1-1'][]='a4';
                $select[]='เครียด วิตกกังวล';
            }
            if($a==5){
                $answer['q1-1'][]='a5';
                $select[]='ไม่มีอาการทางอารมณ์';
                $this->client->level="green";
            }
        }
        $this->client->answer = $answer;
        $this->client->symptom=$select;
        $this->client->save();

        $this->next();
    }

    public function quiz_2Submit(){

        $validatedData = $this->validate([
            'data.quiz_2' => 'required',
        ]);
        $select=$this->client->symptom;
        $answer = $this->client->answer;
        $ans=$this->ans($this->data['quiz_2']);
        if($ans==[]){
            return $this->addError('data.quiz_2.*','จำเป็นต้องเลือกอย่างน้อย 1 ข้อ');
        }
        foreach($ans as $a){
            if($a==1){
                $answer['q1-2'][]='a1';
                $select[]='นอนไม่หลับ ร่างกายกระสับกระส่าย';
            }
            if($a==2){
                $answer['q1-2'][]='a2';
                $select[]='ตัวบวม หน้าบวมเหมือนลูกโป่งเดินได้';
            }
            if($a==3){
                $answer['q1-2'][]='a3';
                $select[]='ไม่อยากอาหาร เหมือนคนอกหัก';
            }
            if($a==4){
                $answer['q1-2'][]='a4';
                $select[]='เจ็บเต้านม';
            }
            if($a==5){
                $answer['q1-2'][]='a5';
                $select[]='ปวดกล้ามเนื้อ เหมือนโดนทับ';
            }
            if($a==6){
                $answer['q1-2'][]='a6';
                $select[]='ยังดีอยู่...ที่ร่างกายเหมือนเดิมไม่มีเปลี่ยนแปลง';
                $this->client->level="green";
            }else{
                $this->score+=1;
            }
        }
        $this->client->answer = $answer;
        $this->client->symptom=$select;
        $this->client->save();
        if($this->client->level=="green"){
            return $this->goto(8);
        }else{
            $this->next();
        }
        // dd($this->data['quiz_2'],$ans);
    }
    public function quiz_3Submit(){
        $validatedData = $this->validate([
            'data.quiz_3' => 'required',
        ]);
        // $ans=$this->ans($this->data['quiz_3']);
        $select=$this->client->symptom;
        $answer = $this->client->answer;
        if($this->data['quiz_3']==1){
            $answer['q1-3'][]='a1';
            $select[]='อาการเหล่านี้เกิดขึ้นก่อนมีประจำเดือนภายใน 1 สัปดาห์';
            $this->client->answer = $answer;
            $this->client->symptom=$select;
            $this->client->save();

            $this->score+=3;
        }else{
            $answer['q1-3'][]='a2';
            $this->client->level="green";
            $this->client->answer = $answer;
            $this->client->save();
            return $this->goto(8);
        }
        $this->next();
        // dd($this->data['quiz_3']);
    }
    public function quiz_4Submit(){
        $validatedData = $this->validate([
            'data.quiz_4' => 'required',
        ]);
        
        $answer = $this->client->answer;
        switch ($this->data['quiz_4']) {
            case 1:
                $answer['q1-4'][]='a1';
                break;
            case 0:
                $answer['q1-4'][]='a2';
                break;
            case -1:
                $answer['q1-4'][]='a3';
                break;
            default:
                break;
        }
        $this->client->answer = $answer;
        $this->next();

    }
    public function getResult(){
        if($this->client->level=="green"){
            $this->client->status="done";
            $this->client->save();
            return redirect(route('result',$this->client));
        }

        if($this->score>=7){
            $this->client->level="red";
        }elseif($this->score>=3){
            $this->client->level="yellow";
        }elseif($this->score<=2){
            $this->client->level="green";
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
