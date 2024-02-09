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

                    {{-- <a class="flex items-center py-3 px-5 text-white hover:bg-[#131c23] h-10" href="#">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <p>Messages</p>
                    </a> --}}
                </div>
                <div class="flex items-center">
                    @if (true)
                        <div class="flex items-center py-1 px-5 text-black font-bold bg-green-600 h-10">
                            <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M6 10H6.75C7.44036 10 8 10.5596 8 11.25V14.75C8 15.4404 7.44036 16 6.75 16H6C4.34315 16 3 14.6569 3 13C3 11.3431 4.34315 10 6 10ZM6 10V9C6 5.68629 8.68629 3 12 3C15.3137 3 18 5.68629 18 9V10M18 10H17.25C16.5596 10 16 10.5596 16 11.25V14.75C16 15.4404 16.5596 16 17.25 16H18M18 10C19.6569 10 21 11.3431 21 13C21 14.6569 19.6569 16 18 16M18 16L17.3787 18.4851C17.1561 19.3754 16.3562 20 15.4384 20H13"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        stroke="#000000"></path>
                                </g>
                            </svg>
                            <p>Online</p>
                        </div>
                    @else
                        <div class="flex items-center py-1 px-5 text-black font-bold bg-red-600 h-10">
                            <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M4 4L20 20" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        stroke="#000000"></path>
                                    <path clip-rule="evenodd"
                                        d="M5.75921 4.67342C4.66139 5.97782 4 7.66167 4 9.5V11V17C4 17.5523 4.44772 18 5 18H7C8.65685 18 10 16.6569 10 15V13C10 11.3431 8.65685 10 7 10H6V9.5C6 8.21416 6.44125 7.03137 7.1806 6.09481L5.75921 4.67342ZM14.8362 10.922C15.3821 10.3537 16.1498 10 17 10H18V9.5C18 6.46243 15.5376 4 12.5 4H11.5C10.4721 4 9.51006 4.28198 8.68701 4.7728L7.24039 3.32618C8.45025 2.48986 9.91792 2 11.5 2H12.5C16.6421 2 20 5.35786 20 9.5V11V16.0858L18 14.0858V12H17C16.702 12 16.4345 12.1303 16.2513 12.3371L14.8362 10.922ZM14.0012 12.9154C14.0004 12.9435 14 12.9717 14 13V15C14 16.6569 15.3431 18 17 18H17.6126L17.5072 18.3162C17.3711 18.7246 16.9889 19 16.5585 19H13C12.4477 19 12 19.4477 12 20C12 20.5523 12.4477 21 13 21H16.5585C17.8498 21 18.9962 20.1737 19.4045 18.9487L19.562 18.4762L17.0858 16H17C16.4477 16 16 15.5523 16 15V14.9142L14.0012 12.9154ZM6 16V12H7C7.55228 12 8 12.4477 8 13V15C8 15.5523 7.55228 16 7 16H6Z"
                                        fill-rule="evenodd" fill="#000000"></path>
                                </g>
                            </svg>
                            <p>Offline</p>
                        </div>
                    @endif

                    @if (auth()->user()->active_unit->status != 'OFFDTY')
                        @if (auth()->user()->active_unit->is_panic)
                            <a class="flex items-center py-1 px-5 text-black font-bold animate-pulse bg-red-600 hover:bg-red-700 h-10"
                                href="{{ route('cad.stop_panic') }}">
                                <svg class="w-6 h-6 mr-2" fill="#000000" viewBox="0 0 30 30"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M13.5 27c-.276.004-.504.224-.5.5v.5c0 1.1.9 2 2 2s2-.9 2-2v-.5c0-.333-.25-.5-.5-.5s-.5.162-.5.5v.5c0 .563-.437 1-1 1s-1-.437-1-1v-.5c.004-.282-.218-.504-.5-.5zM15 0c-1.65 0-3 1.35-3 3v.5c0 .65 1 .66 1 0V3c0-1.11.89-2 2-2 1.11 0 2 .89 2 2v.5c0 .654 1 .66 1 0V3c0-1.65-1.35-3-3-3zm7.5 3C25.534 3 28 5.468 28 8.5c0 .665-1 .665-1 0C27 6.01 24.994 4 22.5 4c-.667 0-.663-1 0-1zm-15 0C4.468 3 2 5.468 2 8.5c0 .665 1 .665 1 0C3 6.01 5.01 4 7.5 4c.668 0 .665-1 0-1zM15 5c-4.32 0-6.688 1.81-7.838 4.102C6.012 11.394 6 14.096 6 16c0 2 0 5.817-2.88 9.174A.5.5 0 0 0 3.5 26h23a.5.5 0 0 0 .38-.826C24 21.817 24 18 24 16c0-1.904-.013-4.606-1.162-6.898C21.688 6.81 19.32 5 15 5zm0 1c4.054 0 5.937 1.543 6.943 3.55C22.95 11.56 23 14.108 23 16c0 1.852.107 5.567 2.586 9H4.414C6.894 21.567 7 17.852 7 16c0-1.893.05-4.44 1.057-6.45C9.063 7.544 10.947 6 15 6z">
                                        </path>
                                    </g>
                                </svg>
                                <p>Stop <br> Panic</p>
                            </a>
                        @else
                            <a class="flex items-center py-1 px-5 text-black bg-red-600 hover:bg-red-700 h-10"
                                href="{{ route('cad.panic') }}">
                                <svg class="w-5 h-5 mr-2" fill="#000000" version="1.1" viewBox="-1 0 30 30"
                                    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>alert</title>
                                        <desc>Created with Sketch Beta.</desc>
                                        <defs> </defs>
                                        <g fill-rule="evenodd" fill="none" id="Page-1" sketch:type="MSPage"
                                            stroke-width="1" stroke="none">
                                            <g fill="#000000" id="Icon-Set" sketch:type="MSLayerGroup"
                                                transform="translate(-362.000000, -880.000000)">
                                                <path
                                                    d="M365,904 L368,898 L368,890 C368,885.582 371.582,882 376,882 C380.418,882 384,885.582 384,890 L384,898 L387,904 L365,904 L365,904 Z M376,908 C374.695,908 373.597,907.163 373.184,906 L378.816,906 C378.403,907.163 377.305,908 376,908 L376,908 Z M386,898 L386,890 C386,884.478 381.522,880 376,880 C370.478,880 366,884.478 366,890 L366,898 L362,906 L371.101,906 C371.564,908.282 373.581,910 376,910 C378.419,910 380.436,908.282 380.899,906 L390,906 L386,898 L386,898 Z"
                                                    id="alert" sketch:type="MSShapeGroup"> </path>
                                            </g>
                                        </g>
                                    </g>
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
                {{-- <a class="hover:underline" href="#">Firearm Database</a> --}}
                {{-- <a class="hover:underline" href="#">BOLOS</a> --}}
                <a class="hover:underline" href="#"
                    onclick="openExternalWindow('{{ route('cad.penal_code') }}')">Penal Code</a>
                {{-- <a class="hover:underline" href="#">10 Codes</a> --}}
                {{-- <a class="hover:underline" href="#">Stolen Vehicles</a> --}}
                <a class="hover:underline @if (request()->is('cad/call/create')) font-bold underline text-white text-xl @endif"
                    href="{{ route('cad.call.create') }}">Create a call</a>
                <a class="hover:underline @if (request()->is('cad/call/create')) font-bold underline text-white text-xl @endif"
                    href="#" onclick="openExternalWindow('{{ route('cad.report.create') }}')">Create a
                    Report</a>

            </div>
            <div class="text-red-600 flex items-baseline">
                <p class="text-xl" id="running_clock_time"></p>
                <p class="text-sm ml-4" id="running_clock_date"></p>
            </div>
        </div>
    </header>
