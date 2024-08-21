<?php

namespace App\Livewire\Client;

use App\Models\client;
use Livewire\Component;

class QuizResult extends Component
{
    public $image;
    public $element;
    public $client;
    public function render()
    {
        return view('livewire.client.quiz-result');
    }

    public function mount(client $client = null){
        $this->client = $client;
        switch ($client->type) {
            case 'PMDD':
                $this->image.='r1-';
                $this->element['btn']='btn-1 btn-1-lg ';
                $this->element['color']='btn-text-green';
                break;
            case 'HighTestosterone':
                $this->image.='r2-';
                $this->element['btn']='btn-2 btn-2-lg ';
                $this->element['color']='btn-text-orange';
                # code...
                break;
            case 'HormonalAcne':
                $this->image.='r3-';
                $this->element['btn']='btn-3 btn-3-lg ';
                $this->element['color']='btn-text-pink';
                # code...
                break;
            
            default:
                # code...
                break;
        }

        switch ($client->lavel) {
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
        // dd($this->image);
    }
}
