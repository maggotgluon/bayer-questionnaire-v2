<div class="w-full relative
    bg-gradient-to-t from-indigo-900 to-emerald-600">
    <div class="md:fixed flex gap-2 items-center md:flex-col z-50 w-full md:w-[250px] md:h-full
    bg-gradient-to-t md:bg-transparent from-indigo-900 to-emerald-600">
        <h2 class="text-2xl text-center py-4">Dashboard</h2>
        <x-button xl white label="Overview" :href="route('adminIndex')" 
            flat="{{ url()->current() == route('adminIndex')?0:1 }}" />
        <x-button xl white label="User" :href="route('adminClient')"
            flat="{{ url()->current() == route('adminClient')?0:1 }}" />
        {{-- <div class="text-center py-6">
            <x-button sm label="Download Report"/>
        </div> --}}
        <x-button label="Logout" class="ml-auto md:mt-auto md:ml-auto md:w-full"/>
        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    </div>
</div>
