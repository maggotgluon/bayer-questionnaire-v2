<div>
    <div class="fixed left-1 top-1">
        <x-button label="back" wire:click="back()"/>
        <x-button label="next" wire:click="next()"/>
    </div>
    @switch($page)
        @case(1)
            <section>
                สิวผลุบ ๆ โผล่ ๆ 
                เหมือนตัวตุ่นทีไร
        
                ว้าวุ่นใจทุกที
                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
            
            @break
        @case(2)
            <section>
                <h2>
                    สิวเกิดขึ้นในช่วงก่อนมีประจำเดือน 
                    1 สัปดาห์ ใช่หรือไม่
                </h2>
                <span>(เลือกได้มากกว่า 1 ข้อ)</span>
                <ul>
                    <li><div class="radio btn-ans"><x-radio id="q-3-1" wire:model="data.quiz_3" value="1" label="ใช่"/></div></li>
                    <li><div class="radio btn-ans"><x-radio id="q-3-2" wire:model="data.quiz_3" value="0" label="ไม่ใช่"/></div></li>
                </ul>
                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
            @break
        @case(3)
            <section>
                <h2>
                    สิวประเภทไหนที่ขึ้นบนใบหน้าก่อนมีประจำเดือน 
                </h2>
                <span>(เลือกได้มากกว่า 1 ข้อ)</span>
                <ul>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-1" value="1" label="สิวอุดตันหัวดำ"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-2" value="1" label="สิวอุดตันหัวขาว"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-3" value="1" label="สิวตุ่มหนอง"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-4" value="1" label="สิวหัวช้าง"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-5" value="1" label="สิวผด"/></div></li>
                </ul>
                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
            
            @break
        @case(4)
            <section>
                <h2>
                    นอกจากสิวที่เธอเป็น เธอมีอาการอื่นอีกไหม
                </h2>
                <span>(เลือกได้มากกว่า 1 ข้อ)</span>
                <ul>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-6" value="1" label="ประจำเดือนมา ๆ หาย ๆ เดาใจยากเหมือนคนคุย"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-7" value="1" label="หน้ามัน เหมือนหนังปลาทู"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-8" value="1" label="ขนดก เหมือนผู้ชายมาดแมน"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-9" value="1" label="ผมร่วงเหมือนใบไม้แห้ง"/></div></li>
                    <li><div class="radio btn-ans"><x-checkbox lg id="q-0" value="1" label="ไม่มีอาการใดๆ โชคดีเหมือนถูกหวย"/></div></li>
                </ul>
                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </section>
            
            @break
        @case(5)
            หยุดสิวผลุบ ๆ โผล่ ๆ 
            เหมือนตัวตุ่น
            ก่อนเป็นประจำเดือน
            <div class="text-center">
                <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                    label="ต่อไป" />
            </div>
            @break
        @case(6)
            <div>
                <h2>
                    รู้จัก ‘สิวฮอร์โมน’ ไหม
                </h2>
                
                <ul>
                    <li><div class="radio btn-ans"><x-radio id="q-4-1" wire:model="data.quiz_4" value="1" label="รู้จัก"/></div></li>
                    <li><div class="radio btn-ans"><x-radio id="q-4-2" wire:model="data.quiz_4" value="0" label="ไม่แน่ใจ"/></div></li>
                    <li><div class="radio btn-ans"><x-radio id="q-4-3" wire:model="data.quiz_4" value="-1" label="ไม่รู้จัก"/></div></li>
                </ul>
                <div class="text-center">
                    <x-button class="bg-yellow-400 border-black border-2 rounded-full w-1/2 m-auto" wire:click="next"
                        label="ต่อไป" />
                </div>
            </div>
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
