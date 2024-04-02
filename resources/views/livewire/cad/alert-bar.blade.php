<div class="space-y-2" wire:poll.5s>
    @foreach ($active_alerts as $alert)
        @if ($alert['color'] == 'red')
            <div class="bg-red-600 text-white animate-pulse py-1 text-center text-lg">
                @if ($alert['link'] != null)
                    <a href="{{ route($alert['link']) }}">{{ $alert['message'] }}</a>
                @else
                    <p>{{ $alert['message'] }}</p>
                @endif

                @if ($alert['audio'] != null)
                    <audio autoplay id="panicButton" volume="1">
                        <source src="{{ secure_asset($alert['audio']) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                @endif
            </div>
        @elseif($alert['color'] == 'yellow')
            <div class="bg-yellow-600 text-white py-1 text-center text-lg">
                @if ($alert['link'] != null)
                    <a href="{{ route($alert['link']) }}">{{ $alert['message'] }}</a>
                @else
                    <p>{{ $alert['message'] }}</p>
                @endif

                @if ($alert['audio'] != null)
                    <audio autoplay id="panicButton" volume="1">
                        <source src="{{ secure_asset($alert['audio']) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                @endif
            </div>
        @elseif($alert['color'] == 'green')
            <div class="bg-green-600 text-white py-1 text-center text-lg">
                @if ($alert['link'] != null)
                    <a href="{{ $alert['link'] }}">{{ $alert['message'] }}</a>
                @else
                    <p>{{ $alert['message'] }}</p>
                @endif

                @if ($alert['audio'] != null)
                    <audio autoplay id="panicButton" volume="1">
                        <source src="{{ secure_asset($alert['audio']) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                @endif
            </div>
        @endif
    @endforeach
</div>
