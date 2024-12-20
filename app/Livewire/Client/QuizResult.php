<?php

namespace App\Livewire\Client;

use App\Http\Controllers\resultImage;
use App\Models\client;
use Kudashevs\ShareButtons\ShareButtons;
use Livewire\Component;
use Phattarachai\LaravelMobileDetect\Agent;

class QuizResult extends Component
{
    public $image;
    public $element;
    public $client;

    public function render()
    {
        // phpinfo();
        // $this->createImages();
        return view('livewire.client.quiz-result' ,[
            'agent'=>new Agent()
            ] 
        );
    }
    public function test(){
        dd('test');
        // $a = ShareButtons::page('https://site.com', 'Page title', [
        //     'title' => 'Page title',
        //     'rel' => 'nofollow noopener noreferrer',
        // ]) ->facebook()
        // ->linkedin(['rel' => 'follow']);
        // ->getShareButtons();
    }

    
    public function clickTrack($btn_name){
        $client = $this->client->remark;
        if(isset($client[$btn_name])){

            $client[$btn_name]+=1;
        }else{

            $client[$btn_name]=1;
        }
        $this->client->remark = $client;
        $this->client->save();
        // dd($this->client->remark,$client,$btn_name);
    }
    public function mount(client $client = null){

        $this->client = $client;

        resultImage::generate($client);

        switch ($client->type) {
            case 'PMDD':
                $this->image.='r1-';
                $this->element['btn']='btn-1 btn-1-lg ';
                $this->element['color']='btn-text-green';
                $this->element['type']='PMDD';

                switch ($client->level) {
                    case 'green': $this->element['detail']='green'; break;
                    case 'yellow': $this->element['detail']='yellow'; break;
                    case 'red': $this->element['detail']='red'; break;
                    default: break;
                }
                break;
            case 'HormonalAcne':
                $this->image.='r2-';
                $this->element['btn']='btn-2 btn-2-lg ';
                $this->element['color']='btn-text-orange';
                $this->element['type']='HormonalAcne';
                
                switch ($client->level) {
                    case 'green': $this->element['detail']='green'; break;
                    case 'yellow': $this->element['detail']='yellow'; break;
                    case 'red': $this->element['detail']='red'; break;
                    default: break;
                }
                # code...
                break;
            case 'HighTestosterone':
                $this->image.='r3-';
                $this->element['btn']='btn-3 btn-3-lg ';
                $this->element['color']='btn-text-pink';
                $this->element['type']='HighTestosterone';

                switch ($client->level) {
                    case 'green': $this->element['detail']='green'; break;
                    case 'yellow': $this->element['detail']='yellow'; break;
                    case 'red': $this->element['detail']='red'; break;
                    default: break;
                }
                # code...
                break;
            
            default:
                # code...
                break;
        }

        switch ($client->level) {
            case 'green':
                $this->image.='1.png';
                break;
            case 'yellow':
                $this->image.='2.png';
                break;
            case 'red':
                $this->image.='3.png';
                break;
            default:
                # code...
                break;
        }

       
    }
    
}
