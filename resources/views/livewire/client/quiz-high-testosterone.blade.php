<div class="bg-gradient-to-b from-[#FF97AD] to-[#FF248A] w-full grid justify-items-center">
    <div class="shadow-lg grid max-w-md w-full">
        @if (env('APP_DEBUG',false))            
            <div class="fixed left-1 top-1">
                <x-button label="back" wire:click="back()" />
                <x-button label="next" wire:click="next()" />
            </div>
        @endif
        @switch($page)
            @case(1)
                <section class="h-screen grid">
                    <div class="p-4 bg-paper rounded-lg text-center flex flex-col justify-center">
                        <h2 class="text-3xl">
                            @isset($client->remark)
                                {{-- @if (array_search('change route',$client->remark)===false) --}}
                                นอกจากสิวแล้ว<br>
                                เธอยังมีปัญหาอื่นๆ อีก<br> ขอเช็คอีกนิดนะ
                                @else
                                ประจำเดือนมาๆ หายๆ<br>
                                เดาใจยากเหมือนคนคุย
                            @endisset
                                {{-- @endif --}}
                        </h2>
                        <img src="{{asset('images/q3-1.png')}}" class="p-8"/>

                        <div class="text-center">
                            <x-button class="btn-3" wire:click="next" label="ต่อไป" />
                        </div>
                    </div>
                </section>
            @break

            @case(2)
                <section class="h-screen grid grid-rows-[150px,1fr,100px] gap-2 p-6">
                    <div class="text-center">
                        <h2 class="text-3xl text-center">
                            ประจำเดือนของเธอ<br>
                            เป็นแบบไหน
                        </h2>
                        <span 
                        {{-- class="text-[#F4A3C8]" --}}
                        >
                            นับจากวันแรกที่มีประจําเดือน<br> 
                            จนถึงวันแรกที่มีประจําเดือนรอบลาสุด<br>
                            เลือก 1 ข้อเท่านั้น
                        </span>
                    </div>
                    <ul>
                        <li><div class="radio btn-ans"><x-radio id="q-1-1" wire:model="data.quiz_1" value="1" label="ประจำเดือนไม่มานานกว่า 35 วัน" /></div></li>
                        <li><div class="radio btn-ans"><x-radio id="q-1-2" wire:model="data.quiz_1" value="2" label="ประจำเดือนยังไม่มา นานเกิน 90 วัน แต่เคยมาปกติ" /></div></li>
                        <li><div class="radio btn-ans"><x-radio id="q-1-3" wire:model="data.quiz_1" value="3" label="ประจำเดือนมาปกติ รอบเดือนอยู่ที่ 21-35 วัน" /></div></li>
                    </ul>

                    <div class="text-center">
                        <x-button class="btn-3" wire:click="quiz_1Submit" label="ต่อไป" />
                    </div>
                </section>
            @break

            @case(3)
                <section class="h-screen grid grid-rows-[150px,1fr,100px] gap-2 p-6">
                    <div class="text-center">
                        <h2 class="text-3xl text-center">
                            นอกจากประจำเดือนขาด เธอมีอาการอื่นร่วมไหม
                        </h2>
                        <span>ตอบได้มากกว่า 1 ข้อนะ</span>
                    </div>
                    <ul>
                        <li><div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.1" label="สิวเห่อ สิวผลุบๆ โผล่ๆ เหมือนตัวตุ่น" /></div></li>
                        <li><div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.2" label="หน้ามัน เหมือนหนังปลาทู" /></div></li>
                        <li><div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.3" label="ขนดก เหมือนผู้ชายมาดแมน" /></div></li>
                        <li><div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.4" label="ผมร่วง เหมือนใบไม้แห้ง" /></div></li>
                        <li><div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.5" label="ไม่มีอาการใด ๆ โชคดีเหมือนถูกหวย" /></div></li>
                    </ul>
                    <div class="text-center">
                        <x-button class="btn-3" wire:click="quiz_2Submit" label="ต่อไป" />
                    </div>
                </section>
            @break

            @case(4)
                <section class="h-screen grid p-6">
                    <div class="p-4 bg-paper rounded-lg text-center flex flex-col justify-center">
                        <h2 class="text-3xl text-center">
                            เป็นผู้หญิง<br>
                            แต่ร่างกายเหมือนชาย
                        </h2>
                            (ทั้งผิวมัน ขนดก ผมร่วง)
                        <h2 class="text-3xl text-center">
                            แก้ปัญหาอย่างไรดี?<br>
                        </h2>
                        <img src="{{asset('images/q3-2.png')}}" class="p-4 w-3/4 mx-auto"/>
                        <div class="text-center">
                            <x-button class="btn-3" wire:click="next" label="ต่อไป" />
                        </div>
                    </div>
                </section>
            @break

            @case(5)
                <section class="h-screen grid p-6">
                    <div class="p-4 bg-paper rounded-lg text-center flex flex-col justify-center">
                        <h2 class="text-3xl text-center">
                            หยุดปัญหา<br>
                            ฮอร์โมนเพศชายสูง<br>
                            บอกลาจากต้นตอ
                        </h2>
                        <img src="{{asset('images/q3-3.png')}}" class="p-4 w-3/4 mx-auto"/>
                        <div class="text-center">
                            <x-button class="btn-3" wire:click="next" label="ต่อไป" />
                        </div>
                    </div>
                </section>
            @break

            @case(6)
                <section class="h-screen grid grid-rows-[150px,1fr,100px] gap-2 p-6">
                    <div class="text-center">
                        <h2 class="text-3xl text-center">
                            รู้จัก “อาการฮอร์โมน<br> เพศชายสูงในผู้หญิง” ไหม
                        </h2>
                    </div>

                    <ul>
                        <li><div class="radio btn-ans"><x-radio id="q-4-1" wire:model="data.quiz_3" value="1" label="รู้จัก" /></div></li>
                        <li><div class="radio btn-ans"><x-radio id="q-4-2" wire:model="data.quiz_3" value="0" label="ไม่แน่ใจ" /></div></li>
                        <li><div class="radio btn-ans"><x-radio id="q-4-3" wire:model="data.quiz_3" value="-1" label="ไม่รู้จัก" /></div></li>
                    </ul>
                    <div class="text-center">
                        <x-button class="btn-3" wire:click="quiz_3Submit" label="ต่อไป" />
                    </div>
                </section>
            @break

            @case(7)
                <section>
                    <img src="{{asset('images/exp3.png')}}"/>
                    
                    <div class="text-center">
                        <x-button class="btn-3" wire:click="getResult" label="ต่อไป" />
                    </div>
                </section>
            @break

            @case(8)
                <div>result</div>
            @break

            @default
        @endswitch

    </div>
</div>
