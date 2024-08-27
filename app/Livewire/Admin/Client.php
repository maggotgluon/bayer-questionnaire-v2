<?php

namespace App\Livewire\Admin;

use App\Models\client as ModelsClient;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Livewire\WithPagination;

class Client extends Component
{
    use WithPagination;

    // public $clients;
    public $filter;
    public $datefrom;
    public $dateto;

    public function mount(){
        $this->filter=[
            'show'=>10,
            'search'=>null,
            'type'=>null,
            'status'=>'all'
        ];
        // $this->clients=ModelsClient::all();
    }
    public function render()
    {
        return view('livewire.admin.client',[
            'clients'=>$this->client()->paginate($this->filter['show'])
        ])->extends('layouts.admin');
    }
    public function client(){
        return ModelsClient::when($this->datefrom,function($c,$value){
            return $c->where('created_at','>=',$value);
        })->when($this->dateto,function($c,$value){
            return $c->where('created_at','<',Carbon::create($value)->addDay(1));
        })->when($this->filter['status']!='all',function($c,$value){
            return $c->where('status',$this->filter['status']=='null'?null:$this->filter['status']);
        })->when($this->filter['type'],function($c,$value){
            return $c->where('type',$value);
        }); 
    }
    public function download(){
        $now = Carbon::now()->toDateTimeString();
        // dd($now);
        $fileName = 'answer-'.$now.'.csv';
        $qa = $this->client()->get();

        // dd()
        
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
                $row['age'] = $q->age;
                $row['type'] = $q->type;
                $row['level'] = $q->level;
                $row['score'] = $q->score;
                $row['answer'] = implode(',',Arr::dot($q->answer));
                $row['symptom'] = implode(',',Arr::dot($q->symptom));
                $row['status'] = $q->status;
                
                $row['created_at']  = $q->created_at??"-";
                // dd($q,$row);
                

                fputcsv($file, array($row['id'], $row['name'], $row['age'], $row['type'], $row['level'], $row['score'], $row['answer'],$row['symptom'],$row['status'],$row['created_at']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
