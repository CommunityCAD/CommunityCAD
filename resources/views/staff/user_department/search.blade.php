@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Member Departments</h1>
        <p class="text-sm text-white">Search for a member to edit.</p>
    </header>

    <div class="admin-card">
        <livewire:staff.search>
    </div>
@endsection
