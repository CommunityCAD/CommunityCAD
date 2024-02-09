@extends('layouts.cad')

@section('content')
    <div>
        @include('inc.cad.mdt-nav')
    </div>

    <div wire:key='alert-bar'>
        @livewire('cad.alert-bar')
    </div>

    <div wire:key='mdt-screen'>
        @if (auth()->user()->active_unit->department_type == 1)
            @livewire('cad.mdt.mdt-screen')
        @elseif(auth()->user()->active_unit->department_type == 2)
            @livewire('cad.cad.cad-screen')
        @elseif(auth()->user()->active_unit->department_type == 4)
            @livewire('cad.mdt.mdt-screen')
        @endif
    </div>
@endsection
