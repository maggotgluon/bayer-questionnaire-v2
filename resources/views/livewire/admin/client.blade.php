<div class="flex flex-col gap-2 p-2 md:p-4 mt-8 md:mt-auto">
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

    Client
    
    <div class="flex gap-2 justify-left items-end">
        <x-select
            label="Select Status"
            placeholder="Select one status"
            :options="[
                ['value'=>'all','label'=>'All'],
                ['value'=>'null','label'=>'Unfinished'], 
                ['value'=>'done','label'=>'Done']
                ]"

            option-label="label"
            option-value="value"
            wire:model.live="filter.status"
        />
        <x-select
            label="Select Type"
            placeholder="Select client group"
            :options="[
                ['value'=>'PMDD','label'=>'PMDD'],
                ['value'=>'HormonalAcne','label'=>'Hormonal Acne'], 
                ['value'=>'HighTestosterone','label'=>'High Testosterone']
                ]"

            option-label="label"
            option-value="value"
            wire:model.live="filter.type"
        />
        <x-select
            label="Show"
            placeholder="Select number of client result"
            :options="[1,5,10,20,50]"

            wire:model.live="filter.show"
        />
    </div>
    <div class="pb-24">
    @foreach ($clients as $c)

    <div class="p-2 md:p-4 md:m-2 bg-gray-100 grid grid-cols-2 gap-2 rounded-xl relative overflow-hidden bg-{{$c->type}}">
        <span class="bg-{{$c->level}} absolute w-2 h-full"></span>
        <h2 class="px-4 col-span-2 text-{{$c->type}} bg-{{$c->type}} text-2xl font-medium">{{$c->name}} {{$c->age}} </h2>
        <div>
            Type : <span class="text-{{$c->type}}">{{$c->type}} </span><br>
            status : <span class="inline-flex items-center gap-2 {{$c->status?'text-green-500':'text-red-600'}}"><x-icon name="{{$c->status?'check-circle':'x-circle'}}" class="w-4 h-4" /> {{$c->status?'Done':'Unfinish'}}</span>
        </div>
        <div>
            <span class="bg-{{$c->level}} p-1 px-2"> level : {{$c->level}} <br></span>
            score : {{$c->score}} <br>
        </div>
        <div class="border-2 bg-white/50 border-white p-2  h-[10ch] overflow-y-scroll">
            <h4 class="text-xl">answer</h4>
            <ul>
                @foreach ($c->answer as $key => $ans)
                    <li class="flex gap-2 pl-2"> {{$key}} <br>
                        <ul class="flex gap-2">
                            @foreach ($ans as $sele)
                                <li class=" pl-2">{{$sele}}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <hr>
            </ul>
        </div>
        @isset($c->symptom)
        <div class="border-2 bg-white/50 border-white p-2 h-[10ch] overflow-y-scroll">
            <h4 class="text-xl">symptom</h4>
            <ul>
                @foreach ($c->symptom as $ans)
                    <li class=" pl-2">{{$ans}}</li>
                @endforeach
            </ul>
        </div>
        @endisset
    </div>
    @endforeach
    </div>
    <div class="fixed bottom-1 left-1 md:left-auto right-1 w-11/12 md:w-auto h-min">
        {{ $clients->links() }}
    </div>
</div>
