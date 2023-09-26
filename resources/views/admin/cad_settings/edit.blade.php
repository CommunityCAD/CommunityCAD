@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit Setting {{ $cad_setting->name }}</h1>
        <p class="text-sm font-bold text-white">Please refer to docs for allowed values.</p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.cad_setting.update', $cad_setting->id) }}" id="mdeditor" method="POST">
            @csrf
            @method('PUT')

            <p class="block mt-3 text-black-500">{{ $cad_setting->name }}</p>

            @if ($cad_setting->type == 'textarea')
                <div>
                    <label class="block mt-3 text-black-500" for="value">Value</label>
                    <textarea autofocus class="textarea-input" name="value" type="text">{{ $cad_setting->value }}</textarea>
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            @elseif ($cad_setting->type == 'bool')
                <div>
                    <label class="block mt-3 text-black-500" for="value">Value</label>
                    <select autofocus class="select-input" name="value" type="{{ $cad_setting->type }}">
                        <option @selected($cad_setting->value == 'true') value="true">True</option>
                        <option @selected($cad_setting->value == 'false') value="false">False</option>
                    </select>
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            @elseif ($cad_setting->type == 'markdown')
                <div>
                    <label class="block mt-3 text-black-500" for="value">Value</label>
                    <div class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm" id="editor">
                    </div>
                    <input id="mdcontent" name="value" type="hidden" value="{{ $cad_setting->value }}">
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            @else
                <div>
                    <label class="block mt-3 text-black-500" for="value">Value</label>
                    <input autofocus class="text-input" name="value" type="{{ $cad_setting->type }}"
                        value="{{ $cad_setting->value }}" />
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            @endif

            <div class="mt-4">
                <button class="w-1/3 mr-5 edit-button-md">Save</button>
                <a class="w-1/3 delete-button-md" href="{{ route('admin.cad_setting.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
