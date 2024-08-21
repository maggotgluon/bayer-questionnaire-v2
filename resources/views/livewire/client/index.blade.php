<div class="bg-gradient-to-b from-[rgba(171,229,65,1)] via-35% via-[rgba(64,196,168,1) ] to-[rgba(2,100,166,1)] w-full grid justify-items-center">
    <div class="shadow-lg grid max-w-md w-full justify-items-center">
        @if (env('APP_DEBUG',false))            
            <div class="fixed left-1 top-1">
                <x-button label="back" wire:click="back()" />
                <x-button label="next" wire:click="next()" />
            </div>
        @endif
        
        @switch($page)
            @case(1)
                <section class="h-screen grid p-6 bg-white">
                    Demo
                    
                    <div>
                        <x-button wire:click="next" label="ต่อไป"/>
                    </div>
                </section>
                @break
            @case(2)
                <section class="h-screen grid gap-2 grid-rows-[1fr,100px] p-6">
                    <div class="bg-paper flex gap-2 flex-col justify-center">
                        <div class="text-center">
                            <h2 class="text-2xl">ฮอร์โมนเรายังสมดุลอยู่ไหมนะ</h2>
                            <h2 class="text-5xl font-medium">มาเช็กกัน !</h2>
                        </div>
                        <img src="{{asset('images/q0-1.png')}}"/>
                    </div>
                    <div class="text-center">
                        <x-button class="btn btn-1" wire:click="next" label="ต่อไป"/>
                    </div>
                </section>
                @break
            @case(3)
                <section class="h-screen grid gap-2 grid-rows-[1fr,100px] p-6">
                    <div class="bg-paper py-2 my-2  flex gap-2 flex-col justify-center">
                        <h2 class="text-center">เงื่อนไขการใช้งาน</h2>
                        <div class="max-h-[400px] w-5/6 overflow-y-scroll mx-auto soft-scrollbar">
                            <p class="p-4 my-2 text-center">
                                การตกลงเข้าร่วมกิจกรรมนี้ถือว่าผู้ร่วมกิจกรรมยอมรับข้อกำหนด
                                และเงื่อนไขต่าง ๆ ในการเข้าร่วมกิจกรรมนี้ทั้งหมดและรับทราบว่า เว็บไซต์ Hormonal Quiz (ต่อไปนี้เรียกว่า “เว็บไซต์ Hormonal Quiz”) จะดำเนินการเก็บรวบรวม ใช้ เปิดเผย หรือประมวลผลข้อมูลส่วนบุคคลทั้งหลายที่ท่านได้ให้แก่เว็บไซต์ Hormonal Quiz ตามกฎหมายคุ้มครองข้อมูลส่วนบุคคล เช่น ชื่อ อายุ อาการด้านร่างกายและอารมณ์ โดยเว็บไซต์ Hormonal Quiz จะเก็บรักษาข้อมูลส่วนบุคคลของท่านไว้ตลอดระยะเวลากิจกรรมนี้ เพื่อวัตถุประสงค์ในการวิเคราะห์ข้อมูล
                                และเพื่อวางแผนทางการตลาด
                            </p><p class="p-4 my-2 text-center">    
                                ผู้ใช้เว็บไซต์ Hormonal Quiz รับทราบและตกลงว่า เว็บไซต์ Hormonal Quiz มีลิงก์/ข้อมูลอ้างอิงไปยังช่องทางของ Medcare การคลิกที่ลิงก์ที่ให้ไว้ แสดงว่าคุณกำลังออกจาก เว็บไซต์ Hormonal Quiz ไปยังแอปพลิเคชันบุคคลที่สามที่คุณอาจสนใจด้านการดูแลสุขภาพ
                                เมื่อคลิกลิงก์ที่ให้ไว้คุณจะถูกนำไปยังแอปพลิเคชันภายนอก ไม่ได้อยู่ภายใต้การควบคุมของเจ้าของเว็บไซต์ Hormonal Quiz ผู้แทนและ/หรือตัวแทน ของเจ้าของเว็บไซต์ Hormonal Quiz จะไม่รับผิดชอบต่อเนื้อหา และข้อกำหนดการใช้งานของบุคคลที่สาม โดยการให้ลิงก์ดังกล่าวไปยังแอปพลิเคชัน เจ้าของเว็บไซต์ Hormonal Quiz ผู้แทน และ/หรือตัวแทน เจ้าของเว็บไซต์ Hormonal Quiz จะไม่รับผิดชอบใดๆ ต่อเนื้อหา หรือความพร้อมของเนื้อหาของแอปพลิเคชันบุคคลที่สามดังกล่าว หรือความรับผิดใดๆ สำหรับ ความเสียหายหรือการบาดเจ็บที่เกิดจากการใช้เนื้อหาดังกล่าว ไม่ว่าจะอยู่ในรูปแบบใดก็ตาม เจ้าของเว็บไซต์ Hormonal Quiz ผู้แทน และ/หรือตัวแทนของเจ้าของเว็บไซต์ Hormonal Quiz ไม่รับประกันว่าหน้าเว็บไซต์ที่เชื่อมโยงจะให้ข้อมูลที่มีคุณภาพสม่ำเสมอ การลิงก์ไปยังแอปพลิเคชันอื่นมีให้สำหรับผู้ใช้เว็บไซต์เพื่อความสะดวกเท่านั้น ผู้ใช้เข้าถึงแอปพลิเคชันดังกล่าวยอมรับความเสี่ยงเอง การเลือกลิงก์ไม่ได้จำกัดผู้ใช้ไปยังหน้าที่เชื่อมโยง นโยบายความเป็นส่วนตัวของข้อมูลในเว็บไซต์อื่นอาจแตกต่างจากเว็บไซต์นี้ ดังนั้นโปรดอ่านข้อกำหนดและนโยบายความเป็นส่วนตัวเหล่านั้นอย่างละเอียด ในกรณีที่มีคำถามเกี่ยวกับบริการและผลิตภัณฑ์ที่นำเสนอโดยแอปพลิเคชันของบุคคลที่สามที่เชื่อมโยงเหล่านี้ โปรดติดต่อพวกเขาโดยตรง
                            </p><p class="p-4 my-2 text-center">
                                ผู้ใช้เว็บไซต์ได้อ่านและตกลงในเงื่อนไขข้างต้น
                                ก่อนตัดสินใจคลิกลิงก์ใดๆ ในเว็บไซต์ Hormonal Quiz นี้
                            </p>
                        </div>
                    </div>

                    <div class="text-center">
                        <x-button class="btn btn-1"  wire:click="next" label="ต่อไป"/>
                    </div>
                </section>
                @break
            @case(4)
                <section class="h-screen grid gap-2 grid-rows-[1fr,100px] max-w-md">
                    <div class="bg-paper aspect-[1/1.424] py-12 px-4 max-w-md">

                        <div class="bubble">
                            <h2>เธอชื่ออะไร</h2>
                        </div>
                        <div class="bubble bubble-r">
                            <x-input wire:model="data.name" autofocus/>
                        </div>
                        <div class="bubble">
                            <h2>อายุเท่าไหร่</h2>
                        </div>
                        <div class="bubble bubble-r">
                            <x-input wire:model="data.age" pattern="[0-9]*" inputmode="numeric"  />
                        </div>
                        <div class="bubble bubble-l2">
                            <h2>โอเค ไม่ต้องกังวลนะ</h2>
                        </div>
                        <div class="bubble bubble-l3">
                            <h2>เรามาเช็คกันว่า <br>ที่เธอเป็นอยู่คืออะไร</h2>
                        </div>
                    </div>
                    <div class="text-center">
                        <x-button class="btn btn-1"  wire:click="quiz_0Submit" label="ต่อไป"/>
                    </div>
                </section>
                @break
            @case(5)
                <section class="h-screen grid gap-2 grid-rows-[1fr,100px] p-6 max-w-md w-full">
                    <div class="text-center text-2xl bg-0-2 relative">
                        <span class="flex flex-col justify-center absolute top-[38%] -translate-y-1/2 left-[22%] w-[70%] h-[43%]">
                            <img src="{{asset('images/soundcheck.png')}}" alt="" class="w-4/5 mx-auto">
                            <h2 class="text-7xl font-medium">สาวเช็ก</h2>
                            <h2>ภาวะเสี่ยงที่สาว ๆ ต้องรู้ !</h2>
                        </span>
                    </div>
                    <div class="text-center">
                        <x-button class="btn btn-1"  wire:click="next" label="ต่อไป"/>
                    </div>
                </section>
                @break
            @case(6)
                <section class="h-screen grid gap-2 grid-rows-[100px,1fr,100px]  p-6">

                    <h2 class="text-3xl text-center">
                        เธอรู้สึก<span class="font-medium">กังวล</span>เกี่ยวกับ <br>
                        เรื่องอะไร
                    </h2>
                    <ul>
                        <li><div class="radio btn-ans"><x-checkbox name="q_1_1" wire:model="data.quiz_1.a1" label="อารมณ์หรือร่างกายแปรปรวนเหมือนมนุษย์กลายร่าง"/></div></li>
                        <li><div class="radio btn-ans"><x-checkbox name="q_1_2" wire:model="data.quiz_1.a2" label="สิวขึ้นผลุบๆ โผล่ๆ เหมือนตัวตุ่น"/></div></li>
                        <li><div class="radio btn-ans"><x-checkbox name="q_1_3" wire:model="data.quiz_1.a3" label="ประจำเดือนที่มาๆ หายๆ เหมือนคนคุย"/></div></li>
                    </ul>
                    <div class="text-center">
                        <x-button class="btn btn-1" wire:click="quiz_1Submit" label="ต่อไป"/>
                    </div>
                </section>
                @break
            @case(7)
                <section class="h-screen grid gap-2 grid-rows-[100px,1fr,100px]  p-6">

                    <h2 class="text-3xl text-center">
                        อาการ<b>ผิดปกติ</b>ทางร่างกายที่เธอสังเกตได้
                    </h2>
                    <ul>
                        <li><div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.a1"  label="เป็นสิวผิวมัน"/></div></li>
                        <li><div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.a2"  label="น้ำหนักขึ้นตัวบวม"/></div></li>
                        <li><div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.a3"  label="ผมร่วง ผมบาง"/></div></li>
                        <li><div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.a4"  label="ไม่มีอาการข้างต้นที่กล่าวมา"/></div></li>
                    </ul>
            
                    <div class="text-center">
                        <x-button class="btn btn-1" wire:click="quiz_2Submit" label="ต่อไป"/>
                    </div>
                </section>
                
                @break
            
            @default
                
        @endswitch

    </div>

</div>
