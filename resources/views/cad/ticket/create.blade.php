@extends('layouts.cad_reports')

@section('content')
    <div class="">
        <div class="max-w-3xl mx-auto">
            <a class="delete-button-md" href="#" onclick="window.close();">Exit Without Saving</a>
        </div>
        <div class="bg-yellow-100 max-w-3xl rounded-lg mx-auto p-4 mt-5">
            <form action="{{ route('cad.ticket.store', $civilian->id) }}" id="mdeditor" method="POST">
                @csrf

                <div class="border-2 border-black w-full">
                    <div class="flex">
                        <div class="border-2 border-black w-full p-2">
                            <p class="text-gray-500">Type
                                <select class="block text-black p-3 w-full font-bold uppercase" id=""
                                    name="">
                                    <option value="">Warning</option>
                                    <option value="">Ticket</option>
                                    <option value="">Arrest</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="border-2 border-black w-4/6 p-2">
                            <p class="text-gray-500">Last Name (Defendant) <span
                                    class="block text-black font-bold uppercase">{{ $civilian->last_name }}</span></p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">First Name <span
                                    class="block text-black font-bold uppercase">{{ $civilian->first_name }}</span></p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="border-2 border-black w-5/6 p-2">
                            <p class="text-gray-500">Address <span
                                    class="block text-black font-bold uppercase">{{ $civilian->address }}</span></p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Showed ID <span class="block text-black font-bold uppercase">
                                    <input class="mx-auto text-center w-full h-6" type="checkbox">
                                </span></p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="border-2 border-black w-3/6 p-2">
                            <p class="text-gray-500">SSN <span
                                    class="block text-black font-bold uppercase">{{ $civilian->s_n_n }}</span></p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Sex <span
                                    class="block text-black font-bold uppercase">{{ $civilian->gender }}</span></p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Race <span
                                    class="block text-black font-bold uppercase">{{ $civilian->race }}</span></p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="border-2 border-black w-full p-2">
                            <p class="text-gray-500">License Search
                            <div class="flex">
                                <input class="block text-black p-3 w-full font-bold uppercase" type="number">
                                <button class="edit-button-md ml-2">Find</button>
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">License No. <span
                                    class="block text-black font-bold uppercase">123456</span></p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Expires <span
                                    class="block text-black font-bold uppercase">7/25/2023</span></p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Type <span class="block text-black font-bold uppercase">Drivers
                                    Licenes</span></p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Suspend <span class="block text-black font-bold uppercase">
                                    <input class="mx-auto text-center w-full h-6" type="checkbox">
                                </span></p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="border-2 border-black w-full p-2">
                            <p class="text-gray-500">Vehicle Search
                            <div class="flex">
                                <input class="block text-black p-3 w-full font-bold uppercase" type="number">
                                <button class="edit-button-md ml-2">Find</button>
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Plate <span class="block text-black font-bold uppercase">ABC123</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Make <span class="block text-black font-bold uppercase">FORD</span></p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Color <span class="block text-black font-bold uppercase">Green</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Expire <span
                                    class="block text-black font-bold uppercase">7/25/2023</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Impound <span class="block text-black font-bold uppercase">
                                    <input class="mx-auto text-center w-full h-6" type="checkbox">
                                </span></p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="border-2 border-black w-3/6 p-2">
                            <p class="text-gray-500">Time
                                <input class="block text-black p-3 w-full font-bold uppercase" type="time">
                            </p>
                        </div>
                        <div class="border-2 border-black w-3/6 p-2">
                            <p class="text-gray-500">Date
                                <input class="block text-black p-3 w-full font-bold uppercase" type="date">
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="border-2 border-black w-full p-2">
                            <p class="text-gray-500">Location
                                <input class="block text-black p-3 w-full font-bold uppercase" type="text">
                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="text-xl my-3 uppercase text-center">The Person Described above is charged as follows</h3>

                <div class="border-2 border-black w-full">

                    <div class="flex">
                        <div class="border-2 border-black w-4/6 p-2">
                            <p class="text-gray-500">Charge
                                <select class="block text-black p-3 w-full font-bold uppercase" type="date">
                                    <option value="">Choose one</option>
                                    @foreach ($penal_code_title as $title)
                                        <optgroup label="PC - Title {{ $title->number }} {{ $title->name }}">
                                            @foreach ($title->penal_code_codes() as $code)
                                                <option value="{{ $code->id }}">PC -
                                                    {{ $title->number }}({{ $code->number }}).
                                                    {{ $code->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Actions
                            <div class="block">
                                <a class="font-bold uppercase edit-button-sm" href="#">Edit</a>
                                <a class="font-bold uppercase delete-button-sm" href="#">Delete</a>
                                <a class="font-bold uppercase new-button-sm" href="#">Save</a>
                            </div>
                            </p>
                        </div>

                    </div>
                    <div class="flex">
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Jail <span class="block text-black font-bold uppercase">100s</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Fine <span class="block text-black font-bold uppercase">$4500</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">CAD Jail <span
                                    class="block text-black font-bold uppercase">100h</span></p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="border-2 border-black w-full p-2">
                            <p class="text-gray-500">Description
                                <textarea class="textarea-input font-bold uppercase">100h</textarea>
                            </p>
                            <a class="font-bold uppercase new-button-sm mt-3" href="#">New Charge</a>
                        </div>
                    </div>
                </div>

                <h3 class="text-xl my-3 uppercase text-center">Totals</h3>

                <div class="border-2 border-black w-full">

                    <div class="flex">
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Total Jail <span
                                    class="block text-black font-bold uppercase">100s</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Total Fine <span
                                    class="block text-black font-bold uppercase">$4500</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Total CAD Jail <span
                                    class="block text-black font-bold uppercase">100h</span></p>
                        </div>

                        <div class="border-2 border-black w-3/6 p-2">
                            <p class="text-gray-500">Signed <span
                                    class="block text-black font-bold uppercase">{{ auth()->user()->officer_name_check }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- <div class="my-5 text-2xl">
                    <div class="">
                        <p class="text-3xl">Ticket for {{ $civilian->name }}</p>
                        <p>Date: <span class="underline">{{ date('m/d/Y') }}</span></p>
                        <p>Reporting Officer: <span class="underline">{{ auth()->user()->officer_name_check }}</span></p>
                    </div>
                    <div class="flex-row">
                        <p>Last Name (Defendant) <span class="block">{{ $civilian->name }}</span></p>
                        <p>Report Title: <input class="text-input" name="title" required type="text"
                                value="{{ old('title') }}"></p>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <hr class="my-5">
                    <p>Detail of Event:</p>
                    <div class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="editor">
                    </div>
                    <input id="mdcontent" name="mdcontent" type="hidden" value="{{ old('mdcontent') }}">

                    <button class="new-button-md text-base mt-5">Save</button>

                </div> --}}
            </form>
        </div>
    </div>
@endsection
