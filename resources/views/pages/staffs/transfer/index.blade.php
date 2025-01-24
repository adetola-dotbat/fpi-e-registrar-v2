@extends('layouts.app')

@section('content')
    @include('pages.staffs.partials.actions')
    <div class="grid gap-6 mt-8 lg:grid-cols-2">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-4 card-title">Staff Transfer</h4>
            </div>
            <div class="p-6">

                @includeIf('pages.shared._form_message')

                <form class="flex flex-col gap-3" action="{{ route('admin.staff.transfer.store') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="text" name="user_id" hidden value="{{ $user->id }}">

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="fileNumber" class="inline-block mb-2 text-sm font-medium text-default-800">File
                            Number</label>
                        <div class="md:col-span-3">
                            <input type="text" readonly class="form-input" id="fileNumber"
                                value="{{ $user->employee_file_no }}">
                        </div>
                    </div>
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="currentDepartment"
                            class="inline-block mb-2 text-sm font-medium text-default-800">Current
                            Department</label>
                        <div class="md:col-span-3">
                            <input type="text" name="current_department" class="form-input" id="currentDepartment"
                                value="{{ $user->staffDetail->current_department }}">
                        </div>
                    </div>
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="currentPosition" class="inline-block mb-2 text-sm font-medium text-default-800">Current
                            Position</label>
                        <div class="md:col-span-3">
                            <input type="text" name="current_position" class="form-input" id="currentPosition"
                                value="{{ $user->staffDetail->current_post }}">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="newDepartment" class="inline-block mb-2 text-sm font-medium text-default-800">New
                            Department</label>
                        <div class="md:col-span-3">
                            <input type="text" name="new_department" class="form-input" id="newDepartment"
                                placeholder="New Department">
                        </div>
                    </div>
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="newPosition" class="inline-block mb-2 text-sm font-medium text-default-800">New
                            Position</label>
                        <div class="md:col-span-3">
                            <input type="text" name="new_position" class="form-input" id="newPosition"
                                placeholder="New Position">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="date" class="inline-block mb-2 text-sm font-medium text-default-800">Effective
                            Date</label>
                        <div class="md:col-span-3">
                            <input type="date" name="effective_date" class="form-input" id="date"
                                placeholder="Effective Date">
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
            <h4 class="card-title">Transfer Records</h4>
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
                                        Previous Department</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Current Department
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Previous Position
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Current Position
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Effective Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($transfers as $transfer)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $transfer->current_department }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $transfer->new_department }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $transfer->current_position }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $transfer->new_position }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $transfer->effective_date }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-primary hover:text-primary-700"
                                                href="{{ route('admin.staff.transfer.destroy', $transfer->id) }}">Delete</a>
                                            <button type="button" class="btn bg-primary text-white edit-btn"
                                                data-id="{{ $transfer->id }}"
                                                data-current-department="{{ $transfer->current_department }}"
                                                data-new-department="{{ $transfer->new_department }}"
                                                data-current-position="{{ $transfer->current_position }}"
                                                data-new-position="{{ $transfer->new_position }}"
                                                data-effective-date="{{ $transfer->effective_date }}"
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
                    <h3 class="text-lg font-medium text-default-900">Edit Transfer</h3>
                    <button type="button" class="text-default-600 cursor-pointer" data-hs-overlay="#modal-two">
                        <i class="i-tabler-x text-lg"></i>
                    </button>
                </div>
                <form id="edit-transfer-form" method="POST" action="{{ route('admin.staff.transfer.update', 0) }}">
                    @csrf
                    @method('POST')
                    <div class="p-4 overflow-y-auto">
                        <input type="hidden" name="id" id="transfer-id">

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Current Department</label>
                            <input type="text" name="current_department" id="current-department"
                                class="form-input w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">New Department</label>
                            <input type="text" name="new_department" id="new-department" class="form-input w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Current Position</label>
                            <input type="text" name="current_position" id="current-position"
                                class="form-input w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">New Position</label>
                            <input type="text" name="new_position" id="new-position" class="form-input w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-default-800">Effective Date</label>
                            <input type="date" name="effective_date" id="effective-date" class="form-input w-full">
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
                const transferId = this.getAttribute('data-id');
                const currentDepartment = this.getAttribute('data-current-department');
                const newDepartment = this.getAttribute('data-new-department');
                const currentPosition = this.getAttribute('data-current-position');
                const newPosition = this.getAttribute('data-new-position');
                const effectiveDate = this.getAttribute('data-effective-date');

                // Populate the modal fields with the data
                document.getElementById('transfer-id').value = transferId;
                document.getElementById('current-department').value = currentDepartment;
                document.getElementById('new-department').value = newDepartment;
                document.getElementById('current-position').value = currentPosition;
                document.getElementById('new-position').value = newPosition;
                document.getElementById('effective-date').value = effectiveDate;
            });
        });
    </script>
@endpush
