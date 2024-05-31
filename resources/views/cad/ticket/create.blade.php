@extends('layouts.cad_simple')

@section('content')
    <div class="">
        @livewire('cad.create-citation', ['civilian' => $civilian, 'calls' => $calls])
    </div>
@endsection
