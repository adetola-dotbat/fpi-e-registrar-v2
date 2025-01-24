@extends('layouts.app')

@section('content')
    @include('pages.staffs.partials.actions')
    <div class="grid gap-6 mt-8 lg:grid-cols-2">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-4 card-title">{{ $pageTitle }}</h4>
            </div>
            <div class="p-6">

                @includeIf('pages.shared._form_message')

                <form class="flex flex-col gap-3" action="{{ route('admin.staff.public.service.store') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="text" name="user_id" hidden value="{{ $user->id }}">

                    <div class="grid items-center grid-cols-4 gap-6">
                        <!-- Organization -->
                        <label for="organization"
                            class="inline-block mb-2 text-sm font-medium text-default-800">Organization</label>
                        <div class="md:col-span-3">
                            <input type="text" name="organization" id="organization" class="form-input" required>
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <!-- Start Date -->
                        <label for="start_date" class="inline-block mb-2 text-sm font-medium text-default-800">Start
                            Date</label>
                        <div class="md:col-span-3">
                            <input type="date" name="start_date" id="start_date" class="form-input" required>
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <!-- End Date -->
                        <label for="end_date" class="inline-block mb-2 text-sm font-medium text-default-800">End
                            Date</label>
                        <div class="md:col-span-3">
                            <input type="date" name="end_date" id="end_date" class="form-input" required>
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <!-- Pensionable Emolument -->
                        <label for="pensionable_emolument"
                            class="inline-block mb-2 text-sm font-medium text-default-800">Pensionable Emolument</label>
                        <div class="md:col-span-3">
                            <input type="text" name="pensionable_emolument" id="pensionable_emolument" class="form-input"
                                required>
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
                                        Organization</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Start Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        End Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Pensionable Emoluments
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($publicServices as $publicService)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $publicService->organization }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $publicService->start_date }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $publicService->end_date }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $publicService->pensionable_emolument }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-primary hover:text-primary-700"
                                                href="{{ route('admin.staff.public.service.destroy', $publicService->id) }}">Delete</a>
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
