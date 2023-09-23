<!-- Desktop sidebar -->
<aside
    class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-[#101825] md:block scrollbar-hide border-r border-gray-700">

    @livewire('courthouse.sidebar')

</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 md:bg-opacity-0 sm:items-center sm:justify-center"
    x-show="sideMenu" x-transition:enter-end="opacity-100" x-transition:enter-start="opacity-0"
    x-transition:enter="transition ease-in-out duration-150" x-transition:leave-end="opacity-0"
    x-transition:leave-start="opacity-100" x-transition:leave="transition ease-in-out duration-150">
</div>
<aside @click.away="sideMenu = false"
    class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-[#101825] md:hidden scrollbar-hide"
    x-show="sideMenu" x-transition:enter-end="opacity-100"
    x-transition:enter-start="opacity-0 transform -translate-x-20"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:leave-end="opacity-0 transform -translate-x-20" x-transition:leave-start="opacity-100"
    x-transition:leave="transition ease-in-out duration-150">

    @livewire('courthouse.sidebar')

</aside>

{{-- dark:bg-[#598392] --}}
