@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')

    <div class="grid gap-6 mt-8 lg:grid-cols-1">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-4 card-title">{{ $pageTitle }}</h4>
            </div>
            <div class="p-6">

                @includeIf('pages.shared._form_message')

                <form class="flex flex-col gap-6" action="{{ route('admin.staff.register') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div>
                            <label for="title"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Title</label>
                            <input type="text" name="title" id="title" class="form-input" required>
                        </div>

                        <!-- Surname -->
                        <div>
                            <label for="surname"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Surname</label>
                            <input type="text" name="surname" id="surname" class="form-input" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="inline-block mb-2 text-sm font-medium text-default-800">First
                                Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-input" required>
                        </div>

                        <!-- Other Name -->
                        <div>
                            <label for="other_name" class="inline-block mb-2 text-sm font-medium text-default-800">Other
                                Name</label>
                            <input type="text" name="other_name" id="other_name" class="form-input">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Email -->
                        <div>
                            <label for="email"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Email</label>
                            <input type="email" name="email" id="email" class="form-input" required>
                        </div>

                        <!-- Gender -->
                        <div>
                            <label for="gender"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Gender</label>
                            <select name="gender" id="gender" class="form-input">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Date of Birth -->
                        <div>
                            <label for="dob" class="inline-block mb-2 text-sm font-medium text-default-800">Date of
                                Birth</label>
                            <input type="date" name="dob" id="dob" class="form-input">
                        </div>

                        <!-- Marital Status -->
                        <div>
                            <label for="marital_status"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Marital Status</label>
                            <input type="text" name="marital_status" id="marital_status" class="form-input">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nationality -->
                        <div>
                            <label for="nationality"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Nationality</label>
                            <input type="text" name="nationality" id="nationality" class="form-input">
                        </div>

                        <!-- GPZ -->
                        <div>
                            <label for="gpz" class="inline-block mb-2 text-sm font-medium text-default-800">GPZ</label>
                            <input type="text" name="gpz" id="gpz" class="form-input">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- State of Origin -->
                        <div>
                            <label for="state_of_origin"
                                class="inline-block mb-2 text-sm font-medium text-default-800">State of Origin</label>
                            <input type="text" name="state_of_origin" id="state_of_origin" class="form-input">
                        </div>

                        <!-- Local Government -->
                        <div>
                            <label for="local_government"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Local Government</label>
                            <input type="text" name="local_government" id="local_government" class="form-input">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Home Address -->
                        <div>
                            <label for="home_address" class="inline-block mb-2 text-sm font-medium text-default-800">Home
                                Address</label>
                            <input type="text" name="home_address" id="home_address" class="form-input">
                        </div>

                        <!-- Postal Address -->
                        <div>
                            <label for="postal_address"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Postal Address</label>
                            <input type="text" name="postal_address" id="postal_address" class="form-input">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Phone Number -->
                        <div>
                            <label for="phone_no" class="inline-block mb-2 text-sm font-medium text-default-800">Phone
                                Number</label>
                            <input type="text" name="phone_no" id="phone_no" class="form-input">
                        </div>

                        <!-- Employee File Number -->
                        <div>
                            <label for="employee_file_no"
                                class="inline-block mb-2 text-sm font-medium text-default-800">Employee File Number</label>
                            <input type="text" name="employee_file_no" id="employee_file_no" class="form-input">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="text-white btn bg-info">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
