@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')
    @include('pages.staffs.partials.actions')
    @if (auth()->user()->hasRole('subadmin') || auth()->user()->account_type !== 'management')
        <div class="grid gap-6 mt-8 lg:grid-cols-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-4 card-title">{{ $pageTitle }}</h4>
                </div>
                <div class="p-6">

                    @includeIf('pages.shared._form_message')

                    <form class="flex flex-col gap-3" action="{{ route('admin.staff.institution.attended.store') }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <input type="text" name="user_id" hidden value="{{ $user->id }}">

                        <div class="grid items-center grid-cols-4 gap-6">
                            <label for="school_name" class="inline-block mb-2 text-sm font-medium text-default-800">School
                                Name</label>
                            <div class="md:col-span-3">
                                <input type="text" name="school_name" id="school_name" class="form-input" required>
                            </div>
                        </div>

                        <div class="grid items-center grid-cols-4 gap-6">
                            <label for="course_study" class="inline-block mb-2 text-sm font-medium text-default-800">Course
                                of
                                Study</label>
                            <div class="md:col-span-3">
                                <input type="text" name="course_study" id="course_study" class="form-input" required>
                            </div>
                        </div>


                        <div class="grid items-center grid-cols-4 gap-6">
                            <label for="qualification"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Qualification</label>
                            <div class="md:col-span-3">
                                <input type="text" name="qualification" id="qualification" class="form-input">
                            </div>
                        </div>


                        <div class="grid items-center grid-cols-4 gap-6">
                            <label for="certificate"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Certificate</label>
                            <div class="md:col-span-3">
                                <input type="file" name="certificate" id="certificate" class="form-input">
                                <small class="text-danger">Only PDF, JPEG, and PNG files are accepted.</small>
                            </div>
                        </div>

                        <div class="grid items-center grid-cols-4 gap-6">
                            <label for="date_obtained" class="inline-block mb-2 text-sm font-medium text-default-800">Date
                                Obtained</label>
                            <div class="md:col-span-3">
                                <input type="date" name="date_obtained" id="date_obtained" class="form-input" required>
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
    @endif

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
                                        School Name</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Course of Study
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Qualification
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Certificate
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Date Obtained
                                    </th>
                                    @hasanyrole('admin|subadmin')
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Status
                                        </th>
                                    @endhasanyrole

                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($institutions as $institution)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $institution->school_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $institution->course_study }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $institution->qualification }}
                                        </td>

                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            <a href="{{ asset('upload/school_certificates/' . $institution->certificate) }}"
                                                target="_blank"
                                                class="btn btn-sm border-success text-success hover:bg-success hover:text-white">
                                                <i class="material-symbols-rounded">file_download</i> View Document
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $institution->date_obtained }}
                                        </td>
                                        @hasanyrole('admin|subadmin')
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                @if ($institution->approved_status === 'pending')
                                                    <a href="{{ route('admin.staff.institution.attended.approve', $institution->id) }}"
                                                        class="btn btn-sm border-primary text-primary hover:bg-primary hover:text-white">
                                                        Approve
                                                    </a>
                                                @else
                                                    <span class="text-success font-medium">Approved</span>
                                                @endif
                                            </td>
                                        @endhasanyrole

                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-danger hover:text-primary-700"
                                                href="{{ route('admin.staff.institution.attended.destroy', $institution->id) }}">
                                                Delete
                                            </a>
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
