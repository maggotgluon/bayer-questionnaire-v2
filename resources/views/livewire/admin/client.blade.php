<div>
    Client
    @foreach ($client as $c)
    <div class="p-2 m-2 bg-gray-100 grid grid-cols-2 gap-2">
        <div class="col-span-2">{{$c->name}} {{$c->age}}</div>
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
