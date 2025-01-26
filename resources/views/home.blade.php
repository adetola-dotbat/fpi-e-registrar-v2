@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')
    <!-- Page Title Start -->
    <div class="flex items-center md:justify-between flex-wrap gap-2 mb-5">
        <h4 class="text-default-900 text-lg font-semibold">
            Hi, welcome {{ auth()->check() ? Str::title(auth()->user()->surname) : 'Guest' }}
        </h4>

    </div>
    <!-- Page Title End -->
    @hasanyrole('subadmin|admin|member')
        <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
            <div class="card group overflow-hidden transition-all duration-500 hover:shadow-lg hover:-translate-y-0.5">
                <div class="card-body">
                    <div class="flex items- justify-between">
                        <div>
                            <p class="text-xs tracking-wide font-semibold uppercase text-default-700 mb-3">Total Staff</p>
                            <h4 class="font-semibold text-2xl text-default-700">{{ $totalStaff }}</h4>
                        </div>

                        <div class="rounded flex justify-center items-center size-12 bg-primary/10 text-primary">
                            <i class="material-symbols-rounded text-2xl transition-all group-hover:fill-1">people</i>
                        </div>
                    </div>
                </div>
                <div id="total-order"></div>
            </div>

            <div class="card group overflow-hidden transition-all duration-500 hover:shadow-lg hover:-translate-y-0.5">
                <div class="card-body">
                    <div class="flex items- justify-between">
                        <div>
                            <p class="text-xs tracking-wide font-semibold uppercase text-default-700 mb-3">Total Academic Staff
                            </p>
                            <h4 class="font-semibold text-2xl text-default-700">{{ $countAcademicStaff }}</h4>
                        </div>

                        <div class="rounded flex justify-center items-center size-12 bg-secondary/10 text-secondary">
                            <i class="material-symbols-rounded text-2xl transition-all group-hover:fill-1">people</i>
                        </div>
                    </div>
                </div>
                <div id="total-sale"></div>
            </div>

            <div class="card group overflow-hidden transition-all duration-500 hover:shadow-lg hover:-translate-y-0.5">
                <div class="card-body">
                    <div class="flex items- justify-between">
                        <div>
                            <p class="text-xs tracking-wide font-semibold uppercase text-default-700 mb-3">Total Non Teaching
                                Staff</p>
                            <h4 class="font-semibold text-2xl text-default-700">{{ $countNonAcademicStaff }}</h4>
                        </div>

                        <div class="rounded flex justify-center items-center size-12 bg-warning/10 text-warning">
                            <i class="material-symbols-rounded text-2xl transition-all group-hover:fill-1">people</i>
                        </div>
                    </div>
                </div>
                <div id="total-visits"></div>
            </div>

            <div class="card group overflow-hidden transition-all duration-500 hover:shadow-lg hover:-translate-y-0.5">
                <div class="card-body">
                    <div class="flex items- justify-between">
                        <div>
                            <p class="text-xs tracking-wide font-semibold uppercase text-default-700 mb-3">Applicant </p>
                            <h4 class="font-semibold text-2xl text-default-700">0</h4>
                        </div>

                        <div class="rounded flex justify-center items-center size-12 bg-danger/10 text-danger">
                            <i class="material-symbols-rounded text-2xl transition-all group-hover:fill-1">people</i>
                        </div>
                    </div>
                </div>
                <div id="chart4"></div>
            </div>
        </div>
    @endhasanyrole
    @if (auth()->user()->account_type != 'management')
        <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
            <div class="card group overflow-hidden transition-all duration-500 hover:shadow-lg hover:-translate-y-0.5">
                <div class="card-body">
                    <div class="flex items- justify-between">
                        <div>
                            <p class="text-xs tracking-wide font-semibold uppercase text-default-700 mb-3">Academic
                                Qualification</p>
                            <h4 class="font-semibold text-2xl text-default-700">
                                {{ auth()->user()->staffInstitutionsAttended->count() }}</h4>
                        </div>

                        <div class="rounded flex justify-center items-center size-12 bg-primary/10 text-primary">
                            <i class="material-symbols-rounded text-2xl transition-all group-hover:fill-1">book</i>
                        </div>
                    </div>
                </div>
                <div id="total-order"></div>
            </div>

            <div class="card group overflow-hidden transition-all duration-500 hover:shadow-lg hover:-translate-y-0.5">
                <div class="card-body">
                    <div class="flex items- justify-between">
                        <div>
                            <p class="text-xs tracking-wide font-semibold uppercase text-default-700 mb-3">Next of Kin
                            </p>
                            <h4 class="font-semibold text-2xl text-default-700">
                                {{ auth()->user()->nextOfKins->count() }}</h4>
                        </div>

                        <div class="rounded flex justify-center items-center size-12 bg-secondary/10 text-secondary">
                            <i class="material-symbols-rounded text-2xl transition-all group-hover:fill-1">book</i>
                        </div>
                    </div>
                </div>
                <div id="total-sale"></div>
            </div>

            <div class="card group overflow-hidden transition-all duration-500 hover:shadow-lg hover:-translate-y-0.5">
                <div class="card-body">
                    <div class="flex items- justify-between">
                        <div>
                            <p class="text-xs tracking-wide font-semibold uppercase text-default-700 mb-3">Professional
                                Details</p>
                            <h4 class="font-semibold text-2xl text-default-700">
                                {{ auth()->user()->staffProfessionalDetails->count() }}</h4>
                        </div>

                        <div class="rounded flex justify-center items-center size-12 bg-warning/10 text-warning">
                            <i class="material-symbols-rounded text-2xl transition-all group-hover:fill-1">book</i>
                        </div>
                    </div>
                </div>
                <div id="total-visits"></div>
            </div>

            <div class="card group overflow-hidden transition-all duration-500 hover:shadow-lg hover:-translate-y-0.5">
                <div class="card-body">
                    <div class="flex items- justify-between">
                        <div>
                            <p class="text-xs tracking-wide font-semibold uppercase text-default-700 mb-3">Leave </p>
                            <h4 class="font-semibold text-2xl text-default-700">
                                {{ auth()->user()->staffLeaves->count() }}</h4>
                        </div>

                        <div class="rounded flex justify-center items-center size-12 bg-danger/10 text-danger">
                            <i class="material-symbols-rounded text-2xl transition-all group-hover:fill-1">book</i>
                        </div>
                    </div>
                </div>
                <div id="chart4"></div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- plugin js -->
    <script src="/assets/libs/fullcalendar/index.global.min.js"></script>

    <!-- calendar init -->
    <script src="/assets/js/pages/app-calendar.js"></script>
    <script>
        var calendar = new FullCalendar.Calendar(calendarEl, {
            // Disable dragging or selecting events
            editable: false, // Disable editing (dragging and resizing)
            selectable: false, // Disable selecting dates
            droppable: false, // Disable dropping events onto the calendar

            // Disable other unwanted event handlers like hover or click
            eventMouseEnter: function(info) {
                // Disable or modify mouse hover behavior if needed
            },
            eventClick: function(info) {
                // Disable or change the event click behavior
            }
        });
        calendar.destroy();
    </script>
@endpush
