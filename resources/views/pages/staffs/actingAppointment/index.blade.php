@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')
    @include('pages.staffs.partials.actions')
    <div class="grid gap-6 mt-8 lg:grid-cols-2">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-4 card-title">{{ $pageTitle }}</h4>
            </div>
            <div class="p-6">

                @includeIf('pages.shared._form_message')

                <form class="flex flex-col gap-3" action="{{ route('admin.staff.acting.appointment.store') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="text" name="user_id" hidden value="{{ $user->id }}">

                    <div class="grid items-center grid-cols-4 gap-6 mb-4">
                        <label for="position"
                            class="inline-block mb-2 text-sm font-medium text-default-800">Position</label>
                        <div class="md:col-span-3">
                            <input type="text" name="position" class="form-input" value="{{ old('position') }}">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6 mb-4">
                        <label for="startDate" class="inline-block mb-2 text-sm font-medium text-default-800">Start
                            Date</label>
                        <div class="md:col-span-3">
                            <input type="date" name="start_date" class="form-input" value="{{ old('start_date') }}">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6 mb-4">
                        <label for="endDate" class="inline-block mb-2 text-sm font-medium text-default-800">End
                            Date</label>
                        <div class="md:col-span-3">
                            <input type="date" name="end_date" class="form-input" value="{{ old('end_date') }}">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6 mb-4">
                        <label for="reference"
                            class="inline-block mb-2 text-sm font-medium text-default-800">Reference</label>
                        <div class="md:col-span-3">
                            <input type="text" name="reference" class="form-input" value="{{ old('reference') }}">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6 mb-4">
                        <label for="rateOfAllowance" class="inline-block mb-2 text-sm font-medium text-default-800">Rate of
                            Allowance</label>
                        <div class="md:col-span-3">
                            <input type="number" name="rate_of_allowance" class="form-input"
                                value="{{ old('rate_of_allowance') }}">
                        </div>
                    </div>
                    <div class="grid items-center grid-cols-4 gap-6">
                        <div class="md:col-start-2">
                            <button type="submit" class="text-white btn bg-info">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('pages.staffs.partials.short-personal-info')
    </div>
    <div class="mt-3 overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Acting Appointment Records</h4>
        </div>
        <div class="p-4">
            <div class="overflow-x-auto custom-scroll">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-default-200">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        S/N</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Position
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Start Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        End Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Reference
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Allowance Rate
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($actingAppointments as $actingAppointment)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $actingAppointment->position }}
                                        </td>

                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $actingAppointment->start_date }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $actingAppointment->end_date }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $actingAppointment->reference }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $actingAppointment->rate_of_allowance }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-danger hover:text-primary-700"
                                                href="{{ route('admin.staff.acting.appointment.destroy', $actingAppointment->id) }}">Delete</a>
                                            <button type="button" class="btn bg-primary text-white edit-btn"
                                                data-id="{{ $actingAppointment->id }}"
                                                data-position="{{ $actingAppointment->position }}"
                                                data-start-date="{{ $actingAppointment->start_date }}"
                                                data-end-date="{{ $actingAppointment->end_date }}"
                                                data-reference="{{ $actingAppointment->reference }}"
                                                data-rate-of-allowance="{{ $actingAppointment->rate_of_allowance }}"
                                                data-hs-overlay="#modal-two">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <div id="modal-two"
        class="hs-overlay w-full h-full fixed top-0 left-0 z-70 transition-all duration-500 overflow-y-auto pointer-events-none hidden">
        <div
            class="translate-y-10 hs-overlay-open:translate-y-0 hs-overlay-open:opacity-100 opacity-0 ease-in-out transition-all duration-500 sm:max-w-lg sm:w-full my-8 sm:mx-auto flex flex-col bg-white shadow-sm rounded">
            <div class="flex flex-col border border-default-200 shadow-sm rounded-lg pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b border-default-200">
                    <h3 class="text-lg font-medium text-default-900">Edit Acting Appointment</h3>
                    <button type="button" class="text-default-600 cursor-pointer" data-hs-overlay="#modal-two">
                        <i class="i-tabler-x text-lg"></i>
                    </button>
                </div>
                <form id="edit-acting-appointment-form" method="POST"
                    action="{{ route('admin.staff.acting.appointment.update', 0) }}">
                    @csrf
                    @method('POST')
                    <div class="p-4 overflow-y-auto">
                        <input type="hidden" name="id" id="acting-appointment-id">

                        <div class="mb-4">
                            <label for="position" class="block text-sm font-medium text-default-800">Position</label>
                            <input type="text" name="position" id="position" class="form-input w-full" required>
                        </div>

                        <!-- Start Date -->
                        <div class="mb-4">
                            <label for="start-date" class="block text-sm font-medium text-default-800">Start Date</label>
                            <input type="date" name="start_date" id="start-date" class="form-input w-full" required>
                        </div>

                        <!-- End Date -->
                        <div class="mb-4">
                            <label for="end-date" class="block text-sm font-medium text-default-800">End Date</label>
                            <input type="date" name="end_date" id="end-date" class="form-input w-full" required>
                        </div>

                        <!-- Reference -->
                        <div class="mb-4">
                            <label for="reference" class="block text-sm font-medium text-default-800">Reference</label>
                            <input type="text" name="reference" id="reference" class="form-input w-full" required>
                        </div>

                        <!-- Rate of Allowance -->
                        <div class="mb-4">
                            <label for="rate-of-allowance" class="block text-sm font-medium text-default-800">Rate of
                                Allowance</label>
                            <input type="text" name="rate_of_allowance" id="rate-of-allowance"
                                class="form-input w-full" required>
                        </div>

                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-default-200">
                        <button type="button" class="btn bg-primary text-white"
                            data-hs-overlay="#modal-two">Close</button>
                        <button type="submit" class="btn bg-primary text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const actingAppointmentId = this.getAttribute('data-id');
                const position = this.getAttribute('data-position');
                const startDate = this.getAttribute('data-start-date');
                const endDate = this.getAttribute('data-end-date');
                const reference = this.getAttribute('data-reference');
                const rateOfAllowance = this.getAttribute('data-rate-of-allowance');

                // Populate the modal fields with the data
                document.getElementById('acting-appointment-id').value = actingAppointmentId;
                document.getElementById('position').value = position;
                document.getElementById('start-date').value = startDate;
                document.getElementById('end-date').value = endDate;
                document.getElementById('reference').value = reference;
                document.getElementById('rate-of-allowance').value = rateOfAllowance;
            });
        });
    </script>
@endpush
