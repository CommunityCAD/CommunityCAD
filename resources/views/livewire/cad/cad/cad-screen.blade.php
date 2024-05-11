<div wire:poll.5>
    <div class="max-w-7xl mx-auto">
        @include('inc.cad.call_table')
    </div>

    <div class="mt-12 max-w-7xl mx-auto">
        <div class="flex justify-around mb-3 space-x-3">
            @if (isset($online_dispatcher))
                @if ($online_dispatcher->id != auth()->user()->active_unit->id)
                    <p class="text-white text-xl font-semibold">There is already a dispatcher</p>
                @else
                    @if (auth()->user()->active_unit)
                        @if (auth()->user()->active_unit->status == 'OFFDTY')
                            <a class="new-button-md" href="#"
                                wire:click="on_duty({{ auth()->user()->active_unit->id }})">
                                {{ strtoupper(get_setting('on_duty_button_text', 'ON DUTY')) }}
                            </a>
                            <a class="delete-button-md" href="{{ route('cad.offduty.create') }}">
                                {{ strtoupper(get_setting('off_duty_button_text', 'OFF DUTY')) }}
                            </a>
                        @else
                            <a class="new-button-md" href="#"
                                wire:click="set_status({{ auth()->user()->active_unit->id }}, 'AVL')">
                                {{ strtoupper(get_setting('available_button_text', 'AVAILABLE')) }}
                            </a>
                            <a class="bg-yellow-600 hover:bg-yellow-500 button-md" href="#"
                                wire:click="set_status({{ auth()->user()->active_unit->id }}, 'CALL')">
                                {{ strtoupper(get_setting('break_button_text', '911 Call (Busy)')) }}
                            </a>
                            <a class="delete-button-md" href="#"
                                wire:click="set_status({{ auth()->user()->active_unit->id }}, 'BRK')">
                                {{ strtoupper(get_setting('break_button_text', 'BREAK')) }}
                            </a>
                            <a class="delete-button-md" href="{{ route('cad.offduty.create') }}">
                                {{ strtoupper(get_setting('off_duty_button_text', 'OFF DUTY')) }}
                            </a>
                        @endif
                    @endif
                @endif
            @else
                <a class="new-button-md" href="#" wire:click="on_duty({{ auth()->user()->active_unit->id }})">
                    {{ strtoupper(get_setting('on_duty_button_text', 'ON DUTY')) }}
                </a>
                <a class="delete-button-md" href="{{ route('cad.offduty.create') }}">
                    {{ strtoupper(get_setting('off_duty_button_text', 'OFF DUTY')) }}
                </a>
            @endif
        </div>
        @include('inc.cad.cad.active_units')
    </div>
</div>
