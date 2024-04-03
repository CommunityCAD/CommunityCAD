<div>
    <div class="py-4 text-gray-200">
        <div class="ml-6 text-lg font-bold flex items-center">
            <img alt="Court Logo" class="w-12" src="{{ get_setting('community_logo') }}">
            <div class="ml-3">
                {{-- <p>{{ get_setting('community_name') }}</p> --}}
                <p>Cad Settings</p>
            </div>
        </div>
        <ul class="mt-6 text-sm font-medium text-slate-200">
            @can('admin_access')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin') or request()->is('admin/*')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.index') }}">
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            <span class="ml-4">Back to Admin</span>
                        </span>
                    </a>
                </li>
            @endcan
            <hr>
            <li class="relative px-6 py-3 text-xl">
                General
            </li>
            <li class="ml-4 relative px-6 py-3">
                <a class="flex items-center @if (request()->is('admin/settings/general/*') || request()->is('admin/settings/general')) text-lg text-purple-500 @endif"
                    href="{{ route('admin.settings.general') }}">
                    <span class="ml-4">General Settings</span>
                </a>
            </li>

            <li class="ml-4 relative px-6 py-3">
                <a class="flex items-center @if (request()->is('admin/settings/roleplay/*') || request()->is('admin/settings/roleplay')) text-lg text-purple-500 @endif"
                    href="{{ route('admin.settings.roleplay') }}">
                    <span class="ml-4">Roleplay Settings</span>
                </a>
            </li>
            <li class="ml-4 relative px-6 py-3">
                <a class="flex items-center @if (request()->is('admin/settings/application/*') || request()->is('admin/settings/application')) text-lg text-purple-500 @endif"
                    href="{{ route('admin.settings.application') }}">
                    <span class="ml-4">Application Settings</span>
                </a>
            </li>
            <li class="relative px-6 py-3 text-xl">
                API and Integration
            </li>
            <li class="ml-4 relative px-6 py-3">
                <a class="flex items-center @if (request()->is('admin/settings/discord/*') || request()->is('admin/settings/discord')) text-lg text-purple-500 @endif"
                    href="{{ route('admin.settings.discord') }}">
                    <span class="ml-4">Discord Integration</span>
                </a>
            </li>
            @if (in_array(auth()->user()->id, config('cad.owner_ids')))
                <li class="ml-4 relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/settings/api_key/*') || request()->is('admin/settings/api_key')) text-lg text-purple-500 @endif"
                        href="{{ route('admin.settings.api_key') }}">
                        <span class="ml-4">API Key</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>

</div>
