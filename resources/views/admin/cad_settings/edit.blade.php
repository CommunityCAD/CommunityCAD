@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit Setting {{ $cad_setting->name }}</h1>
        <p class="text-sm font-bold text-white">Please refer to docs for allowed values.</p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.cad_setting.update', $cad_setting->id) }}" method="POST">
            @csrf
            @method('PUT')

            <p class="block mt-3 text-black-500">{{ $cad_setting->name }}</p>

            @if ($cad_setting->type == 'textarea')
                <div>
                    <label for="value" class="block mt-3 text-black-500">Value</label>
                    <textarea type="text" name="value" class="textarea-input" autofocus>{{ $cad_setting->value }}</textarea>
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            @elseif ($cad_setting->type == 'bool')
                <div>
                    <label for="value" class="block mt-3 text-black-500">Value</label>
                    <select type="{{ $cad_setting->type }}" name="value" class="select-input" autofocus>
                        <option value="true" @selected($cad_setting->value == 'true')>True</option>
                        <option value="false" @selected($cad_setting->value == 'false')>False</option>
                    </select>
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            @else
                <div>
                    <label for="value" class="block mt-3 text-black-500">Value</label>
                    <input type="{{ $cad_setting->type }}" name="value" value="{{ $cad_setting->value }}"
                        class="text-input" autofocus />
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            @endif


            <div class="mt-4">
                <button class="w-1/3 mr-5 edit-button-md">Save</button>
                <a href="{{ route('admin.cad_setting.index') }}" class="w-1/3 delete-button-md">Cancel</a>
            </div>
        </form>
    </div>
@endsection
