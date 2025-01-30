@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')
    <div class="grid gap-6 mt-8 lg:grid-cols-2">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-4 card-title">{{ $pageTitle }}</h4>
            </div>
            <div class="p-6">

                @includeIf('pages.shared._form_message')

                <form class="flex flex-col gap-3" action="{{ route('admin.staff.review.store') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="fileNumber" class="inline-block mb-2 text-sm font-medium text-default-800">File
                            Number</label>
                        <div class="md:col-span-3">
                            <input type="text" class="form-input" id="fileNumber" name="employee_file_no">
                        </div>
                    </div>
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="email" class="inline-block mb-2 text-sm font-medium text-default-800">Email</label>
                        <div class="md:col-span-3">
                            <input type="email" class="form-input" id="email" name="email">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="newPosition"
                            class="inline-block mb-2 text-sm font-medium text-default-800">Message</label>
                        <div class="md:col-span-3">
                            <textarea type="text" name="message" class="form-input"> </textarea>
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
                                            File Number
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Message
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-default-200">
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                                {{ $review->user->employee_file_no }}
                                            </td>

                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $review->user->email }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $review->message }}
                                            </td>

                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                <a class="text-danger hover:text-primary-700"
                                                    href="{{ route('admin.staff.review.destroy', $review->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>


                            </table>

                        </div>

                    </div>
                </div>
                <div class="mt-4">
                    {{ $reviews->links('pagination::simple-tailwind') }}
                </div>
            </div>
        </div>
    </div>

@endsection
