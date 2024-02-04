@extends('layouts.cad')

@section('content')
    <div>
        @include('inc.cad.mdt-nav')
    </div>

    <div wire:key='alert-bar'>
        @livewire('cad.alert-bar')
    </div>

    <div wire:key='mdt-screen'>
        @livewire('cad.mdt.mdt-screen')
    </div>
@endsection
