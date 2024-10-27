<div class="grid gap-2 md:grid-cols-7 grid-cols-3 p-4 mt-16 md:mt-auto">
    <div class="col-span-3 md:col-span-7 flex gap-2 items-end h-min ">
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


    <span class="col-span-3 md:col-span-2 text-right p-4 bg-gray-100 rounded-xl ">
        <h2 class="col-span-2">Total User</h2>
        <div class="text-6xl font-md relative m-4">
        {{$clients->where('status','done')->count()}}
        <span class="text-sm absolute bottom-0 left-full">
        /{{$clients->count()}}
        </span>
        </div>

    </span>
    <div class="col-span-3 md:col-span-5 p-4 bg-gray-100 rounded-xl grid">

        <h2 class="md:col-span-2">Overall</h2>
        <div>
        <livewire:livewire-pie-chart
            {{-- key="{{ $columnChartModel->reactiveKey() }}" --}}
            :pie-chart-model="$overall_chart"
        />
        </div>
        <ul>
            <li class="p-1">
                <div class="font-md relative text-left bg-[#009CB430] rounded-lg p-1 text-[#009CB4]">
                    PMDD :
                    <span class="relative">
                    {{$clients->where('type','PMDD')->where('status','done')->count()}}
                    <div class="text-2xs absolute bottom-0 left-full">
                    /{{$clients->where('type','PMDD')->count()}}
                    </div>
                    </span>
                </div>
            </li>
            <li class="p-1">
                <div class="font-md relative text-left bg-[#EF482E30] rounded-lg p-1 text-[#EF482E]">
                    Hormonal Acne :
                    <span class="relative">
                    {{$clients->where('type','HormonalAcne')->where('status','done')->count()}}
                    <div class="text-2xs absolute bottom-0 left-full">
                    /{{$clients->where('type','HormonalAcne')->count()}}
                    </div>
                    </span>
                </div>
            </li>
            <li class="p-1">
                <div class="font-md relative text-left bg-[#ED048C30] rounded-lg p-1 text-[#ED048C]">
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

    <div class="col-span-3 md:col-span-1"></div>
    <div class="md:col-span-2 p-1 md:p-4 bg-[#009CB430] text-[#009CB4] rounded-xl">
        <h2 class="h-[4ch] text-center">PMDD</h2>
        <ul class="text-black">
            @php
                $clientPMDD = $clients->where('type','PMDD')->where('status','done');
                $totalPMDD = $clientPMDD->count();
                $totalPMDD_green = $clientPMDD->where('level','green')->count();
                $totalPMDD_yellow = $clientPMDD->where('level','yellow')->count();
                $totalPMDD_red = $clientPMDD->where('level','red')->count();
            @endphp
            <li class="p-2 bg-green text-green-600 m-2 rounded-xl"><span class="block text-sm md:inline-block">Level GREEN : </span> {{$totalPMDD_green}}
                <span class="float-right">
                    {{round( $totalPMDD_green==0?0:(float)($totalPMDD_green / $totalPMDD)*100 , 2)}}%
                </span>
            </li>
            <li class="p-2 bg-yellow text-yellow-600 m-2 rounded-xl"><span class="block text-sm md:inline-block">Level YELLOW : </span> {{$totalPMDD_yellow}}
                <span class="float-right">
                    {{round( $totalPMDD_yellow==0?0:(float)($totalPMDD_yellow / $totalPMDD)*100 , 2)}}%
                </span>
            </li>
            <li class="p-2 bg-red text-red-600 m-2 rounded-xl"><span class="block text-sm md:inline-block">Level RED : </span> {{$totalPMDD_red}}
                <span class="float-right">
                    {{round( $totalPMDD_red==0?0:(float)($totalPMDD_red / $totalPMDD)*100 , 2)}}%
                </span>
            </li>
        </ul>

    </div>
    <div class="md:col-span-2 p-1 md:p-4 bg-[#EF482E30] text-[#EF482E] rounded-xl">
        <h2 class="h-[4ch] text-center">Hormonal Acne</h2>
        <ul class="text-black">
            @php
                $clientHormonalAcne = $clients->where('type','HormonalAcne')->where('status','done');
                $totalHormonalAcne = $clientHormonalAcne->count();
                $totalHormonalAcne_green = $clientHormonalAcne->where('level','green')->count();
                $totalHormonalAcne_yellow = $clientHormonalAcne->where('level','yellow')->count();
                $totalHormonalAcne_red = $clientHormonalAcne->where('level','red')->count();
            @endphp
            <li class="p-2 bg-green text-green-600 m-2 rounded-xl"><span class="block text-sm md:inline-block">Level GREEN : </span> {{$totalHormonalAcne_green}}
                <span class="float-right">
                    {{round( $totalHormonalAcne_green==0?0:(float)($totalHormonalAcne_green / $totalHormonalAcne)*100 , 2)}}%
                </span>
            </li>
            <li class="p-2 bg-yellow text-yellow-600 m-2 rounded-xl"><span class="block text-sm md:inline-block">Level YELLOW : </span> {{$totalHormonalAcne_yellow}}
                <span class="float-right">
                    {{round( $totalHormonalAcne_yellow==0?0:(float)($totalHormonalAcne_yellow / $totalHormonalAcne)*100 , 2)}}%
                </span>
            </li>
            <li class="p-2 bg-red text-red-600 m-2 rounded-xl"><span class="block text-sm md:inline-block">Level RED : </span> {{$totalHormonalAcne_red}}
                <span class="float-right">
                    {{round( $totalHormonalAcne_red==0?0:(float)($totalHormonalAcne_red / $totalHormonalAcne)*100 , 2)}}%
                </span>
            </li>

        </ul>
    </div>
    <div class="md:col-span-2 p-1 md:p-4 bg-[#ED048C30] text-[#ED048C] rounded-xl">
        <h2 class="h-[4ch] text-center">High Testosterone</h2>
        <ul class="text-black">
            @php
                $clientHighTestosterone = $clients->where('type','HighTestosterone')->where('status','done');
                $totalHighTestosterone = $clientHighTestosterone->count();
                $totalHighTestosterone_green = $clientHighTestosterone->where('level','green')->count();
                $totalHighTestosterone_yellow = $clientHighTestosterone->where('level','yellow')->count();
                $totalHighTestosterone_red = $clientHighTestosterone->where('level','red')->count();
            @endphp
            <li class="p-2 bg-green text-green-600 m-2 rounded-xl"><span class="block text-sm md:inline-block">Level GREEN : </span> {{$totalHighTestosterone_green}}
                <span class="float-right">
                    {{round( $totalHighTestosterone_green==0?0:(float)($totalHighTestosterone_green / $totalHighTestosterone)*100 , 2)}}%
                </span>
            </li>
            <li class="p-2 bg-yellow text-yellow-600 m-2 rounded-xl"><span class="block text-sm md:inline-block">Level YELLOW : </span> {{$totalHighTestosterone_yellow}}
                <span class="float-right">
                    {{round( $totalHighTestosterone_yellow==0?0:(float)($totalHighTestosterone_yellow / $totalHighTestosterone)*100 , 2)}}%
                </span>
            </li>
            <li class="p-2 bg-red text-red-600 m-2 rounded-xl"><span class="block text-sm md:inline-block">Level RED : </span> {{$totalHighTestosterone_red}}
                <span class="float-right">
                    {{round( $totalHighTestosterone_red==0?0:(float)($totalHighTestosterone_red / $totalHighTestosterone)*100 , 2)}}%
                </span>
            </li>

        </ul>
    </div>

    <div class="col-span-3 md:col-span-7 p-4  bg-gray-100 rounded-xl">

        Ages
        <div class="max-h-[50vh] min-h-[300px]">
        <livewire:livewire-column-chart
            key="{{ $ages_chart->reactiveKey() }}"
            {{-- key="{{ $columnChartModel->reactiveKey() }}" --}}
            :column-chart-model="$ages_chart"
        />
        </div>
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

    <div class="col-span-3 md:col-span-7 p-4 bg-gray-100 rounded-xl">
        Daly Active User
        <div class="max-h-[50vh] min-h-[300px]">
        <livewire:livewire-line-chart
            key="{{ $date_chart->reactiveKey() }}"
            {{-- key="{{ $columnChartModel->reactiveKey() }}" --}}
            :line-chart-model="$date_chart"
        />
        </div>
        {{-- @foreach ( $clients->unique('created_at')->pluck('created_at') as $date )
        @php
            $clientToday = $clients->wherebetween('created_at',[$date->toDateString(),$date->addDay(1)->toDateString()]);
        @endphp
            {{$date->toDateString()}} : {{$clientToday->where('status','done')->count()}} / {{$clientToday->count()}}<br>
        @endforeach --}}
    </div>
    @php 
        $save_btn=0;
        $share_btn=0;
        $consult_btn=6301;
    @endphp

    @foreach ( $clients->where('remark','<>','') as $c )
    @isset ($c->remark['save'])
        @php
            $save_btn+=1;
        @endphp
    @endisset
    @isset ($c->remark['share'])
        @php
            $share_btn+=1;
        @endphp
    @endisset
    @isset ($c->remark['consult'])
        @php
            $consult_btn+=1;
        @endphp
    @endisset
    @endforeach
    <span class="col-span-3 md:col-span-1"></span>
    <div class="md:col-span-2 p-4 bg-gray-100 rounded-xl py-16 mb-24 text-center">
        Number of save button click
        <div class="max-h-[50vh] text-2xl">
            {{$save_btn}}
        </div>
    </div>
    <div class="md:col-span-2 p-4 bg-gray-100 rounded-xl py-16 mb-24 text-center">
        Number of share button click
        <div class="max-h-[50vh] text-2xl">
            {{$share_btn}}
        </div>
    </div>
    <div class="md:col-span-2 p-4 bg-gray-100 rounded-xl py-16 mb-24 text-center">
        Number of cousult button click
        <div class="max-h-[50vh] text-2xl">
            {{$consult_btn}}
        </div>
    </div>
</div>
