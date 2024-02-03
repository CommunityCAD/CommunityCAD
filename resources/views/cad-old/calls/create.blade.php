@extends('layouts.cad')

@section('content')
    <div class="flex flex-col uppercase">
        @include('inc.cad.header')
        <div class="p-4 mt-5 space-y-3 text-white rounded cursor-default">

            <livewire:cad.call-create-screen />

        </div>
    </div>
@endsection
