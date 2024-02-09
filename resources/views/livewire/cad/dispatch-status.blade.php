<div class="flex" wire:poll.5s>
    @switch($has_active_dispatch)
        @case('AVL')
            <div class="flex items-center py-1 px-5 text-black font-bold bg-green-600 h-10">
                <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M6 10H6.75C7.44036 10 8 10.5596 8 11.25V14.75C8 15.4404 7.44036 16 6.75 16H6C4.34315 16 3 14.6569 3 13C3 11.3431 4.34315 10 6 10ZM6 10V9C6 5.68629 8.68629 3 12 3C15.3137 3 18 5.68629 18 9V10M18 10H17.25C16.5596 10 16 10.5596 16 11.25V14.75C16 15.4404 16.5596 16 17.25 16H18M18 10C19.6569 10 21 11.3431 21 13C21 14.6569 19.6569 16 18 16M18 16L17.3787 18.4851C17.1561 19.3754 16.3562 20 15.4384 20H13"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="#000000"></path>
                    </g>
                </svg>
                <p>Online</p>
            </div>
        @break

        @case('CALL')
            <div class="flex items-center py-1 px-5 text-black font-bold bg-yellow-600 h-10">
                <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M6 10H6.75C7.44036 10 8 10.5596 8 11.25V14.75C8 15.4404 7.44036 16 6.75 16H6C4.34315 16 3 14.6569 3 13C3 11.3431 4.34315 10 6 10ZM6 10V9C6 5.68629 8.68629 3 12 3C15.3137 3 18 5.68629 18 9V10M18 10H17.25C16.5596 10 16 10.5596 16 11.25V14.75C16 15.4404 16.5596 16 17.25 16H18M18 10C19.6569 10 21 11.3431 21 13C21 14.6569 19.6569 16 18 16M18 16L17.3787 18.4851C17.1561 19.3754 16.3562 20 15.4384 20H13"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="#000000"></path>
                    </g>
                </svg>
                <p>Online (On CALL)</p>
            </div>
        @break

        @case('BRK')
            <div class="flex items-center py-1 px-5 text-black font-bold bg-yellow-600 h-10">
                <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M6 10H6.75C7.44036 10 8 10.5596 8 11.25V14.75C8 15.4404 7.44036 16 6.75 16H6C4.34315 16 3 14.6569 3 13C3 11.3431 4.34315 10 6 10ZM6 10V9C6 5.68629 8.68629 3 12 3C15.3137 3 18 5.68629 18 9V10M18 10H17.25C16.5596 10 16 10.5596 16 11.25V14.75C16 15.4404 16.5596 16 17.25 16H18M18 10C19.6569 10 21 11.3431 21 13C21 14.6569 19.6569 16 18 16M18 16L17.3787 18.4851C17.1561 19.3754 16.3562 20 15.4384 20H13"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="#000000"></path>
                    </g>
                </svg>
                <p>Online (Break)</p>
            </div>
        @break

        @default
            <div class="flex items-center py-1 px-5 text-black font-bold bg-red-600 h-10">
                <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M4 4L20 20" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="#000000">
                        </path>
                        <path clip-rule="evenodd"
                            d="M5.75921 4.67342C4.66139 5.97782 4 7.66167 4 9.5V11V17C4 17.5523 4.44772 18 5 18H7C8.65685 18 10 16.6569 10 15V13C10 11.3431 8.65685 10 7 10H6V9.5C6 8.21416 6.44125 7.03137 7.1806 6.09481L5.75921 4.67342ZM14.8362 10.922C15.3821 10.3537 16.1498 10 17 10H18V9.5C18 6.46243 15.5376 4 12.5 4H11.5C10.4721 4 9.51006 4.28198 8.68701 4.7728L7.24039 3.32618C8.45025 2.48986 9.91792 2 11.5 2H12.5C16.6421 2 20 5.35786 20 9.5V11V16.0858L18 14.0858V12H17C16.702 12 16.4345 12.1303 16.2513 12.3371L14.8362 10.922ZM14.0012 12.9154C14.0004 12.9435 14 12.9717 14 13V15C14 16.6569 15.3431 18 17 18H17.6126L17.5072 18.3162C17.3711 18.7246 16.9889 19 16.5585 19H13C12.4477 19 12 19.4477 12 20C12 20.5523 12.4477 21 13 21H16.5585C17.8498 21 18.9962 20.1737 19.4045 18.9487L19.562 18.4762L17.0858 16H17C16.4477 16 16 15.5523 16 15V14.9142L14.0012 12.9154ZM6 16V12H7C7.55228 12 8 12.4477 8 13V15C8 15.5523 7.55228 16 7 16H6Z"
                            fill-rule="evenodd" fill="#000000"></path>
                    </g>
                </svg>
                <p>Offline</p>
            </div>
        @break
    @endswitch

    @if (auth()->user()->active_unit->status != 'OFFDTY' && auth()->user()->active_unit->department_type != 2)
        @if (auth()->user()->active_unit->is_panic)
            <a class="flex items-center py-1 px-5 text-black font-bold animate-pulse bg-red-600 hover:bg-red-700 h-10"
                href="{{ route('cad.stop_panic') }}">
                <svg class="w-6 h-6 mr-2" fill="#000000" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
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
                    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>alert</title>
                        <desc>Created with Sketch Beta.</desc>
                        <defs> </defs>
                        <g fill-rule="evenodd" fill="none" id="Page-1" sketch:type="MSPage" stroke-width="1"
                            stroke="none">
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
