@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')

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
                                            <a href="{{ route('admin.staff.leave.view', $leave->user_id) }}"
                                                class="btn btn-sm border-success text-success hover:bg-success hover:text-white">
                                                View Profile
                                            </a>
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
