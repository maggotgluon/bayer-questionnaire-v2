<div class="w-full bg-green-200 flex flex-col">
    
    <h2 class="text-2xl text-center py-4">Dashboard</h2>
    <x-button xl flat label="Overview" :href="route('adminIndex')"/>
    <x-button xl flat label="User" :href="route('adminClient')"/>
    <div class="text-center py-6">
        <x-button sm label="Download Report"/>
    </div>
    <x-button label="Logout" class="mt-auto"/>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
