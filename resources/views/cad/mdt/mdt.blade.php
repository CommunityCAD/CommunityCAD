@extends('layouts.cad')

@section('content')
    <div>
        @include('inc.cad.mdt-nav')
    </div>

    <div>
        @livewire('cad.alert-bar')
    </div>

    <div>
        @livewire('cad.mdt.mdt-screen')
    </div>
@endsection
