<?php

namespace App\Livewire\Client;

use App\Models\client;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Index extends Component
{
    public $data = [];
    public $page=2;
    public $client;


    protected $messages =[
        'data.*.required' => 'จำเป็นต้องเลือกอย่างน้อย 1 ข้อ'
    ];
    public function mount(){
        // $this->page=5;
        if(env('APP_DEBUG',false)){
            $this->data['name']=fake()->name();
            $this->data['age']=fake()->randomDigitNotZero()*10;
        }
        // $this->data['quiz_0'] = [
        //         'a1'=>false,
        //         'a2'=>false,
        //         'a3'=>false,
        //         'a4'=>false,
        //         'a5'=>false
        //     ];

    }
    public function render()
    {
        return view('livewire.client.index');
    }
    public function updatedData($value, $key){
        $dataKey = explode('.',$key);
        // dd($value,$key,$dataKey,$this->data['quiz_0']);
        if($dataKey[0]=='quiz_0'){
            // dd($dataKey[1]);
            if($dataKey[1]=='a1'||$dataKey[1]=='a2'||$dataKey[1]=='a3'||$dataKey[1]=='a4'){
                $this->data['quiz_0']['a5']=false;
            }
            elseif( $this->data['quiz_0']['a5']==true){
                // dd($this->data['quiz_0'],$dataKey);
                $this->data['quiz_0']['a1']=false;
                $this->data['quiz_0']['a2']=false;
                $this->data['quiz_0']['a3']=false;
                $this->data['quiz_0']['a4']=false;
                // dd($value, $key,isset($value['a5']));
            }
        }
    }
    public function demo(){
        foreach($this->data['quiz_0'] as $key=>$val){
            $this->data['quiz_0'][$key] = $val?true:null;
            // dd($key,$val);
        };
        // dd($this->data['quiz_0']);
        $validatedData = $this->validate([
            'data.quiz_0' => 'required',
            // 'data.quiz_0'=>Rule::forEach(function($val){
            //     return $val;
            // })
        ]);
        dd($validatedData);
    }
    public function quiz_0Submit(){
        $validatedData = $this->validate([
            'data.name' => 'required|min:2',
            'data.age' => 'required|numeric|min:10|max:99',
        ]);
        // verify name and age
        // dd($this->data);
        $this->client = client::create([
            'name'=>$this->data['name'],
            'age'=>$this->data['age'],
            'member_code'=>'BA'.str_pad( client::count(), 4, '0', STR_PAD_LEFT)
        ]);
        $this->next();
    }

    public function quiz_1Submit(){
        // dd($this->data['quiz_1']);

        $validatedData = $this->validate([
            'data.quiz_1' => 'required',
        ]);
        $d = collect($this->data['quiz_1'])
            ->filter(function($value,$key){
                if($value){
                    return $key;
                }
            });
        $select=[];
        isset($d['a1'])?$select['q0-1'][]='a1':$select;
        isset($d['a2'])?$select['q0-1'][]='a2':$select;
        isset($d['a3'])?$select['q0-1'][]='a3':$select;

        $this->client->answer=$select;
        // $this->client->save();
        // dd($select,$this->client);
        if($d->count() == 1){
            switch (true) {
                case isset($d['a1']):
                    $this->client->type="PMDD";
                    $this->client->save();
                    redirect(route('QuizPMDD',$this->client));
                    break;
                case isset($d['a2']):
                    $this->client->type="HormonalAcne";
                    $this->client->save();
                    redirect(route('QuizHormonalAcne',$this->client));
                    break;
                case isset($d['a3']):
                    $this->client->type="HighTestosterone";
                    $this->client->save();
                    redirect(route('QuizHighTestosterone',$this->client));
                    break;

                default:
                    # code...
                    break;
            }
        }elseif($d->count() == 2){
            if(isset($d['a1']) && isset($d['a2'])){
                $this->client->type="PMDD";
                $this->client->save();
                redirect(route('QuizPMDD',$this->client));
            }
            if(isset($d['a2']) && isset($d['a3'])){
                $this->client->type="HighTestosterone";
                $this->client->save();
                redirect(route('QuizHighTestosterone',$this->client));
            }
            if(isset($d['a1']) && isset($d['a3'])){
                $this->next();
            }
        }else{
            $this->next();
        }
        // dd($this->data['quiz_1'],$d['a1'],$d->count());
    }

    public function quiz_2Submit(){

        $validatedData = $this->validate([
            'data.quiz_2' => 'required',
        ]);

        $d = collect($this->data['quiz_2']);

        $select=$this->client->answer;
        isset($d['a1'])?$select['q0-2'][]='a1':$select;
        isset($d['a2'])?$select['q0-2'][]='a2':$select;
        isset($d['a3'])?$select['q0-2'][]='a3':$select;

        $this->client->answer=$select;
        // $this->client->save();
        // dd($this->client);
        if(isset($d['a1']) || isset($d['a2']) || isset($d['a3'])){
            $this->client->type="HighTestosterone";
            $this->client->save();
            redirect(route('QuizHighTestosterone',$this->client));
        }else{
            $this->client->type="PMDD";
            $this->client->save();
            redirect(route('QuizPMDD',$this->client));

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
    }
    public function next(){
        $this->page+=1;
    }
}
