@extends('layouts.cad')

@section('content')
    <div class="sticky top-0 z-50">
        @include('inc.cad.mdt-nav')
    </div>

    <div class="relative">
        @livewire('cad.call-create-screen')
    </div>
@endsection
