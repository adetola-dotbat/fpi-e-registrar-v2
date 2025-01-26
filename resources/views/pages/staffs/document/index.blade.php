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

                <form class="flex flex-col gap-3" action="{{ route('admin.staff.document.store') }}"
                    enctype="multipart/form-data" method="post">
                    @csrf
                    @method('post')
                    <input type="text" name="user_id" hidden value="{{ $user->id }}">

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="document" class="inline-block mb-2 text-sm font-medium text-default-800">Document
                            Name</label>
                        <div class="md:col-span-3">
                            <input type="text" name="document" id="document" class="form-input" required>
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="file" class="inline-block mb-2 text-sm font-medium text-default-800">Document
                            File</label>
                        <div class="md:col-span-3">
                            <input type="file" name="file" id="file" class="form-input" required>
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
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        S/N</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Document Name</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        File
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($documents as $document)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $document->document }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            @if ($document->file)
                                                <div class="hs-tooltip">
                                                    <a href="{{ asset('documents/' . $document->file) }}" target="_blank"
                                                        class="text-primary-500 hover:underline group relative"
                                                        data-fc-placement="bottom">
                                                        <i class="i-tabler-external-link text-success"></i>
                                                    </a>
                                                    <span
                                                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-default-900 text-xs font-medium text-white rounded shadow-sm"
                                                        role="tooltip">
                                                        View Document
                                                    </span>
                                                </div>
                                            @else
                                                <span class="text-default-500">No File</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-primary hover:text-primary-700"
                                                href="{{ route('admin.staff.document.destroy', $document->id) }}">Delete</a>
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
