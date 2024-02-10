@extends('layouts.cad_simple')

@section('content')
    <div class="">
        <div class="max-w-3xl mx-auto">
            <a class="delete-button-md" href="#" onclick="window.close();">Exit Without Saving</a>
        </div>

        @livewire('cad.ticket', ['civilian' => $civilian, 'calls' => $calls])
    </div>
@endsection
