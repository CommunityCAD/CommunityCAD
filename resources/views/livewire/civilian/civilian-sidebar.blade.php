<div>
    <div class="py-4 text-gray-200">
        <div class="ml-6 text-lg font-bold flex items-center">
            <img alt="Court Logo" class="w-12" src="{{ get_setting('community_logo') }}">
            <div class="ml-3">
                <p>Civilian Portal</p>
            </div>
        </div>
        <ul class="mt-6 text-sm font-medium text-slate-200">
            <li class="relative px-6 py-3">
                <a class="flex items-center @if (request()->is('portal/dashboard')) !text-base !text-purple-500 @endif"
                    href="{{ route('portal.dashboard') }}">
                    <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Member Portal</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a class="flex items-center @if (request()->is('civilian')) !text-base !text-purple-500 @endif"
                    href="{{ route('civilian.home') }}">
                    <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Civilian Portal</span>
                </a>
            </li>
            <li>
                <hr>
            </li>
            <li class="relative px-6 py-3">
                <a class="flex items-center @if (request()->is('civilian/civilians') || request()->is('civilian/civilians/*')) !text-base !text-purple-500 @endif"
                    href="{{ route('civilian.civilians.index') }}">
                    <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="ml-4">View Civilians</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                <a class="flex items-center" href="{{ route('courthouse.home') }}">
                    <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="ml-4">Courthouse</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                <a class="flex items-center" href="#">
                    <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="ml-4">View Tickets</span>
                </a>
            </li>

        </ul>
    </div>

</div>
