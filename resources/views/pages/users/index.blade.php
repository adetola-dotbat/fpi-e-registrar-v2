@extends('layouts.app')
@section('pageTitle', $pageTitle)

@push('styles')
@endpush
@section('content')
    <div class="grid gap-6 mt-8 lg:grid-cols-1">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-4 card-title">{{ $pageTitle }}</h4>
            </div>
            <div class="p-6">

                @includeIf('pages.shared._form_message')

                <form class="flex flex-col gap-3" action="{{ route('admin.user.store') }}" method="post">
                    @csrf
                    @method('post')

                    <!-- Title -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="title" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Title
                        </label>
                        <div class="md:col-span-3">
                            <select name="title" id="title" class="form-input" required>
                                <option value="" disabled selected>Select Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr">Dr</option>
                                <option value="Prof">Prof</option>
                            </select>
                        </div>
                    </div>

                    <!-- Surname -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="surname" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Surname
                        </label>
                        <div class="md:col-span-3">
                            <input type="text" name="surname" id="surname" class="form-input w-full" required>
                        </div>
                    </div>

                    <!-- First Name -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="first_name" class="inline-block mb-2 text-sm font-medium text-default-800">
                            First Name
                        </label>
                        <div class="md:col-span-3">
                            <input type="text" name="first_name" id="first_name" class="form-input w-full" required>
                        </div>
                    </div>

                    <!-- Other Name -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="other_name" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Other Name
                        </label>
                        <div class="md:col-span-3">
                            <input type="text" name="other_name" id="other_name" class="form-input w-full">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="email" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Email
                        </label>
                        <div class="md:col-span-3">
                            <input type="email" name="email" id="email" class="form-input w-full" required>
                        </div>
                    </div>

                    <!-- Assign Roles -->
                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="roles" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Assign Roles
                        </label>
                        <div class="md:col-span-3">
                            <select name="roles[]" id="roles" class="form-input w-full" multiple required>
                                <option value="admin">Admin</option>
                                <option value="subadmin">Subadmin</option>
                                <option value="member">Member</option>
                            </select>
                            <small class="text-default-500">Hold down CTRL (Windows) or CMD (Mac) to select multiple
                                roles.</small>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="btn bg-primary text-white">
                            Create User
                        </button>
                    </div>
                </form>

            </div>
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
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">S/N</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Name</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Email</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">Roles</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <!-- Serial Number -->
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>

                                        <!-- User Name -->
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $user->first_name }} {{ $user->surname }}
                                        </td>

                                        <!-- Email -->
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $user->email }}
                                        </td>

                                        <!-- Roles -->
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            @foreach ($user->roles as $role)
                                                <span
                                                    class="inline-block px-2 py-1 text-xs font-semibold text-white bg-primary-500 rounded">
                                                    {{ ucfirst($role->name) }}
                                                </span>
                                            @endforeach
                                        </td>

                                        <!-- Action Buttons -->
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            {{-- <button type="button" class="text-primary hover:text-primary-700"
                                                onclick="openEditModal({{ $user }})">
                                                Edit
                                            </button> --}}
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="post"
                                                class="inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    Delete
                                                </button>
                                            </form>
                                            @role('admin')
                                                <a class="text-info hover:text-primary-700"
                                                    href="{{ route('admin.staff.reset_password', $user->id) }}"
                                                    onclick="return confirm('Are you sure you want to reset the password for this user?')">
                                                    <i class="material-symbols-rounded">restart_alt</i> Reset Password
                                                </a>
                                            @endrole
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

    <!-- Edit User Modal -->
    {{-- <div id="editUserModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg">
            <h2 class="text-lg font-bold mb-4">Edit User</h2>
            <form id="editUserForm" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" id="userId">

                <!-- Name Fields -->
                <div class="flex flex-col gap-3">
                    <div>
                        <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="firstName" name="first_name" class="form-input w-full" required>
                    </div>
                    <div>
                        <label for="surname" class="block text-sm font-medium text-gray-700">Surname</label>
                        <input type="text" id="surname" name="surname" class="form-input w-full" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="form-input w-full" required>
                    </div>
                    <div>
                        <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                        <select id="roles" name="roles[]" class="form-input w-full" multiple required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" class="px-4 py-2 text-gray-500 bg-gray-100 rounded hover:bg-gray-200"
                        onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-white bg-primary-600 rounded hover:bg-primary-700">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div> --}}
@endsection

@push('scripts')
    <script>
        function openEditModal(user) {
            // Populate form fields with user data
            document.getElementById('userId').value = user.id;
            document.getElementById('firstName').value = user.first_name;
            document.getElementById('surname').value = user.surname;
            document.getElementById('email').value = user.email;

            // Pre-select roles
            const rolesSelect = document.getElementById('roles');
            Array.from(rolesSelect.options).forEach(option => {
                option.selected = user.roles.some(role => role.id == option.value);
            });

            // Set form action
            document.getElementById('editUserForm').action = `/admin/user/${user.id}`;

            // Show modal
            document.getElementById('editUserModal').classList.remove('hidden');
        }

        function closeEditModal() {
            // Hide modal
            document.getElementById('editUserModal').classList.add('hidden');
        }
    </script>
@endpush
