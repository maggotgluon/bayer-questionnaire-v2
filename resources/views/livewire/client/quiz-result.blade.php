<div class="bg-gradient-to-b from-[rgba(171,229,65,1)] via-35% via-[rgba(64,196,168,1) ] to-[rgba(2,100,166,1)] w-full grid justify-items-center">
    <div class="shadow-lg grid max-w-md w-full justify-items-center">
        <div class="relative h-min">
            <img src="{{asset('images/'.$image)}}"/>
            <span class="absolute top-[5.5%] left-[74%] {{$client->type=="HormonalAcne"?' text-black ' : ' text-white '}}">
                {{$client->name}}
            </span>
            <span class="absolute top-[63%] left-[7%] w-[53%] h-[33%] text-xs ">
                @foreach ($client->answer as $a)
                    - {{$a}}<br>
                @endforeach
            </span>
            <span class="absolute top-[73%] left-[62%] w-[37%] h-[23%]">
                <x-button class="btn-0 !m-0 !w-full !p-2 min-h-[20%]" label="SAVE PHOTO"/>
                <x-button class="btn-0 !m-0 !w-full !p-2 min-h-[20%] {{$element['color']}}" label="SHARE QUIZ"/>
                <x-button class="{{$element['btn']}} !m-0 !w-full !p-2 min-h-[70%]" >
                    ปรึกษาปัญหา <br>สุขภาพผู้หญิง
                </x-button>
            </span>
            {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        </div>
    </div>
</div>
