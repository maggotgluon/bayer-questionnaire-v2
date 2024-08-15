<div>
    <div class="fixed left-1 top-1">
        <x-button label="back" wire:click="back()" />
        <x-button label="next" wire:click="next()" />
    </div>
    @switch($page)
        @case(1)
            <section class="h-screen grid p-6">
                <h2 class="text-3xl text-center">
                    ประจำเดือนมา ๆ หาย ๆ
                    เดาใจยากเหมือนคนคุย
                </h2>


                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
        @break

        @case(2)
            <section class="h-screen grid p-6">
                <h2 class="text-3xl text-center">
                    ประจำเดือนของเธอ
                    เป็นแบบไหน
                </h2>
                <ul>
                    <li>
                        <div class="radio btn-ans"><x-radio id="q-1-1" wire:model="data.quiz_1" value="1" label="ประจำเดือนไม่มานานกว่า 35 วัน" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-radio id="q-1-2" wire:model="data.quiz_1" value="2" label="ประจำเดือนยังไม่มา นานเกิน 90 วัน แต่เคยมาปกติ" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-radio id="q-1-3" wire:model="data.quiz_1" value="3" label="ประจำเดือนมาปกติ รอบเดือนอยู่ที่ 21-35 วัน" /></div>
                    </li>
                </ul>

                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
        @break

        @case(3)
            <section class="h-screen grid p-6">
                <h2 class="text-3xl text-center">
                    นอกจากประจำเดือนขาด เธอมีอาการอื่นร่วมไหม
                </h2>
                <span>ตอบได้มากกว่า 1 ข้อนะ</span>
                <ul>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.1" label="สิวเห่อ สิวผลุบๆ โผล่ๆ เหมือนตัวตุ่น" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.2" label="หน้ามัน เหมือนหนังปลาทู" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.3" label="ขนดก เหมือนผู้ชายมาดแมน" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.4" label="ผมร่วง เหมือนใบไม้แห้ง" /></div>
                    </li>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_2.5" label="ไม่มีอาการใด ๆ โชคดีเหมือนถูกหวย" /></div>
                    </li>
                </ul>
                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
        @break

        @case(4)
            <section class="h-screen grid p-6">
                เป็นผู้หญิง
                แต่ร่างกายเหมือนชาย
                (ทั้งผิวมัน ขนดก ผมร่วง)
                แก้ปัญหาอย่างไรดี ?
                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
        @break

        @case(5)
            <section class="h-screen grid p-6">
                หยุดปัญหา
                ฮอร์โมนเพศชายสูง
                บอกลาจากต้นตอ
                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
        @break

        @case(6)
            <section class="h-screen grid p-6">
                <h2 class="text-3xl text-center">
                    รู้จัก “อาการฮอร์โมน เพศชายสูงในผู้หญิง” ไหม
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
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
        @break

        @case(7)
            <section class="h-screen grid p-6">

                <h2 class="text-3xl text-center">
                    ฮอร์โมนเพศชายสูง
                </h2>
                <p>อาการฮอร์โมนเพศชายสูง นอกจากจะทำให้ประจำเดือนมาขาด ๆ หาย ๆ แล้ว ยังทำให้ผู้หญิงมีลักษณะเหมือนผู้ชาย
                    จนหลายคนหมดความมั่นใจกันสุด ๆ</p>
                สังเกตฮอร์โมนเพศชายสูง
                <ul>
                    <li>ประจำเดือนมาไม่ปกติ หรือมีรอบเดือนนานกว่า 35 วัน</li>
                    <li>มีภาวะอ้วน น้ำหนักเกิน อ้วนลงพุง</li>
                    <li>ผมร่วง ผมบางบริเวณกลางศีรษะ</li>
                    <li>ขนดก มีหนวดเครา</li>
                    <li>หน้ามัน เป็นสิวซ้ำๆ ที่เดิม</li>
                </ul>
                วิธีรับมือกับฮอร์โมนเพศชายสูง
                <ul>
                    <li>ควบคุมน้ำหนัก และออกกำลังกาย</li>
                    <li>ปรับการกินให้ตรงตามหลักโภชนาการ</li>
                    <li>สังเกตความเปลี่ยนแปลงของร่างกายตัวเองอย่างสม่ำเสมอ </li>
                    <li>ปรึกษาเภสัชกรหรือแพทย์เพื่อหาแนวทางในการปรับเปลี่ยนด้วยฮอร์โมน เช่น EE35C หากเข้าเงื่อนไข</li>
                </ul>
                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
        @break

        @case(8)
            <div>result</div>
        @break

        @default
    @endswitch

</div>
