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

    protected $messages =[
        'data.*.required' => 'จำเป็นต้องเลือกอย่างน้อย 1 ข้อ'
    ];
    
    public function mount(client $client = null){
        if($client->type=="HormonalAcne"){
            $this->client=$client;
        }else{
            dd($client);
        }

        $this->data['quiz_3'] = [
            '1'=>false,
            '2'=>false,
            '3'=>false,
            '4'=>false,
            '5'=>false
        ];
        // $this->client->symptom=[];
        // $this->page=6;
    }
    public function render()
    {
        return view('livewire.client.quiz-hormonal-acne');
    }


    public function updatedData($value, $key){
        $dataKey = explode('.',$key);
        if(isset($this->data['quiz_3'])){
            // dd($value,$key,$dataKey,$this->data['quiz_3']);
            if($dataKey[0]=='quiz_3'){
                // dd($dataKey[1]);
                if($dataKey[1]=='1'||$dataKey[1]=='2'||$dataKey[1]=='3'||$dataKey[1]=='4'){
                    $this->data['quiz_3']['5']=false;
                }
                elseif( $this->data['quiz_3']['5']==true){
                    // dd($this->data['quiz_1'],$dataKey);
                    $this->data['quiz_3']['1']=false;
                    $this->data['quiz_3']['2']=false;
                    $this->data['quiz_3']['3']=false;
                    $this->data['quiz_3']['4']=false;
                    // dd($value, $key,isset($value['a5']));
                }
            }
        }
    }
    public function quiz_1Submit(){
        $validatedData = $this->validate([
            'data.quiz_1' => 'required',
        ]);
        $select = $this->client->symptom;
        $answer = $this->client->answer;

        if($this->data['quiz_1']==1){
            $this->client->answer = $answer;
            $answer['q2-1'][]='a1';
            $select[]='สิวเกิดขึ้นในช่วง ก่อนมีประจำเดือน 1 สัปดาห์';
            $this->score+=3;
        }else{
            $answer['q2-1'][]='a2';
            // $this->level="GREEN LEVEL";
        }
        $this->client->answer = $answer;
        $this->client->symptom=$select;
        $this->next();
    }
    public function quiz_2Submit(){
        $validatedData = $this->validate([
            'data.quiz_2' => 'required',
        ]);
        $select = $this->client->symptom;
        $answer = $this->client->answer;
        $ans=$this->ans($this->data['quiz_2']);
        if($ans==[]){
            return $this->addError('data.quiz_2.*','จำเป็นต้องเลือกอย่างน้อย 1 ข้อ');
        }
        foreach($ans as $a){
            if($a==1){
                $answer['q2-2'][]='a1';
                $select[] = 'สิวอุดตันหัวดำ';
            }
            if($a==2){
                $answer['q2-2'][]='a2';
                $select[] = 'สิวอุดตันหัวขาว';
            }
            if($a==3){
                $answer['q2-2'][]='a3';
                $select[] = 'สิวตุ่มหนอง';
            }
            if($a==4){
                $answer['q2-2'][]='a4';
                $select[] = 'สิวหัวช้าง';
            }
            if($a==5){
                $answer['q2-2'][]='a5';
                $select[] = 'สิวผด';
            }
            if($a!=5){
                $this->score+=1;
            }
        }
        $this->client->answer = $answer;
        $this->client->symptom=$select;
        $this->next();
    }
    public function quiz_3Submit(){
        $validatedData = $this->validate([
            'data.quiz_3' => 'required',
        ]);
        $select = $this->client->symptom;
        $answer = $this->client->answer;
        // $ans=$this->data['quiz_3'];
        $ans=$this->ans($this->data['quiz_3']);
        if($ans==[]){
            return $this->addError('data.quiz_3.*','จำเป็นต้องเลือกอย่างน้อย 1 ข้อ');
        }

        foreach($ans as $a){
            if($a==1){
                $answer['q2-3'][]='a1';
                $select[]='ประจำเดือนมา ๆ หาย ๆ เดาใจยากเหมือนคนคุย';
            }
            if($a==2){
                $answer['q2-3'][]='a2';
                $select[]='หน้ามัน เหมือนหนังปลาทู';
            }
            if($a==3){
                $answer['q2-3'][]='a3';
                $select[]='ขนดก เหมือนผู้ชายมาดแมน';
            }
            if($a==4){
                $answer['q2-3'][]='a4';
                $select[]='ผมร่วงเหมือนใบไม้แห้ง';
            }
            if($a==5){
                $answer['q2-3'][]='a4';
                $select[]='ไม่มีอาการใดๆ โชคดีเหมือนถูกหวย';
            }
            if($a!=5){
                $this->score+=1;
                $this->client->type='HighTestosterone';
            }
        }

        $this->client->symptom = $select;
        $this->client->answer = $answer;
        if($this->client->type=='HighTestosterone'){
            $this->client->remark=['change route'];
            $this->client->save();
            // dd($this->client->remark);
            redirect(route('QuizHighTestosterone',$this->client));
        }
        $this->client->save();;
        $this->next();
    }
    public function quiz_4Submit(){
        $validatedData = $this->validate([
            'data.quiz_4' => 'required',
        ]);
        $answer = $this->client->answer;
        switch ($this->data['quiz_4']) {
            case 1:
                $answer['q2-4'][]='a1';
                break;
            case 0:
                $answer['q2-4'][]='a2';
                break;
            case -1:
                $answer['q2-4'][]='a3';
                break;
            default:
                break;
        }
        $this->client->answer = $answer;
        $this->next();
    }
    public function getResult(){
        if($this->score>=5){
            $this->client->level="red";
            // dd("result 1 level red");
        }elseif($this->score>=3){
            $this->client->level="yellow";
            // dd("result 2 level yellow");
        }elseif($this->score<=2){
            $this->client->level="green";
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
