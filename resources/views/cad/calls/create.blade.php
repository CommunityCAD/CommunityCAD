@extends('layouts.cad')

@section('content')
    <div class="flex flex-col uppercase">
        @include('inc.cad.header', ['active_unit' => auth()->user()->active_unit->civilian->name])
        <div class="p-4 mt-5 space-y-3 text-white rounded cursor-default">

            <livewire:cad.call-create-screen />

        </div>
    </div>
@endsection
