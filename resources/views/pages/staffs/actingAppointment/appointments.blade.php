@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')

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
                                    @role('admin')
                                        <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                            Action</th>
                                    @endrole
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
                                        @role('admin')
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                <a class="text-danger hover:text-primary-700"
                                                    href="{{ route('admin.staff.acting.appointment.destroy', $actingAppointment->id) }}">Delete</a>
                                                <a href="{{ route('admin.staff.acting.appointment.view', $actingAppointment->user_id) }}"
                                                    class="btn btn-sm border-success text-success hover:bg-success hover:text-white">
                                                    View Profile
                                                </a>
                                            </td>
                                        @endrole
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
