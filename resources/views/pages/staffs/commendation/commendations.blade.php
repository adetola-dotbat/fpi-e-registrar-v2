@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')
    <div class="mt-3 overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Commendation Records</h4>
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
                                        Commendation</th>
                                    @role('admin')
                                        <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                            Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($commendations as $commendation)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $commendation->commendation }}
                                        </td>
                                        @role('admin')
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                <a class="text-danger hover:text-primary-700"
                                                    href="{{ route('admin.staff.commendation.destroy', $commendation->id) }}">Delete</a>
                                                <a href="{{ route('admin.staff.commendation.view', $commendation->user_id) }}"
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
