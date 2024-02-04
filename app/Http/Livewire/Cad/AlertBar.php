<?php

namespace App\Http\Livewire\Cad;

use App\Models\Cad\ActiveUnit;
use App\Models\Call;
use Carbon\Carbon;
use Livewire\Component;

class AlertBar extends Component
{
    public $active_alerts = [];

    public function render()
    {
        $this->active_alerts = [];
        if (auth()->user()->active_unit->is_panic) {
            $this->active_alerts['is_panic'] = [
                'color' => 'red',
                'message' => 'You have activated your panic button',
                'link' => null,
                'audio' => "audio/panic_button.mp3",
            ];
        }

        $active_panic_button = ActiveUnit::where('is_panic', '1')->with('user_department')->get();

        if ($active_panic_button->count() != 0) {
            if (!auth()->user()->active_unit->is_panic) {
                foreach ($active_panic_button as $active_unit) {
                    $this->active_alerts['is_panic'] = [
                        'color' => 'red',
                        'message' => 'Unit (' . $active_unit->user_department->badge_number . ') has activated their panic button',
                        'link' => null,
                        'model' => null,
                        'audio' => "audio/panic_button.mp3",
                    ];
                }
            }
        }

        $new_calls = Call::where('created_at', '>', Carbon::now()->subSeconds(15))->get();

        if ($new_calls->count() != 0) {
            foreach ($new_calls as $call) {
                $this->active_alerts['new_call' . $call->id] = [
                    'color' => 'green',
                    'message' => 'A new call has been created',
                    'link' => null,
                    'model' => null,
                    'audio' => "audio/newcall.mp3",
                ];
            }
        }


        return view('livewire.cad.alert-bar');
    }
}
