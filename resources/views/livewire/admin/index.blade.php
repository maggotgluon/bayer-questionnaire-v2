<div class="grid gap-2 md:grid-cols-7 grid-cols-2 p-4 mt-16 md:mt-auto">
    <div class="col-span-2 md:col-span-7 flex gap-2 items-end h-min ">
        <x-datetime-picker
            id="min-max-times-input"
            without-time
            label="show data from"
            placeholder="select date"
            wire:model.live="datefrom"
        />
        <x-datetime-picker
            id="min-max-times-input"
            without-time
            label="show data to"
            placeholder="select date"
            wire:model.live="dateto"
        />
        <x-button label="download" wire:click="download"/>
    </div>
    {{-- <span class="col-span-3"></span>
    <span class="col-span-2">Click</span>
    <span class="col-span-2">Share</span> --}}


    <span class="col-span-2 text-right p-4 bg-gray-100 rounded-xl ">
        <h2 class="col-span-2">Total User</h2>
        <div class="text-6xl font-md relative m-4">
        {{$clients->where('status','done')->count()}}
        <span class="text-sm absolute bottom-0 left-full">
        /{{$clients->count()}}
        </span>
        </div>

    </span>
    <div class="col-span-2 md:col-span-5 p-4 bg-gray-100 rounded-xl grid grid-cols-2">
        
        <h2 class="col-span-2">Overall</h2>
        <div>
        <livewire:livewire-pie-chart
            {{-- key="{{ $columnChartModel->reactiveKey() }}" --}}
            :pie-chart-model="$overall_chart"
        />
        </div>
        <ul>
            <li>
                <div class="font-md relative text-left">
                    PMDD : 
                    <span class="relative">
                    {{$clients->where('type','PMDD')->where('status','done')->count()}}
                    <div class="text-2xs absolute bottom-0 left-full">
                    /{{$clients->where('type','PMDD')->count()}}
                    </div>
                    </span>
                </div>
            </li>
            <li>
                <div class="font-md relative text-left">
                    Hormonal Acne : 
                    <span class="relative">
                    {{$clients->where('type','HormonalAcne')->where('status','done')->count()}}
                    <div class="text-2xs absolute bottom-0 left-full">
                    /{{$clients->where('type','HormonalAcne')->count()}}
                    </div>
                    </span>
                </div>
            </li>
            <li>
                <div class="font-md relative text-left">
                    High Testosterone : 
                    <span class="relative">
                    {{$clients->where('type','HighTestosterone')->where('status','done')->count()}}
                    <div class="text-2xs absolute bottom-0 left-full">
                    /{{$clients->where('type','HighTestosterone')->count()}}
                    </div>
                    </span>
                </div>
            </li>
        </ul>

    </div>

    <div ></div>
    <div class="col-span-2 p-4 bg-green-200 rounded-xl">
        PMDD
        <ul>
            @php
                $clientPMDD = $clients->where('type','PMDD')->where('status','done');
                $totalPMDD = $clientPMDD->count();
                $totalPMDD_green = $clientPMDD->where('level','green')->count();
                $totalPMDD_yellow = $clientPMDD->where('level','yellow')->count();
                $totalPMDD_red = $clientPMDD->where('level','red')->count();
            @endphp
            <li class="p-2 bg-green-500 m-2 rounded-xl">Level GREEN : {{$totalPMDD_green}} 
                <span class="float-right">
                    {{round( $totalPMDD_green==0?0:(float)($totalPMDD_green / $totalPMDD)*100 , 2)}} %
                </span>
            </li>
            <li class="p-2 bg-yellow-500 m-2 rounded-xl">Level YELLOW : {{$totalPMDD_yellow}} 
                <span class="float-right">
                    {{round( $totalPMDD_yellow==0?0:(float)($totalPMDD_yellow / $totalPMDD)*100 , 2)}} %
                </span>
            </li>
            <li class="p-2 bg-red-500 m-2 rounded-xl">Level RED : {{$totalPMDD_red}} 
                <span class="float-right">
                    {{round( $totalPMDD_red==0?0:(float)($totalPMDD_red / $totalPMDD)*100 , 2)}} %
                </span>
            </li>
        </ul>

    </div>
    <div class="col-span-2 p-4 bg-red-200 rounded-xl">
        Hormonal Acne
        <ul>
            @php
                $clientHormonalAcne = $clients->where('type','HormonalAcne')->where('status','done');
                $totalHormonalAcne = $clientHormonalAcne->count();
                $totalHormonalAcne_green = $clientHormonalAcne->where('level','green')->count();
                $totalHormonalAcne_yellow = $clientHormonalAcne->where('level','yellow')->count();
                $totalHormonalAcne_red = $clientHormonalAcne->where('level','red')->count();
            @endphp
            <li class="p-2 bg-green-500 m-2 rounded-xl">Level GREEN : {{$totalHormonalAcne_green}} 
                <span class="float-right">
                    {{round( $totalHormonalAcne_green==0?0:(float)($totalHormonalAcne_green / $totalHormonalAcne)*100 , 2)}} %
                </span>
            </li>
            <li class="p-2 bg-yellow-500 m-2 rounded-xl">Level YELLOW : {{$totalHormonalAcne_yellow}} 
                <span class="float-right">
                    {{round( $totalHormonalAcne_yellow==0?0:(float)($totalHormonalAcne_yellow / $totalHormonalAcne)*100 , 2)}} %
                </span>
            </li>
            <li class="p-2 bg-red-500 m-2 rounded-xl">Level RED : {{$totalHormonalAcne_red}} 
                <span class="float-right">
                    {{round( $totalHormonalAcne_red==0?0:(float)($totalHormonalAcne_red / $totalHormonalAcne)*100 , 2)}} %
                </span>
            </li>

        </ul>
    </div>
    <div class="col-span-2 p-4 bg-orange-200 rounded-xl">
        High Testosterone
        <ul>
            @php
                $clientHighTestosterone = $clients->where('type','HighTestosterone')->where('status','done');
                $totalHighTestosterone = $clientHighTestosterone->count();
                $totalHighTestosterone_green = $clientHighTestosterone->where('level','green')->count();
                $totalHighTestosterone_yellow = $clientHighTestosterone->where('level','yellow')->count();
                $totalHighTestosterone_red = $clientHighTestosterone->where('level','red')->count();
            @endphp
            <li class="p-2 bg-green-500 m-2 rounded-xl">Level GREEN : {{$totalHighTestosterone_green}} 
                <span class="float-right">
                    {{round( $totalHighTestosterone_green==0?0:(float)($totalHighTestosterone_green / $totalHighTestosterone)*100 , 2)}} %
                </span>
            </li>
            <li class="p-2 bg-yellow-500 m-2 rounded-xl">Level YELLOW : {{$totalHighTestosterone_yellow}} 
                <span class="float-right">
                    {{round( $totalHighTestosterone_yellow==0?0:(float)($totalHighTestosterone_yellow / $totalHighTestosterone)*100 , 2)}} %
                </span>
            </li>
            <li class="p-2 bg-red-500 m-2 rounded-xl">Level RED : {{$totalHighTestosterone_red}} 
                <span class="float-right">
                    {{round( $totalHighTestosterone_red==0?0:(float)($totalHighTestosterone_red / $totalHighTestosterone)*100 , 2)}} %
                </span>
            </li>

        </ul>
    </div>

    <div class="md:col-span-7 p-4  bg-gray-100 rounded-xl">

        Ages
        <livewire:livewire-column-chart
            {{-- key="{{ $columnChartModel->reactiveKey() }}" --}}
            :column-chart-model="$ages_chart"
        />
        {{-- <ul>
            <li>
                Under 10 : 
                <span>{{$clients->wherebetween('age',[0,10])->count()}}</span>
            </li>
            <li>
                11-20 : 
                <span>{{$clients->wherebetween('age',[11,20])->count()}}</span>
            </li>
            <li>
                21-30 : 
                <span>{{$clients->wherebetween('age',[21,30])->count()}}</span>
            </li>
            <li>
                31-40 : 
                <span>{{$clients->wherebetween('age',[31,40])->count()}}</span>
            </li>
            <li>
                41-50 : 
                <span>{{$clients->wherebetween('age',[41,50])->count()}}</span>
            </li>
            <li>
                Over 51 : 
                <span>{{$clients->wherebetween('age',[51,100])->count()}}</span>
            </li>
        </ul> --}}
    </div>

    <div class="md:col-span-7 p-4 bg-gray-100 rounded-xl">
        Daly Active User
        <livewire:livewire-line-chart
            {{-- key="{{ $columnChartModel->reactiveKey() }}" --}}
            :line-chart-model="$date_chart"
        />
        {{-- @foreach ( $clients->unique('created_at')->pluck('created_at') as $date )
        @php
            $clientToday = $clients->wherebetween('created_at',[$date->toDateString(),$date->addDay(1)->toDateString()]);
        @endphp
            {{$date->toDateString()}} : {{$clientToday->where('status','done')->count()}} / {{$clientToday->count()}}<br>
        @endforeach --}}
    </div>
</div>