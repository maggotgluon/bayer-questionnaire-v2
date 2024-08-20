<div class="bg-gradient-to-b from-[#FFAD2F] to-[#FF6D58]">
    <div class="fixed left-1 top-1">
        <x-button label="back" wire:click="back()"/>
        <x-button label="next" wire:click="next()"/>
    </div>
    @switch($page)
        @case(1)
            <section class="h-screen grid">
                <div class="p-4 bg-paper rounded-lg text-center flex flex-col justify-center">
                    <h2 class="text-3xl">
                        สิวผลุบ ๆ โผล่ ๆ <br>
                        เหมือนตัวตุ่นทีไร
                    </h2>
                    <h3 class="text-2xl">
                    ว้าวุ่นใจทุกที
                    </h3>
                    <img src="{{asset('images/q2-1.png')}}" class="p-8"/>
                    <div class="text-center">
                        <x-button class="btn-2" wire:click="next" label="ต่อไป" />
                    </div>
                </div>
            </section>
            
            @break
        @case(2)
            <section class="h-screen grid grid-rows-[150px,1fr,100px] p-6">
                <div class="text-center">
                <h2 class="text-3xl">
                    สิวเกิดขึ้นในช่วง<br>
                    ก่อนมีประจำเดือน <br>
                    1 สัปดาห์ ใช่หรือไม่
                </h2>
                <span>(เลือกได้มากกว่า 1 ข้อ)</span>
                </div>
                <ul>
                    <li><div class="radio btn-ans"><x-radio id="q-3-1" wire:model="data.quiz_3" value="1" label="ใช่"/></div></li>
                    <li><div class="radio btn-ans"><x-radio id="q-3-2" wire:model="data.quiz_3" value="0" label="ไม่ใช่"/></div></li>
                </ul>
                <div class="text-center">
                    <x-button class="btn-2" wire:click="next" label="ต่อไป" />
                </div>
            </section>
            @break
        @case(3)
            <section class="h-screen grid grid-rows-[150px,1fr,100px] p-6">
                <div class="text-center">
                    <h2 class="text-3xl">
                        สิวประเภทไหนที่ขึ้น<br>
                        บนใบหน้าก่อนมีประจำเดือน 
                    </h2>
                    <span>(เลือกได้มากกว่า 1 ข้อ)</span>
                </div>
                <ul>
                    <li><div class="radio btn-ans"><img src="" class="bg-pink-300 h-full aspect-square absolute top-0 left-0"/> <x-checkbox lg id="q-1" value="1" label="สิวอุดตันหัวดำ"> </x-checkbox>
                    </div></li>
                    <li><div class="radio btn-ans"><img src="" class="bg-pink-300 h-full aspect-square absolute top-0 left-0"/> <x-checkbox lg id="q-2" value="1" label="สิวอุดตันหัวขาว"> </x-checkbox>
                    </div></li>
                    <li><div class="radio btn-ans"><img src="" class="bg-pink-300 h-full aspect-square absolute top-0 left-0"/> <x-checkbox lg id="q-3" value="1" label="สิวตุ่มหนอง"> </x-checkbox>
                    </div></li>
                    <li><div class="radio btn-ans"><img src="" class="bg-pink-300 h-full aspect-square absolute top-0 left-0"/> <x-checkbox lg id="q-4" value="1" label="สิวหัวช้าง"> </x-checkbox>
                    </div></li>
                    <li><div class="radio btn-ans"><img src="" class="bg-pink-300 h-full aspect-square absolute top-0 left-0"/> <x-checkbox lg id="q-5" value="1" label="สิวผด"> </x-checkbox>
                    </div></li>
                </ul>
                <div class="text-center">
                    <x-button class="btn-2" wire:click="next" label="ต่อไป" />
                </div>
            </section>
            
            @break
        @case(4)
            <section class="h-screen grid grid-rows-[150px,1fr,100px] p-6">
                <div class="text-center">
                    <h2 class="text-3xl">
                    นอกจากสิวที่เธอเป็น <br>
                    เธอมีอาการอื่นอีกไหม
                    </h2>
                    <span>(เลือกได้มากกว่า 1 ข้อ)</span>
                </div>
                <ul>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-6" value="1" label="ประจำเดือนมา ๆ หาย ๆ เดาใจยากเหมือนคนคุย"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-7" value="1" label="หน้ามัน เหมือนหนังปลาทู"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-8" value="1" label="ขนดก เหมือนผู้ชายมาดแมน"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-9" value="1" label="ผมร่วงเหมือนใบไม้แห้ง"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-0" value="1" label="ไม่มีอาการใดๆ โชคดีเหมือนถูกหวย"/></div></li>
                </ul>
                <div class="text-center">
                    <x-button class="btn-2" wire:click="next" label="ต่อไป" />
                </div>
            </section>
            
            @break
        @case(5)
            <section class="h-screen grid">
                <div class="p-4 bg-paper rounded-lg text-center flex flex-col justify-center">
                    <h2 class="text-3xl text-center">
                        หยุดสิวผลุบ ๆ โผล่ ๆ <br>
                        เหมือนตัวตุ่น<br>
                        ก่อนเป็นประจำเดือน<br>
                    </h2>
                    <img src="{{asset('images/q2-2.png')}}" class="p-4"/>
                    <div class="text-center">
                        <x-button class="btn-2" wire:click="next" label="ต่อไป" />
                    </div>
                </div>
            </section>
            @break
        @case(6)
            <section class="h-screen grid grid-rows-[150px,1fr,100px] p-6">
                <div class="text-center">
                    <h2 class="text-3xl">
                        รู้จัก ‘สิวฮอร์โมน’ ไหม
                    </h2>
                </div>
                
                <ul>
                    <li><div class="radio btn-ans"><x-radio id="q-4-1" wire:model="data.quiz_4" value="1" label="รู้จัก"/></div></li>
                    <li><div class="radio btn-ans"><x-radio id="q-4-2" wire:model="data.quiz_4" value="0" label="ไม่แน่ใจ"/></div></li>
                    <li><div class="radio btn-ans"><x-radio id="q-4-3" wire:model="data.quiz_4" value="-1" label="ไม่รู้จัก"/></div></li>
                </ul>
                <div class="text-center">
                    <x-button class="btn-2" wire:click="next" label="ต่อไป" />
                </div>
            </section>
            @break
        @case(7)
            <section>
            <h2>สิวฮอร์โมน
            เกิดขึ้นซ้ำ ๆ ทำใจไม่ได้</h2>

            <p>ปัญหาสิวฮอร์โมนกวนใจเป็นอะไรที่เลี่ยงยากสุด ๆ และควบคุมไม่ได้ เพราะเกิดขึ้นจากฮอร์โมนในร่างกายที่ผิดปกติ จนบางครั้งทำให้เราไม่มั่นใจการใช้ชีวิตประจำวันเลยด้วยซ้ำ</p>

            สังเกตสิวฮอร์โมน
            <ul>
                <li>สิวขึ้นซ้ำ ๆ ที่เดิมก่อนเป็นประจำเดือน </li>
                <li>สิวมักขึ้นบริเวณคางและกราม</li>
            </ul>

            ลักษณะสิวฮอร์โมน สิวอุดตันหัวดำ
            <ul>
                <li>สิวอุดตันหัวขาว</li>
                <li>สิวหัวช้าง</li>
                <li>สิวตุ่มหนอง</li>
            </ul>

            วิธีรับมือกับสิวฮอร์โมน
            <ul>
                <li>หมั่นทำความสะอาด ใช้ผลิตภัณฑ์รักษาสิว</li>
                <li>หลีกเลี่ยงอาหารที่ส่งผลกับสิวฮอร์โมน เช่น เค้ก ข้าวขาว</li>
                <li>ปรึกษาเภสัชกรหรือแพทย์เพื่อหาแนวทางในการปรับเปลี่ยนด้วยฮอร์โมน เช่น EE30D หากเข้าเงื่อนไข</li>
            </ul>

                <div class="text-center">
                    <x-button class="btn-2" wire:click="next" label="ต่อไป" />
                </div>
            </section>
            @break
        @case(8)
            <div>result</div>
            
            @break
        
        @default
            
    @endswitch

</div>
