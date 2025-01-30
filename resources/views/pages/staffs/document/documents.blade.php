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
                                        Document Name</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        File
                                    </th>
                                    {{-- <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action</th> --}}
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
                                                    <a href="{{ asset('upload/documents/' . $document->file) }}"
                                                        target="_blank"
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
                                        {{-- <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-primary hover:text-primary-700"
                                                href="{{ route('admin.staff.document.destroy', $document->id) }}">Delete</a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $documents->links('pagination::simple-tailwind') }}
        </div>
    </div>
@endsection
