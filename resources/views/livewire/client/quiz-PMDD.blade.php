<div>
    <div class="fixed left-1 top-1">
        <x-button label="back" wire:click="back()" />
        <x-button label="next" wire:click="next()" />
    </div>

    @switch($page)
        @case(1)
            <section class="h-screen grid">
                <div class="p-4 bg-paper rounded-lg text-center">
                    <img src="{{asset('images/q1-1.png')}}" class="p-8"/>
                    <h2 class="text-3xl">มนุษย์กลายร่าง</h2>
                    <span class="text-xl">(ทางอารมณ์)</span>
                    <h3 class="text-2xl">ที่เธอไม่ได้สร้างเอง</h3>
                    <div>
                        <x-button class="btn-1" wire:click="next" label="ต่อไป" />
                    </div>
                </div>
            </section>

        @break

        @case(2)
            <section class="h-screen grid grid-rows-[150px,1fr,100px] gap-2 p-6">
                <div class="text-center">
                    <span class="text-center">อาการก่อนเป็นประจำเดือน</span>
                    <h2 class="text-3xl text-center">
                        มนุษย์กลายร่างแบบไหน ก่อนเป็นประจำเดือน
                    </h2>
                    <span class="text-center text-red-700">(เลือกได้มากกว่า 1 ข้อ)</span>
                </div>
                <ul>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_1.1" value="1"
                                label="มนุษย์ถ้ำจำศีลที่อยากอยู่เงียบ ๆ คนเดียว" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_1.2" value="2"
                                label="มนุษย์ดราม่า น้ำตาไหลเหมือนน้ำจะท่วม" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_1.3" value="3"
                                label="มนุษย์ขี้วีน โมโหฉ่ำเหมือนพายุเข้า" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_1.4" value="4"
                                label="เครียด วิตกกังวล" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_1.5" value="5"
                                label="ไม่มีอาการทางอารมณ์" /></div>
                    </li>
                </ul>

                <div class="text-center">
                    <x-button class="btn-1"  wire:click="quiz_1Submit" label="ต่อไป" />
                </div>
            </section>
        @break

        @case(3)
            <section class="h-screen grid grid-rows-[150px,1fr,100px] gap-2 p-6">
                <div>
                    <h2 class="text-3xl text-center">
                        นอกจากอารมณ์ที่แปรปรวนร่างกายเธอรวนบ้างไหม
                    </h2>
                    <span class="text-center text-red-700">(เลือกได้มากกว่า 1 ข้อ)</span>
                </div>
                <ul>
                    <li>
                        <div class="radio btn-ans"><x-checkbox name="q-2" wire:model="data.quiz_2.1"
                                label="นอนไม่หลับ ร่างกายกระสับกระส่าย" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox name="q-2" wire:model="data.quiz_2.2"
                                label="ตัวบวม หน้าบวมเหมือนลูกโป่งเดินได้" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox name="q-2" wire:model="data.quiz_2.3"
                                label="ไม่อยากอาหาร เหมือนคนอกหัก" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox name="q-2" wire:model="data.quiz_2.4" label="เจ็บเต้านม " />
                        </div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox name="q-2" wire:model="data.quiz_2.5"
                                label="ปวดกล้ามเนื้อ เหมือนโดนทับ" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox name="q-2" wire:model="data.quiz_2.6"
                                label="ยังดีอยู่...ที่ร่างกายเหมือนเดิมไม่มีเปลี่ยนแปลง" /></div>
                    </li>
                </ul>

                <div class="text-center">
                    <x-button class="btn-1" wire:click="quiz_2Submit" label="ต่อไป" />
                </div>
            </section>
        @break

        @case(4)
            <section class="h-screen grid">
                <div class="p-4 bg-paper rounded-lg text-center flex flex-col justify-center">
                    <h2 class="text-3xl text-center">
                        แข็งแกร่ง<br>
                        เหมือนยอดมนุษย์<br>
                        ก็เธอนั่นแหละ
                    </h2>
                    <img src="{{asset('images/q1-2.png')}}" class="p-4"/>
                    <div>
                        <x-button class="btn-1" wire:click="next" label="ต่อไป" />
                    </div>
                </div>
            </section>
        @break

        @case(5)
            <section class="h-screen grid grid-rows-[150px,1fr,100px] p-6">
                <h2 class="text-3xl text-center">
                    อาการเหล่านี้เกิดขึ้นก่อนมีประจำเดือนภายใน 1 สัปดาห์
                </h2>
                <ul>
                    <li>
                        <div class="radio btn-ans"><x-radio id="q-3-1" wire:model="data.quiz_3" value="1"
                                label="ใช่" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-radio id="q-3-2" wire:model="data.quiz_3" value="0"
                                label="ไม่ใช่" /></div>
                    </li>
                </ul>
                <div class="text-center">
                    <x-button class="btn-1" wire:click="quiz_3Submit" label="ต่อไป" />
                </div>
            </section>
        @break

        @case(6)
            <section class="h-screen grid">

                <div class="p-4 bg-paper rounded-lg text-center flex flex-col justify-center">
                    <img src="{{asset('images/q1-3.png')}}" class="p-4 w-5/6 mx-auto"/>
                    <h2 class="text-3xl text-center">
                    ไม่ต้องโทษตัวเองนะ
                    </h2>
                    <p class="text-lg">
                    เพราะทุกความรู้สึกที่เกิดขึ้น<br>
                    ไม่ใช่ความผิดของเธอ<br>
                    แต่เป็นความผิดปกติของฮอร์โมน<br>
                    </p>

                    <div>
                        <x-button class="btn-1" wire:click="next" label="ต่อไป" />
                    </div>
                </div>
            </section>
        @break

        @case(7)
            <section class="h-screen grid grid-rows-[1fr,150px,100px]">
                <div class="bg-1-4 relative">
                    <span class="absolute bottom-[1%] left-[13%] w-[80%] h-[13%] grid items-center text-center text-2xl">หยุดกลายร่างได้</span>
                </div>
                <span class="text-center text-2xl">
                แค่เข้าใจร่างกายเธอก่อน
                </span>

                <div class="text-center">
                    <x-button class="btn-1" wire:click="next" label="ต่อไป" />
                </div>
            </section>
        @break

        @case(8)
            <section class="h-screen grid grid-rows-[150px,1fr,100px] p-6">
                <h2 class="text-3xl text-center">
                    รู้จักภาวะ “PMDD” ไหม
                </h2>

                <ul>
                    <li>
                        <div class="radio btn-ans"><x-radio id="q-4-1" wire:model="data.quiz_4" value="1"
                                label="รู้จัก" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-radio id="q-4-2" wire:model="data.quiz_4" value="0"
                                label="ไม่แน่ใจ" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-radio id="q-4-3" wire:model="data.quiz_4" value="-1"
                                label="ไม่รู้จัก" /></div>
                    </li>
                </ul>

                <div class="text-center">
                    <x-button class="btn-1" wire:click="quiz_4Submit" label="ต่อไป" />
                </div>
            </section>
        @break

        @case(9)
            <section>
                <img src="{{asset('images/exp1.png')}}"/>
                
                <div class="text-center">
                    <x-button class="btn-1" wire:click="getResult" label="ต่อไป" />
                </div>
            </section>
        @break

        @case(10)
            <div>result</div>
        @break

        @default
    @endswitch
</div>
