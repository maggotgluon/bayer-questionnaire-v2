<div class="grid gap-2 grid-cols-7 p-4">
    <div class="md:col-span-7 flex gap-2 items-end">
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


    <span class="col-span-2 text-right">
        Total User
        <div class="text-4xl font-md relative">
        {{$clients->where('status','done')->count()}}
        <span class="text-sm absolute bottom-0 left-full">
        /{{$clients->count()}}
        </span>
        </div>

    </span>
    <div class="col-span-5">Overall</div>

    <div ></div>
    <div class="col-span-2 p-4">
        PMDD
        <div class="text-4xl font-md relative text-right">
            {{$clients->where('type','PMDD')->where('status','done')->count()}}
            <div class="text-sm absolute bottom-0 left-full">
            /{{$clients->where('type','PMDD')->count()}}
            </div>
        </div>
        <ul>
            <li>Level GREEN : {{$clients->where('type','PMDD')->where('status','done')->where('level','green')->count()}}</li>
            <li>Level YELLOW : {{$clients->where('type','PMDD')->where('status','done')->where('level','yellow')->count()}}</li>
            <li>Level RED : {{$clients->where('type','PMDD')->where('status','done')->where('level','red')->count()}}</li>
        </ul>

    </div>
    <div class="col-span-2 p-4">
        Hormonal Acne
        <div class="text-4xl font-md relative text-right">
            {{$clients->where('type','HormonalAcne')->where('status','done')->count()}}
            <div class="text-sm absolute bottom-0 left-full">
            /{{$clients->where('type','HormonalAcne')->count()}}
            </div>
        </div>
        <ul>
            <li>Level GREEN :  {{$clients->where('type','HormonalAcne')->where('status','done')->where('level','green')->count()}}</li>
            <li>Level YELLOW :  {{$clients->where('type','HormonalAcne')->where('status','done')->where('level','yellow')->count()}}</li>
            <li>Level RED :  {{$clients->where('type','HormonalAcne')->where('status','done')->where('level','red')->count()}}</li>
        </ul>
    </div>
    <div class="col-span-2 p-4">
        High Testosterone
        <div class="text-4xl font-md relative text-right">
            {{$clients->where('type','HighTestosterone')->where('status','done')->count()}}
            <div class="text-sm absolute bottom-0 left-full">
            /{{$clients->where('type','HighTestosterone')->count()}}
            </div>
        </div>
        <ul>
            <li>Level GREEN :  {{$clients->where('type','HighTestosterone')->where('status','done')->where('level','green')->count()}}</li>
            <li>Level YELLOW :  {{$clients->where('type','HighTestosterone')->where('status','done')->where('level','yellow')->count()}}</li>
            <li>Level RED :  {{$clients->where('type','HighTestosterone')->where('status','done')->where('level','red')->count()}}</li>
        </ul>
    </div>

    <div class="col-span-7 p-4">
        Ages
        <ul>
            <li>
                Under 10
                {{$clients->wherebetween('age',[0,10])->count()}}
            </li>
            <li>
                11-20
                {{$clients->wherebetween('age',[11,20])->count()}}
            </li>
            <li>
                21-30
                {{$clients->wherebetween('age',[21,30])->count()}}
            </li>
            <li>
                31-40
                {{$clients->wherebetween('age',[31,40])->count()}}
            </li>
            <li>
                41-50
                {{$clients->wherebetween('age',[41,50])->count()}}
            </li>
            <li>
                Over 51
                {{$clients->wherebetween('age',[51,100])->count()}}
            </li>
        </ul>
    </div>

    {{-- <div class="col-span-7 p-4">Visitor</div> --}}
</div>