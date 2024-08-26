<div class="flex flex-col gap-2 p-4">
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
    @foreach ($clients as $c)
    <div class="p-2 m-2 bg-gray-100 grid grid-cols-2 gap-2">
        <div class="col-span-2">
            {{$c->name}} {{$c->age}} <br>
            score : {{$c->score}} <br>
            level : {{$c->level}} <br>
            status : {{$c->status}}
        </div>
        <div class="border-2 border-white p-2">
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
        <div class="border-2 border-white p-2">
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
