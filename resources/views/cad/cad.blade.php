@extends('layouts.cad')

@section('content')
    <div class="flex flex-col">
        @include('inc.cad.header')
        @if ($active_unit)
            @if ($active_unit->department_type == 1)
                @livewire('cad.mdt-cad-screen')
            @elseif ($active_unit->department_type == 2)
                @livewire('cad.dispatch-cad-screen')
            @else
                hahaha
            @endif
        @endif
    </div>
@endsection
