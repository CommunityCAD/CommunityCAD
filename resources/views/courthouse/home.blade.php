@extends('layouts.courthouse')

@section('content')
    <div class="card">
        <h1 class="text-white text-center text-2xl font-bold">Active Docket</h1>
        <h1 class="text-white text-center text-2xl font-bold underline">San Andreas Court</h1>

        <div class="space-y-3">
            <div class="pill space-y-5">
                <div class="md:flex md:justify-around text-center mt-5">
                    <p>No. 120,994</p>
                    <p>Cause: Traffic Ticket</p>
                    <p>CASE-CLOSED</p>
                </div>

                <div class="flex justify-between mb-16">
                    <div>
                        <p class="underline">Plaintiff</p>
                        <p>State of San Andreas</p>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="mr-3">represented by</p>
                        <div class="">
                            <p>Ron Swanson</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mb-5">
                    <div>
                        <p class="underline">Defendant</p>
                        <p>Walter Hobbs</p>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="mr-3">represented by</p>
                        <div class="">
                            <p>Ron Swanson</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pill space-y-5">
                <div class="md:flex md:justify-around text-center mt-5">
                    <p>No. 120,994</p>
                    <p>Cause: Warrent Affidavid</p>
                    <p>CASE-CLOSED</p>
                </div>

                <div class="flex justify-between mb-16">
                    <div>
                        <p class="underline">Plaintiff</p>
                        <p>State of San Andreas</p>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="mr-3">represented by</p>
                        <div class="">
                            <p>Ron Swanson</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="underline">Defendant</p>
                        <p>Walter Hobbs</p>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="mr-3">represented by</p>
                        <div class="">
                            <p>Ron Swanson</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
