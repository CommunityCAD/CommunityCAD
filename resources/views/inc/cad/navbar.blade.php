<header class="z-10 shadow-md bg-[#124559]">
    <div class="uppercase">
        <div class="flex items-center justify-around space-x-5">
            <a class="py-3 px-5 text-white hover:bg-[#598392]" href="{{ route('cad.offduty.create') }}">

                <svg class="w-6 h-6 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <p>Exit</p>
            </a>
            <a class="py-3 px-5 text-white hover:bg-[#598392] @if (request()->is('cad/home')) bg-[#598392] @endif"
                href="{{ route('cad.home') }}">
                <svg class="w-6 h-6 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p>Home</p>
            </a>

            <a class="py-3 px-5 text-white hover:bg-[#598392] @if (request()->is(['cad/cad/*', 'cad/cad'])) bg-[#598392] @endif"
                href="{{ route('cad.cad') }}">
                <svg class="w-6 h-6 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p>CAD</p>
            </a>

            <a class="py-3 px-5 text-white hover:bg-[#598392] @if (request()->is('cad/call/*')) bg-[#598392] @endif"
                href="{{ route('cad.call.index') }}">
                <svg class="w-6 h-6 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p>Calls</p>
            </a>

            <a class="py-3 px-5 text-white hover:bg-[#598392] @if (request()->is('cad/name_search/*')) bg-[#598392] @endif"
                href="{{ route('cad.name.search') }}">
                <svg class="w-6 h-6 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p>Name Search</p>
            </a>

            <a class="py-3 px-5 text-white hover:bg-[#598392] @if (request()->is('cad/vehicle_search/*')) bg-[#598392] @endif"
                href="{{ route('cad.vehicle.search') }}">
                <svg class="w-6 h-6 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p>Vehicle Search</p>
            </a>

            <a class="py-3 px-5 text-white hover:bg-[#598392] @if (request()->is('cad/messages/*')) bg-[#598392] @endif"
                href="#">
                <svg class="w-6 h-6 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p>Messages</p>
            </a>
        </div>
    </div>
</header>
