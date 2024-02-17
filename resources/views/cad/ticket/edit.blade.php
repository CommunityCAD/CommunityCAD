@extends('layouts.cad_simple')

@section('content')
    <div class="">
        <div class="bg-yellow-100 max-w-3xl rounded-lg mx-auto p-4 mt-5">
            <div class="border-2 border-black w-full">
                <div class="flex">
                    <div class="border-2 border-black w-full p-2">
                        <p class="text-gray-500">Type:
                            @if ($ticket->type_id == 1)
                                Warning
                            @elseif($ticket->type_id == 2)
                                Ticket
                            @elseif ($ticket->type_id == 3)
                                Arrest
                            @endif
                        </p>
                    </div>
                </div>
                @if ($ticket->call_id)
                    <div class="flex">
                        <div class="border-2 border-black w-full p-2">
                            <p class="text-gray-500">Call:
                                {{ $ticket->call->id }} - {{ $ticket->call->nature }} @
                                {{ $ticket->call->location }}, {{ $ticket->call->city }} on
                                {{ $ticket->call->created_at->format('m/d/Y') }}
                            </p>
                        </div>
                    </div>
                @endif
                <div class="flex">
                    <div class="border-2 border-black w-4/6 p-2">
                        <p class="text-gray-500">Last Name (Defendant) <span
                                class="block text-black font-bold uppercase">{{ $ticket->civilian->last_name }}</span>
                        </p>
                    </div>
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">First Name <span
                                class="block text-black font-bold uppercase">{{ $ticket->civilian->first_name }}</span>
                        </p>
                    </div>
                </div>
                <div class="flex">
                    <div class="border-2 border-black w-5/6 p-2">
                        <p class="text-gray-500">Address <span
                                class="block text-black font-bold uppercase">{{ $ticket->civilian->address }}</span></p>
                    </div>
                    <div class="border-2 border-black w-1/6 p-2">
                        <p class="text-gray-500">Showed ID <span class="block text-black font-bold uppercase">
                                <input @checked($ticket->showed_id) class="mx-auto text-center w-full h-6" disabled
                                    name="showed_id" type="checkbox">
                            </span></p>
                    </div>
                </div>
                <div class="flex">
                    <div class="border-2 border-black w-3/6 p-2">
                        <p class="text-gray-500">SSN <span
                                class="block text-black font-bold uppercase">{{ $ticket->civilian->s_n_n }}</span></p>
                    </div>
                    <div class="border-2 border-black w-1/6 p-2">
                        <p class="text-gray-500">Sex <span
                                class="block text-black font-bold uppercase">{{ $ticket->civilian->gender }}</span></p>
                    </div>
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">Race <span
                                class="block text-black font-bold uppercase">{{ $ticket->civilian->race }}</span></p>
                    </div>
                </div>

                <div class="flex">
                    @if ($ticket->license_id)
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">License No. <span
                                    class="block text-black font-bold uppercase">{{ $ticket->license_id }}</span></p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Expires <span
                                    class="block text-black font-bold uppercase">{{ $ticket->license->expires_on->format('m/d/Y') }}</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Type <span
                                    class="block text-black font-bold uppercase">{{ $ticket->license->license_type->name }}</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Suspend <span class="block text-black font-bold uppercase">
                                    <input @checked($ticket->license_was_suspended) class="mx-auto text-center w-full h-6" disabled
                                        name="license_was_suspended" type="checkbox">
                                </span></p>
                        </div>
                    @else
                        <div class="border-2 border-black w-full p-2">
                            <p class="text-gray-500">No License Linked</p>
                        </div>
                    @endif
                </div>

                <div class="flex">
                    @if ($ticket->vehicle_id)
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Plate <span
                                    class="block text-black font-bold uppercase">{{ $ticket->vehicle->plate }}</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Make <span
                                    class="block text-black font-bold uppercase">{{ $ticket->vehicle->model }}</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Color <span
                                    class="block text-black font-bold uppercase">{{ $ticket->vehicle->color }}</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Expire <span class="block text-black font-bold uppercase">
                                    {{ $ticket->vehicle->registration_expire->format('m/d/Y') }}
                                </span></p>
                        </div>
                        <div class="border-2 border-black w-1/6 p-2">
                            <p class="text-gray-500">Impounded <span class="block text-black font-bold uppercase">
                                    <input @checked($ticket->vehicle_was_impounded) class="mx-auto text-center w-full h-6" disabled
                                        name="vehicle_was_impounded" type="checkbox">
                                </span></p>
                        </div>
                    @else
                        <div class="border-2 border-black w-full p-2">
                            <p class="text-gray-500">No Vehicle Linked</p>
                        </div>
                    @endif
                </div>

                <div class="flex">
                    <div class="border-2 border-black w-3/6 p-2">
                        <p class="text-gray-500">Time <span class="block text-black font-bold uppercase">
                                {{ $ticket->offense_occured_at->format('H:i') }}
                            </span>
                        </p>
                    </div>
                    <div class="border-2 border-black w-3/6 p-2">
                        <p class="text-gray-500">Date <span class="block text-black font-bold uppercase">
                                {{ $ticket->offense_occured_at->format('m/d/Y') }}
                            </span></p>
                    </div>
                </div>
                <div class="flex">
                    <div class="border-2 border-black w-full p-2">
                        <p class="text-gray-500">Location <span class="block text-black font-bold uppercase">
                                {{ $ticket->location_of_offense }}
                            </span></p>
                    </div>
                </div>
            </div>

            <h3 class="text-xl my-3 uppercase text-center">The Person Described above is charged as follows</h3>

            @foreach ($ticket->charges as $charge)
                <div class="flex">
                    <div class="border-2 border-black w-5/6 p-2">
                        <p class="text-gray-500">Charge <span class="block text-black font-bold uppercase">
                                {{ $charge->penal_code->name }}
                            </span></p>
                    </div>
                    <div class="border-2 border-black w-1/6 p-2">
                        <p class="text-gray-500">Counts <span class="block text-black font-bold uppercase">
                                {{ $charge->counts }}
                            </span></p>
                    </div>
                </div>

                <div class="flex">
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">Jail Time (seconds)
                            <span class="block text-black font-bold uppercase">{{ $charge->in_game_jail_time }}</span>
                        </p>
                    </div>
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">Fine ($)
                            <span class="block text-black font-bold uppercase">{{ $charge->fine }}</span>
                        </p>
                    </div>
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">CAD Jail Time (hours)
                            <span class="block text-black font-bold uppercase">{{ $charge->cad_jail_time }}</span>
                        </p>
                    </div>
                </div>

                <div class="flex">
                    <div class="border-2 border-black w-full p-2">
                        <p class="text-gray-500">Description
                            <span class="block text-black font-bold uppercase">{{ $charge->description }}</span>
                        </p>
                    </div>
                </div>
            @endforeach

            <hr class="my-12">

            @livewire('cad.add-charges-to-ticket', ['ticket' => $ticket])

            @if ($allow_sign)
                <a class="new-button-md mt-5" href="{{ route('cad.ticket.sign_ticket', $ticket->id) }}">Finish and Sign
                    Ticket</a>
            @else
                <p>You must add charges before signing the ticket.</p>
            @endif

        </div>

    </div>
@endsection
