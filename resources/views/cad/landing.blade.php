@extends('layouts.cad')

@section('content')
    <section x-data="{ modalOpen: false }">
        <div x-show="modalOpen" x-transition
            class="fixed top-0 left-0 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
            <div class="w-full max-w-[570px] rounded-[20px] bg-gray-400 py-10 px-6 md:py-[40px] md:px-[50px]">
                <h3 class="pb-2 text-xl font-bold text-center sm:text-2xl">
                    System Use Notification
                </h3>
                <p class="mb-5 leading-relaxed text-justify">
                    Users of this system are advised they are accessing a restricted information system that is governed by
                    applicable agency policies, local laws, state laws, federal laws, and other regulations. Usage may be
                    monitored, recorded, and subject to audit.
                </p>
                <p class="mb-5 leading-relaxed text-justify">
                    Unauthorized use of this system is prohibited. Unauthorized users may be subject to criminal and/or
                    civil penalties. Continuing to use this system indicates the user's consent to the monitoring and
                    recording of all actions within the system.
                </p>
                <p class="mb-5 leading-relaxed">
                    Must be on desktop computer.
                </p>
                <div class="flex flex-wrap -mx-3 text-center">
                    <div class="w-1/2 px-3">
                        <a href="#" @click="modalOpen = false" class="secondary-button-md">
                            Accept and Continue
                        </a>
                    </div>
                    <div class="w-1/2 px-3">
                        <a href="{{ route('portal.dashboard') }}" class="delete-button-md">
                            Decline and Exit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container p-4 mx-auto bg-[#124559] text-white cursor-default rounded-2xl mt-5">
            <header>
                <div class="text-center">
                    <h1 class="text-2xl font-semibold">
                        Welcome Officer
                    </h1>
            </header>

            <main class="my-5">
                <form action="" class="w-1/3 mx-auto space-y-3">
                    <div class="w-full">
                        <label class="block mr-2 text-lg">Officer Name:</label>
                        <input type="text" name="officer_name" value="{{ auth()->user()->officer_name }}"
                            class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white">
                    </div>

                    <div class="w-full">
                        <label class="block mr-2 text-lg">Unit Number:</label>
                        <input type="text" name="unit_number"
                            class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white">
                    </div>

                    <div class="w-full">
                        <label class="block mr-2 text-lg">Department:</label>
                        <input type="text" name="department"
                            class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white">
                    </div>

                    <div class="w-full">
                        <label class="block mr-2 text-lg">Subdivision:</label>
                        <input type="text" name="officer_name"
                            class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white">
                    </div>

                    <div class="w-full">
                        <input type="submit" class="new-button-md" value="Access CAD">
                    </div>
                </form>
            </main>


        </div>
    </section>
@endsection
