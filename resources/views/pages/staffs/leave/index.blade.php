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

                <form class="flex flex-col gap-3" action="{{ route('admin.staff.leave.store') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="text" name="user_id" hidden value="{{ $user->id }}">

                    <!-- Leave Type -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="leave_type_id" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Leave Type
                        </label>
                        <div class="md:col-span-3">
                            <select name="leave_type_id" id="leave_type_id" class="form-input" required>
                                <option value="" disabled selected>Select Leave Type</option>
                                @foreach ($leaveTypes as $leaveType)
                                    <option value="{{ $leaveType->id }}">{{ Str::title($leaveType->type) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Date Leave Requested -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="date_leave_requested" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Date Leave Requested
                        </label>
                        <div class="md:col-span-3">
                            <input type="date" name="date_leave_requested" id="date_leave_requested" class="form-input"
                                required>
                        </div>
                    </div>

                    <!-- Date Resume Duty -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="date_resume_duty" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Date Resume Duty
                        </label>
                        <div class="md:col-span-3">
                            <input type="date" name="date_resume_duty" id="date_resume_duty" class="form-input" required>
                        </div>
                    </div>

                    <!-- Leave Address -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="leave_address" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Leave Address
                        </label>
                        <div class="md:col-span-3">
                            <input type="text" name="leave_address" id="leave_address" class="form-input" required>
                        </div>
                    </div>

                    <!-- Recommend -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="recommend" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Recommendation
                        </label>
                        <div class="md:col-span-3">
                            <input type="text" name="recommend" id="recommend" class="form-input" required>
                        </div>
                    </div>

                    <!-- Reasons -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="reasons" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Reasons
                        </label>
                        <div class="md:col-span-3">
                            <textarea name="reasons" id="reasons" rows="4" class="form-input" required></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            Submit Leave Request
                        </button>
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
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        S/N</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Leave Type</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Requested Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Resume Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Leave Address
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Recommendation
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Reason
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($leaves as $leave)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $leave->leaveType->type }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $leave->date_leave_requested }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $leave->date_resume_duty }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $leave->leave_address }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $leave->recommend }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $leave->reasons }}
                                        </td>
                                        @hasanyrole('admin|subadmin')
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                @if ($leave->status === 'pending')
                                                    <a href="{{ route('admin.staff.leave.approve', $leave->id) }}"
                                                        class="btn btn-sm border-primary text-primary hover:bg-primary hover:text-white">
                                                        Approve
                                                    </a>
                                                    <a href="{{ route('admin.staff.leave.decline', $leave->id) }}"
                                                        class="btn btn-sm border-danger text-danger hover:bg-danger hover:text-white">
                                                        Decline
                                                    </a>
                                                @elseif ($leave->status === 'approved')
                                                    <span class="text-success font-medium">Approved</span>
                                                @else
                                                    <span class="text-danger font-medium">Declined</span>
                                                @endif
                                            </td>
                                        @else
                                            <td class="px-6 py-4 font-bold text-sm whitespace-nowrap text-default-800">
                                                {{ Str::title($leave->status) }}
                                            </td>
                                        @endhasanyrole
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-danger hover:text-primary-700"
                                                href="{{ route('admin.staff.leave.destroy', $leave->id) }}">Delete</a>
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
@endsection
