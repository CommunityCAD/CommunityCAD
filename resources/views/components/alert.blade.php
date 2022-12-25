@if (session()->exists('alerts'))
    @foreach (session('alerts') as $alert)
        @php
            switch ($alert['level']) {
                case 'success':
                    $bg_color = 'bg-green-200';
                    $stroke_color = 'stroke-green-700';
                    $text_color = 'text-green-700';
                    break;

                case 'error':
                    $bg_color = 'bg-red-200';
                    $stroke_color = 'stroke-red-700';
                    $text_color = 'text-red-700';
                    break;

                case 'warning':
                    $bg_color = 'bg-amber-200';
                    $stroke_color = 'stroke-amber-700';
                    $text_color = 'text-amber-700';
                    break;

                default:
                    $bg_color = 'bg-blue-200';
                    $stroke_color = 'stroke-blue-700';
                    $text_color = 'text-blue-700';
                    break;
            }
        @endphp

        <div {{ $attributes->merge(['class' => "w-screen max-w-lg $bg_color mx-auto mt-6 p-2"]) }} role="alert"
            x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" x-transition:leave.duration.800ms>
            <div class="flex space-x-2 cursor-pointer" @click="show=false">
                <svg class="w-6 h-6 {{ $stroke_color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                    </path>
                </svg>
                <p class="font-semibold {{ $text_color }}">{!! $alert['message'] !!}</p>
            </div>
        </div>
    @endforeach
@endif
