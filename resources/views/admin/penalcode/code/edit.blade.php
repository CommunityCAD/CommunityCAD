@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Penal Code</h1>
        <p class="text-sm text-white">Edit penal code.</p>
    </header>

    <div class="admin-card">

        <form action="{{ route('admin.penalcode.code.destroy', $code->id) }}" class="text-right" method="POST"
            onsubmit="return confirm('Are you sure you wish to delete this code? This can\'t be undone!');">
            @csrf
            @method('DELETE')
            <button class="delete-button-md">
                <x-delete-button></x-delete-button>
            </button>
        </form>

        <form action="{{ route('admin.penalcode.code.update', $code->id) }}" class="space-y-4" id="mdeditor" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-black-500" for="penal_code_title_id">Title</label>
                <select class="select-input" id="penal_code_title_id" name="penal_code_title_id">
                    <option value="">Choose Title</option>
                    @foreach ($titles as $title)
                        <option @selected(old('penal_code_title_id') == $title->id) @selected($code->penal_code_title_id == $title->id) value="{{ $title->id }}">Title
                            {{ $title->number }} -
                            {{ $title->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('penal_code_title_id')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="number">Number</label>
                <input autofocus class="text-input" name="number" required type="number"
                    value="{{ old('number', $code->number) }}" />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="name">Name</label>
                <input autofocus class="text-input" name="name" required type="text"
                    value="{{ old('name', $code->name) }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="section">Section</label>
                <div class="mt-1 block w-full rounded-md bg-white border-gray-300 shadow-sm" id="editor">
                </div>
                <input id="mdcontent" name="mdcontent" type="hidden" value="{{ old('mdcontent', $code->section) }}">
                <x-input-error :messages="$errors->get('mdcontent')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="notes">Notes</label>
                <textarea class="textarea-input" id="" name="notes">{{ old('notes', $code->notes) }}</textarea>
                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="penal_code_class_id">Classification</label>
                <p class="text-sm"></p>
                <select class="select-input" id="penal_code_class_id" name="penal_code_class_id">
                    <option value="">Choose Classification</option>
                    @foreach ($classes as $class)
                        <option @selected(old('penal_code_class_id') == $class->id) @selected($code->penal_code_class_id == $class->id) value="{{ $class->id }}">
                            {{ $class->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('penal_code_class_id')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="fine">Fine</label>
                <input autofocus class="text-input" name="fine" type="number" value="{{ old('fine', $code->fine) }}" />
                <x-input-error :messages="$errors->get('fine')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="bail">Bail</label>
                <input autofocus class="text-input" name="bail" type="number" value="{{ old('bail', $code->bail) }}" />
                <x-input-error :messages="$errors->get('bail')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="in_game_jail_time">In-game Jail Time (Seconds)</label>
                <input autofocus class="text-input" name="in_game_jail_time" type="number"
                    value="{{ old('in_game_jail_time', $code->in_game_jail_time) }}" />
                <x-input-error :messages="$errors->get('in_game_jail_time')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="cad_jail_time">CAD Jail Time (Minuets)</label>
                <input autofocus class="text-input" name="cad_jail_time" type="number"
                    value="{{ old('cad_jail_time', $code->cad_jail_time) }}" />
                <x-input-error :messages="$errors->get('cad_jail_time')" class="mt-2" />
            </div>

            <div class="mt-4 flex justify-between">
                <button class="edit-button-md">Save</button>
                <a class="delete-button-md" href="{{ route('admin.penalcode.code.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
