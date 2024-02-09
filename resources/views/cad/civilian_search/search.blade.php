@extends('layouts.cad')

@section('content')
    <div class="sticky top-0 z-50">
        @include('inc.cad.mdt-nav')
    </div>

    <div class="relative max-w-7xl mx-auto">
        @livewire('cad.civilian-search-screen')
    </div>
@endsection
