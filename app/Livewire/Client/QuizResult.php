<?php

namespace App\Livewire\Client;

use App\Models\client;
use Livewire\Component;

class QuizResult extends Component
{
    public function render()
    {
        return view('livewire.client.quiz-result');
    }

    public function mount(client $client = null){
        dd($client);
    }
}
