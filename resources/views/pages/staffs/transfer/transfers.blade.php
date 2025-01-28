@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')

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
                                    @role('admin')
                                        <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                            Action</th>
                                    @endrole

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
                                        @role('admin')
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                <a class="text-danger hover:text-primary-700"
                                                    href="{{ route('admin.staff.transfer.destroy', $transfer->id) }}">Delete</a>

                                                <a href="{{ route('admin.staff.transfer.view', $transfer->user_id) }}"
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
