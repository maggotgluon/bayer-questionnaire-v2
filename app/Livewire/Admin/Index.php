<?php

namespace App\Livewire\Admin;

use App\Models\client;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;

class Index extends Component
{
    public $clients;
    public $datefrom;
    public $dateto;
    public function mount(){
        $this->clients=client::all();
    }
    public function render()
    {
        
        $this->clients=$this->clients->when($this->datefrom,function($c,$value){
            // dd('from',$c,$value);
            return $c->where('created_at','>=',$value);
        })->when($this->dateto,function($c,$value){
            // dd('to',$c);
            return $c->where('created_at','<=',$value);
        });

        $overall_chart = 
            (new PieChartModel())
                ->addSlice('PMDD', $this->clients->where('type','PMDD')->where('status','done')->count(), '#009CB4')
                ->addSlice('Hormonal Acne', $this->clients->where('type','HormonalAcne')->where('status','done')->count(), '#EF482E')
                ->addSlice('High Testosterone', $this->clients->where('type','HighTestosterone')->where('status','done')->count(), '#ED048C')
            ;
            $col_color = '#4237c5';
            $ages_chart = (new ColumnChartModel())
                ->addColumn('Under 10',$this->clients->wherebetween('age',[0,10])->count(),$col_color)
                ->addColumn('11-20',$this->clients->wherebetween('age',[1,20])->count(),$col_color)
                ->addColumn('21-30',$this->clients->wherebetween('age',[21,30])->count(),$col_color)
                ->addColumn('31-40',$this->clients->wherebetween('age',[31,40])->count(),$col_color)
                ->addColumn('41-50',$this->clients->wherebetween('age',[41,50])->count(),$col_color)
                ->addColumn('Over 51',$this->clients->wherebetween('age',[51,100])->count(),$col_color);


            $date_chart = (new LineChartModel());
                // ->addPoint('test',2,'#bbf7d0');
            foreach ( $this->clients->unique('created_at')->pluck('created_at') as $date ){
                $clientToday = $this->clients->wherebetween('created_at',[$date->toDateString(),$date->addDay(1)->toDateString()])->where('status','done')->count();
                // dd($clientToday);
                $date_chart->addPoint($date->toDateString(),$clientToday);
                $date_chart->addMarker($date->toDateString(),$clientToday);
            }
        // dd($this->clients);
        return view('livewire.admin.index',[
            'overall_chart'=>$overall_chart,
            'ages_chart'=>$ages_chart,
            'date_chart'=>$date_chart
        ])->extends('layouts.admin');
    }

    public function download(){
        dd($this->clients);
    }
}
