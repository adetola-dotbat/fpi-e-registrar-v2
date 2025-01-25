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

                <form class="flex flex-col gap-3" action="{{ route('admin.staff.next_of_kin.store') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="text" name="user_id" hidden value="{{ $user->id }}">

                    <!-- Full Name -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="fullname" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Full Name
                        </label>
                        <div class="md:col-span-3">
                            <input type="text" name="fullname" id="fullname" class="form-input w-full" required
                                placeholder="Enter full name">
                        </div>
                    </div>

                    <!-- Relationship -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="relationship_id" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Relationship
                        </label>
                        <div class="md:col-span-3">
                            <select name="relationship_id" id="relationship_id" class="form-input" required>
                                <option value="" disabled selected>Select Relationship</option>
                                @foreach ($relationships as $value => $name)
                                    <option value="{{ $value }}">{{ ucfirst(strtolower($name)) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="address" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Address
                        </label>
                        <div class="md:col-span-3">
                            <textarea name="address" id="address" class="form-input w-full" rows="3" required placeholder="Enter address"></textarea>
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="phone_number" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Phone Number
                        </label>
                        <div class="md:col-span-3">
                            <input type="text" name="phone_number" id="phone_number" class="form-input w-full" required
                                placeholder="Enter phone number">
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            Save
                        </button>
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
                                        S/N
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Full Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Relationship
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Address
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Phone Number
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($nextOfKins as $nextOfKin)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $nextOfKin->fullname }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $relationships[$nextOfKin->relationship_id] ?? 'Unknown' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $nextOfKin->address }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $nextOfKin->phone_number }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-primary hover:text-primary-700"
                                                href="{{ route('admin.staff.next_of_kin.destroy', $nextOfKin->id) }}">
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
