    <header class="z-10 shadow-md  bg-[#595b61] uppercase">
        <div class="text-black text-center flex items-center justify-between max-w-7xl mx-auto">
            <p class="font-bold text-center">{{ auth()->user()->active_unit->user_department->department->name }}
                Public Safety System
            </p>

            <p class="font-bold text-center text-xl"></p>

            <a class="flex items-centerhover:underline text-xl" href="#">
                <p>Exit</p>
            </a>
        </div>
    </header>
    <header class="z-10 shadow-md bg-[#2e3547]  uppercase mb-3 border-b-2">
        <div class="">
            <div class="flex items-center justify-between max-w-7xl mx-auto h-10 ">
                <div class="flex items-center">
                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10 @if (request()->is('cad/mdt/home')) font-bold bg-[#131c23] @endif"
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
                        <svg class="w-6 h-6 mr-2" fill="#ffffff" id="Layer_1" stroke="#ffffff" version="1.1"
                            viewBox="0 0 508.053 508.053" width="200px" xml:space="preserve"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M475.897,76.703l-62.1-64.6c-4.5-4.6-11.5-5.7-17.1-2.5c-54.4,30.8-123.5-1.5-135.1-7.4c-3.7-2.4-8.5-2.9-12.7-1.2 c-0.9,0.3-1.7,0.8-2.5,1.3c-12,6.1-80.8,38-135,7.4c-5.6-3.2-12.6-2.1-17.1,2.5l-62.2,64.5c-3.3,3.5-4.7,8.4-3.6,13.1 c0.3,1.2,28.4,120.5,10.3,181.6c-0.1,0.3-0.2,0.6-0.2,0.9c-1.5,6.2-31.6,153.7,210.8,235c3.1,1,6.2,1,9.1,0 c242.5-81.3,212.4-228.8,211-235c-0.1-0.3-0.2-0.6-0.2-0.9c-18.1-61.1,10-180.4,10.3-181.6 C480.597,85.103,479.297,80.103,475.897,76.703z M441.997,278.803c1.3,7.2,20.5,128.6-188,200.2 c-208.8-71.8-189.7-191.5-188-200.2c17.3-59.6-2.2-159.6-8.3-188l49.6-51.6c58.7,26.5,125,0.7,146.7-9.3 c21.7,10,88,35.8,146.7,9.3l49.6,51.6C444.097,119.203,424.697,219.203,441.997,278.803z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M390.197,187.003l-93.6-0.3l-29.2-88.9c-4.3-12.9-22.6-12.9-26.8,0l-29.2,88.9l-93.6,0.3c-13.6,0-19.3,17.5-8.3,25.5 l75.6,55.3l-28.7,89.1c-4.2,13,10.6,23.7,21.7,15.8l75.9-54.8l75.9,54.8c11,8,25.9-2.8,21.7-15.8l-28.7-89.1l75.6-55.3 C409.497,204.503,403.797,187.103,390.197,187.003z M297.997,251.003c-4.9,3.6-7,9.9-5.1,15.7l18.6,57.9l-49.2-35.6 c-4.9-3.6-11.6-3.6-16.5,0l-49.3,35.6l18.6-57.9c1.9-5.8-0.2-12.1-5.1-15.7l-49.1-35.9l60.8-0.2c6.1,0,11.5-3.9,13.4-9.7l19-57.8 l19,57.8c1.9,5.8,7.3,9.7,13.4,9.7l60.8,0.2L297.997,251.003z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <p>MDT</p>
                    </a>

                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10" href="#">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Names</p>
                    </a>

                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10" href="#">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Vehicle</p>
                    </a>

                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10" href="#">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <p>Calls</p>
                    </a>

                    <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10" href="#">
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
                    @if (auth()->user()->active_unit->status != 'OFFDTY')
                        @if (auth()->user()->active_unit->is_panic)
                            <a class="flex items-center py-1 px-5 text-black font-bold animate-pulse bg-red-600 hover:bg-red-700 h-10"
                                href="{{ route('cad.stop_panic') }}">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p>Stop <br> Panic</p>
                            </a>
                        @else
                            <a class="flex items-center py-1 px-5 text-black bg-red-600 hover:bg-red-700 h-10"
                                href="{{ route('cad.panic') }}">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p>Panic</p>
                            </a>
                        @endif

                    @endif
                </div>
            </div>
        </div>
        <div class="flex justify-between max-w-7xl mx-auto mt-2">
            <div class="flex items-center text-gray-300 space-x-4">
                <a class="hover:underline" href="#">Firearm Database</a>
                <a class="hover:underline" href="#">Notes</a>
                <a class="hover:underline" href="#">BOLO +</a>
                <a class="hover:underline" href="#">BOLOS</a>
                <a class="hover:underline" href="#">Penal Code</a>
                <a class="hover:underline" href="#">10 Codes</a>
                <a class="hover:underline" href="#">Stolen Vehicles</a>
                <a class="hover:underline" href="#">Chat</a>
                <a class="hover:underline @if (request()->is('cad/call/create')) font-bold underline text-white text-xl @endif"
                    href="{{ route('cad.call.create') }}">Create a call</a>
                <a class="hover:underline" href="#">Supervisor</a>

            </div>
            <div class="text-red-600 flex items-baseline">
                <p class="text-xl" id="running_clock_time"></p>
                <p class="text-sm ml-4" id="running_clock_date"></p>
            </div>
        </div>
    </header>
