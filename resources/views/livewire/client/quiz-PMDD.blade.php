<div>
    <div class="fixed left-1 top-1">
        <x-button label="back" wire:click="back()" />
        <x-button label="next" wire:click="next()" />
    </div>

    @switch($page)
        @case(1)
            <section class="h-screen grid p-6">
                <div class="p-4 bg-white rounded-lg">
                    มนุษย์กลายร่าง
                    (ทางอารมณ์)
                    ที่เธอไม่ได้สร้างเอง
                </div>
            </section>
        @break

        @case(2)
            <section class="h-screen grid p-6">
                <span class="text-center">อาการก่อนเป็นประจำเดือน</span>
                <h2 class="text-3xl text-center">
                    มนุษย์กลายร่างแบบไหน ก่อนเป็นประจำเดือน
                </h2>
                <span class="text-center text-red-700">(เลือกได้มากกว่า 1 ข้อ)</span>
                <ul>
                    <li>
                        <div class="radio btn-ans"><x-checkbox wire:model="data.quiz_1.1" value="1"
                                label="มนุษย์ถ้ำจำศีลที่อยากอยู่เงียบ ๆ คนเดียว " /></div>
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

                <div>
                    <x-button wire:click="quiz_1Submit" label="ต่อไป" />
                </div>
            </section>
        @break

        @case(3)
            <section class="h-screen grid p-6">
                <h2 class="text-3xl text-center">
                    นอกจากอารมณ์ที่แปรปรวนร่างกายเธอรวนบ้างไหม
                </h2>
                <span class="text-center text-red-700">(เลือกได้มากกว่า 1 ข้อ)</span>
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

                <div>
                    <x-button wire:click="quiz_2Submit" label="ต่อไป" />
                </div>
            </section>
        @break

        @case(4)
            <section class="h-screen grid p-6">

                <div class="p-4 bg-white rounded-lg">
                    <h2 class="text-3xl text-center">
                        แข็งแกร่ง<br>
                        เหมือนยอดมนุษย์<br>
                        ก็เธอนั่นแหละ
                    </h2>
                </div>
            </section>
        @break

        @case(5)
            <section class="h-screen grid p-6">
                <h2>
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
                <div>
                    <x-button wire:click="quiz_3Submit" label="ต่อไป" />
                </div>
            </section>
        @break

        @case(6)
            <section class="h-screen grid p-6">
                ไม่ต้องโทษตัวเองนะ
                เพราะทุกความรู้สึกที่เกิดขึ้นไม่ใช่ความผิดของเธอ
                แต่เป็นความผิดปกติของฮอร์โมน
            </section>
        @break

        @case(7)
            <section>
                หยุดกลายร่างได้
                แค่เข้าใจร่างกายเธอก่อน
            </section>
        @break

        @case(8)
            <div>
                <h2>
                    หยุดกลายร่างได้
                    แค่เข้าใจร่างกายเธอก่อน
                </h2>
            </div>
        @break

        @case(9)
            <div>
                <h2>
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

            </div>
        @break

        @case(10)
            <div>
                <h2>PMDD
                    กลุ่มอาการก่อนเป็นประจำเดือน</h2>
                <p>ทำควิซมาถึงตรงนี้เชื่อว่าทุกคนต้องเคยมีปัญหาอารมณ์เปลี่ยนแปลงช่วงก่อนเป็นประจำเดือนแน่ ๆ
                    ทั้งอารมณ์เศร้าที่ไม่มีสาเหตุ เหวี่ยงวีน หงุดหงิดง่าย จนทำให้ปัญหาเหล่านี้กวนใจในชีวิตประจำวันมากขึ้นเรื่อย
                    ๆ</p>

                <h3>สังเกตอาการ PMDD</h3>
                <ul>
                    <li>อารมณ์ที่เปลี่ยนแปลงง่ายโดยไม่ทราบสาเหตุทั้ง เศร้า หงุดหงิด และเหวี่ยงวีน</li>
                    <li>มีความกังวลและอ่อนไหวง่ายกว่าปกติ</li>
                    <li>มีอาการทางร่างกาย เช่น คัดตึงเต้านม น้ำหนักตัวเพิ่มขึ้น ปวดศีรษะ ปวดท้องน้อย</li>
                    <li>มีอาการก่อนเป็นประจำเดือนประมาณ 1-2 สัปดาห์</li>
                </ul>
                <h3>วิธีรับมือกับอาการ PMDD</h3>
                <ul>
                    <li>หากิจกรรมที่ผ่อนคลายทำ เพื่อลดความเครียด</li>
                    <li>ใช้ยาต้านเศร้า </li>
                    <li>รับประทานอาหารที่มีประโยชน์ และ พักผ่อนให้เพียงพอ </li>
                    <li>ปรึกษาเภสัชกรหรือแพทย์เพื่อหาแนวทางในการปรับเปลี่ยนด้วยฮอร์โมน เช่น EE20D หากเข้าเงื่อนไข</li>
                </ul>
            </div>
        @break

        @case(11)
            <div>result</div>
        @break

        @default
    @endswitch
</div>
