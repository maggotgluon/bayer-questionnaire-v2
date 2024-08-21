<div class="bg-gradient-to-b from-[rgba(171,229,65,1)] via-35% via-[rgba(64,196,168,1) ] to-[rgba(2,100,166,1)] w-full grid justify-items-center">
    <div class="shadow-lg grid max-w-md w-full justify-items-center">
        <div class="relative h-min">
            <img src="{{asset('images/'.$image)}}"/>
            <span class="absolute top-[5.5%] left-[78%] text-white">
                {{$client->name}}
            </span>
            {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        </div>
    </div>
</div>
