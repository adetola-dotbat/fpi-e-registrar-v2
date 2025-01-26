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
                <form class="flex flex-col gap-3" action="{{ route('admin.staff.previous.employment.store') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="text" name="user_id" hidden value="{{ $user->id }}">

                    <!-- Company -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="company" class="inline-block mb-2 text-sm font-medium text-default-800">Company</label>
                        <div class="md:col-span-3">
                            <input type="text" name="company" class="form-input" required>
                        </div>
                    </div>

                    <!-- Position Held -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="position_held" class="inline-block mb-2 text-sm font-medium text-default-800">Position
                            Held</label>
                        <div class="md:col-span-3">
                            <input type="text" name="position_held" class="form-input" required>
                        </div>
                    </div>

                    <!-- Date From -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="date_from" class="inline-block mb-2 text-sm font-medium text-default-800">Date
                            From</label>
                        <div class="md:col-span-3">
                            <input type="date" name="date_from" class="form-input" required>
                        </div>
                    </div>

                    <!-- Date To -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="date_to" class="inline-block mb-2 text-sm font-medium text-default-800">Date To</label>
                        <div class="md:col-span-3">
                            <input type="date" name="date_to" class="form-input" required>
                        </div>
                    </div>

                    <!-- Salary -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="salary" class="inline-block mb-2 text-sm font-medium text-default-800">Salary</label>
                        <div class="md:col-span-3">
                            <input type="number" name="salary" class="form-input" step="0.01" required>
                        </div>
                    </div>

                    <!-- Reason for Leaving -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="reason_for_leaving"
                            class="inline-block mb-2 text-sm font-medium text-default-800">Reason for Leaving</label>
                        <div class="md:col-span-3">
                            <textarea name="reason_for_leaving" class="form-input" rows="3" required></textarea>
                        </div>
                    </div>

                    <!-- Name of Employer -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="name_of_employer" class="inline-block mb-2 text-sm font-medium text-default-800">Name of
                            Employer</label>
                        <div class="md:col-span-3">
                            <input type="text" name="name_of_employer" class="form-input" required>
                        </div>
                    </div>

                    <!-- Employer Address -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="employer_address"
                            class="inline-block mb-2 text-sm font-medium text-default-800">Employer Address</label>
                        <div class="md:col-span-3">
                            <textarea name="employer_address" class="form-input" rows="3" required></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
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
            <h4 class="card-title">{{ Str::plural($pageTitle) }}</h4>
        </div>
        <div class="p-4">
            <div class="overflow-x-auto custom-scroll">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-default-200">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">S/N</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Company</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Position Held
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Date From</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Date To</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Salary</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Reason for
                                        Leaving</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Name of
                                        Employer</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Employer
                                        Address</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($previousEmployments as $employment)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $employment->company }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $employment->position_held }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $employment->date_from }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $employment->date_to }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $employment->salary }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $employment->reason_for_leaving }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $employment->name_of_employer }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $employment->employer_address }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-danger hover:text-primary-700"
                                                href="{{ route('admin.staff.previous.employment.destroy', $employment->id) }}">Delete</a>
                                            <button type="button" class="btn bg-primary text-white edit-btn"
                                                data-id="{{ $employment->id }}"
                                                data-company="{{ $employment->company }}"
                                                data-position-held="{{ $employment->position_held }}"
                                                data-date-from="{{ $employment->date_from }}"
                                                data-date-to="{{ $employment->date_to }}"
                                                data-salary="{{ $employment->salary }}"
                                                data-reason-for-leaving="{{ $employment->reason_for_leaving }}"
                                                data-name-of-employer="{{ $employment->name_of_employer }}"
                                                data-employer-address="{{ $employment->employer_address }}"
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
    {{-- edit modal --}}

    <div id="modal-two"
        class="hs-overlay w-full h-full fixed top-0 left-0 z-70 transition-all duration-500 overflow-y-auto pointer-events-none hidden">
        <div
            class="translate-y-10 hs-overlay-open:translate-y-0 hs-overlay-open:opacity-100 opacity-0 ease-in-out transition-all duration-500 sm:max-w-lg sm:w-full my-8 sm:mx-auto flex flex-col bg-white shadow-sm rounded">
            <div class="flex flex-col border border-default-200 shadow-sm rounded-lg pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b border-default-200">
                    <h3 class="text-lg font-medium text-default-900">Edit Previous Employment</h3>
                    <button type="button" class="text-default-600 cursor-pointer" data-hs-overlay="#modal-two">
                        <i class="i-tabler-x text-lg"></i>
                    </button>
                </div>
                <form id="edit-form" method="POST" action="{{ route('admin.staff.previous.employment.update', 0) }}">
                    @csrf
                    @method('POST')
                    <div class="p-4 overflow-y-auto">
                        <input type="hidden" name="id" id="employment-id">

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Company</label>
                            <input type="text" name="company" id="company" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Position Held</label>
                            <input type="text" name="position_held" id="position-held" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Date From</label>
                            <input type="date" name="date_from" id="date-from" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Date To</label>
                            <input type="date" name="date_to" id="date-to" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Salary</label>
                            <input type="number" name="salary" id="salary" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Reason for Leaving</label>
                            <input type="text" name="reason_for_leaving" id="reason-for-leaving"
                                class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Name of Employer</label>
                            <input type="text" name="name_of_employer" id="name-of-employer"
                                class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Employer Address</label>
                            <input type="text" name="employer_address" id="employer-address"
                                class="form-input w-full">
                        </div>

                        <div class="flex justify-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Get data attributes from the clicked button
                const employmentId = this.getAttribute('data-id');
                const company = this.getAttribute('data-company');
                const positionHeld = this.getAttribute('data-position-held');
                const dateFrom = this.getAttribute('data-date-from');
                const dateTo = this.getAttribute('data-date-to');
                const salary = this.getAttribute('data-salary');
                const reasonForLeaving = this.getAttribute('data-reason-for-leaving');
                const nameOfEmployer = this.getAttribute('data-name-of-employer');
                const employerAddress = this.getAttribute('data-employer-address');

                // Set the modal fields with the button's data
                document.getElementById('employment-id').value = employmentId;
                document.getElementById('company').value = company;
                document.getElementById('position-held').value = positionHeld;
                document.getElementById('date-from').value = dateFrom;
                document.getElementById('date-to').value = dateTo;
                document.getElementById('salary').value = salary;
                document.getElementById('reason-for-leaving').value = reasonForLeaving;
                document.getElementById('name-of-employer').value = nameOfEmployer;
                document.getElementById('employer-address').value = employerAddress;

                // Show the modal (with Bootstrap, for example)
                const modal = new bootstrap.Modal(document.getElementById('modal-two'));
                modal.show();
            });
        });
    </script>
@endpush
