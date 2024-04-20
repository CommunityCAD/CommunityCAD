    <header class="z-10 shadow-md  bg-[#717377] uppercase">
        <div class="text-black text-center flex items-center justify-between max-w-7xl mx-auto">
            <p class="font-bold text-center">{{ auth()->user()->active_unit->user_department->department->name }}
                Public Safety System - {{ auth()->user()->active_unit->officer->name }}
            </p>

            <a class="flex items-centerhover:underline text-xl" href="{{ route('cad.offduty.create') }}">
                <p>Exit</p>
            </a>
        </div>
    </header>
    <header class="z-10 shadow-md bg-[#2e3547]  uppercase mb-3 border-b-2">
        <div class="">
            <div class="flex items-center justify-between max-w-7xl mx-auto h-10 ">
                <div class="flex items-center">
                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10 @if (request()->is('cad/home')) font-bold bg-[#131c23] @endif"
                        href="{{ route('cad.home') }}">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Home</p>
                    </a>

                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10 @if (request()->is('cad/mdt')) font-bold bg-[#131c23] @endif"
                        href="{{ route('cad.mdt') }}">
                        <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12 21L12 17" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    stroke="#ffffff"></path>
                                <rect height="13" rx="1" stroke-linecap="round" stroke-width="2"
                                    stroke="#ffffff" width="18" x="3" y="4"></rect>
                                <path d="M9 21H15" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    stroke="#ffffff"></path>
                            </g>
                        </svg>
                        <p>MDT</p>
                    </a>

                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10 @if (request()->is('cad/name') || request()->is('cad/name/*')) font-bold bg-[#131c23] @endif"
                        href="{{ route('cad.name.search') }}">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Names</p>
                    </a>

                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10 @if (request()->is('cad/vehicle') || request()->is('cad/vehicle/*')) font-bold bg-[#131c23] @endif"
                        href="{{ route('cad.vehicle.search') }}">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Vehicle</p>
                    </a>

                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10 @if (request()->is('cad/call') || request()->is('cad/call/*')) font-bold bg-[#131c23] @endif"
                        href="{{ route('cad.call.index') }}">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <p>Calls</p>
                    </a>

                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10 @if (request()->is('cad/message_center') || request()->is('cad/message_center/*')) font-bold bg-[#131c23] @endif"
                        href="{{ route('cad.message_center') }}">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <p>Messages</p>
                    </a>
                </div>
                <div class="flex items-center">
                    @livewire('cad.dispatch-status')
                </div>
            </div>
        </div>
        <div class="flex justify-between max-w-7xl mx-auto mt-2">
            <div class="flex items-center text-gray-300 space-x-4">
                {{-- <a class="hover:underline" href="#">Firearm Database</a> --}}
                {{-- <a class="hover:underline" href="#">BOLOS</a> --}}
                <a class="hover:underline" href="#"
                    onclick="openExternalWindow('{{ route('cad.penal_code') }}')">Penal Code</a>
                <a class="hover:underline" href="#"
                    onclick="openExternalWindow('{{ route('cad.ten_code.index') }}')">10
                    Codes</a>
                <a class="hover:underline @if (request()->is('cad/call/create')) font-bold underline text-white text-xl @endif"
                    href="{{ route('cad.call.create') }}">Create a call</a>
                <a class="hover:underline @if (request()->is('cad/report/create')) font-bold underline text-white text-xl @endif"
                    href="#" onclick="openExternalWindow('{{ route('cad.report.create') }}')">Create a
                    Report</a>
                <a class="hover:underline @if (request()->is('cad/bolo/create')) font-bold underline text-white text-xl @endif"
                    href="{{ route('cad.bolo.create') }}">Create a
                    Bolo</a>
            </div>
            <div class="text-red-600 flex items-baseline">
                <p class="text-xl" id="running_clock_time"></p>
                <p class="text-sm ml-4" id="running_clock_date"></p>
            </div>
        </div>
    </header>
