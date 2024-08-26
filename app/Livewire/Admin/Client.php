<?php

namespace App\Livewire\Admin;

use App\Models\client as ModelsClient;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class Client extends Component
{
    public $clients;
    public $datefrom;
    public $dateto;

    public function mount(){
        $this->clients=ModelsClient::all();
    }
    public function render()
    {

        $this->clients=ModelsClient::all();
        $this->clients=$this->clients->when($this->datefrom,function($c,$value){
            // dd('from',$c,$value);
            return $c->where('created_at','>=',$value);
        })->when($this->dateto,function($c,$value){
            // dd('to',$c);
            return $c->where('created_at','<',Carbon::create($value)->addDay(1));
        });
        return view('livewire.admin.client')->extends('layouts.admin');
    }
    public function download(){
        $now = Carbon::now()->toDateTimeString();
        // dd($now);
        $fileName = 'answer-'.$now.'.csv';
        $qa = $this->clients->where('status','done');
        
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id','name', 'age', 'type', 'level', 'score','answer','symptom','status', 'create at');

        $callback = function() use($qa, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($qa as $q) {
                $row['id'] = $q->id;
                $row['name'] = $q->name;
                $row['age'] = $q->ages;
                $row['type'] = $q->type;
                $row['level'] = $q->level;
                $row['score'] = $q->score;
                $row['answer'] = implode(',',Arr::dot($q->answer));
                $row['symptom'] = implode(',',Arr::dot($q->symptom));
                $row['status'] = $q->status;
                
                $row['created_at']  = $q->created_at??"-";
                dd($q,$row);
                

                fputcsv($file, array($row['id'], $row['name'], $row['age'], $row['type'], $row['level'], $row['score'], $row['answer'],$row['symptom'],$row['status'],$row['created_at']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
