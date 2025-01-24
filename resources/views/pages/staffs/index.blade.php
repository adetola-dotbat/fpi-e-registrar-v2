@extends('layouts.app')

@section('content')
<div class="overflow-hidden card">
    <div class="card-header">
        <h4 class="card-title">Staffs Table</h4>
    </div>
    <div>
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-default-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                    Fullname</th>
                                <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                    Marital Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                    Gender
                                </th>
                                <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                    Cadre
                                </th>
                                <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="odd:bg-white even:bg-default-100 hover:bg-default-100">
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                    {{ $user->fullname }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                    {{ $user->phone_no }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                    {{ $user->marital_status }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                    {{ $user->gender }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                    {{ $user->cadre }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                    <a class="text-primary hover:text-primary-700"
                                        href="{{ route('admin.staff.view', $user->id) }}">View</a>
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
