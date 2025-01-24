<div class="overflow-hidden card">
    <div class="card-header">
        <h4 class="card-title">Personal Information</h4>
    </div>
    <div class="relative">
        <div class="relative w-full h-44">
            <img class="object-cover w-full h-full" src="/assets/images/users/avatar-1.jpg" alt="Cover Image">
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            </div>
        </div>

        <!-- Profile Image with Status -->
        <div class="absolute transform -translate-x-1/2 -bottom-14 start-1/2">
            <div class="relative">
                <img class="border-4 border-white rounded-full shadow-md w-28 h-28"
                    src="/assets/images/users/avatar-1.jpg" alt="Profile Picture">
                <span class="absolute w-5 h-5 bg-green-500 border-2 border-white rounded-full bottom-1 end-1"></span>
            </div>
        </div>
    </div>

    <!-- Name, Title, and Location -->
    <div class="pt-16 pb-4 text-center">
        <h2 class="mb-2 text-xl font-semibold text-default-700"> {{ ucfirst($user->title) }}.
            {{ $user->fullname }}
        </h2>
        <p class="text-sm text-default-600">{{ $user->email }}</p>
        <span class="text-xs text-default-400">{{ $user->employee_file_no }}</span>
    </div>
    <div class="p-4">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden border rounded-lg shadow">
                    <table class="min-w-full divide-y divide-default-200">
                        <tbody class="divide-y divide-default-200">
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Title:
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">{{ $user->title }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                    Surname:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->surname }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">First
                                    Name:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->first_name }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Other
                                    Name:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->other_name }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Email:
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">{{ $user->email }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Gender:
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">{{ $user->gender }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Date of
                                    Birth:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->dob }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Marital
                                    Status:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->marital_status }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                    Nationality:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->nationality }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">GPZ:
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->gpz }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">State
                                    of Origin:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->state_of_origin }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Local
                                    Government:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->local_government }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Home
                                    Address:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->home_address }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Postal
                                    Address:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->postal_address }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">Phone
                                    Number:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->phone_no }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                    Employee File Number:</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                    {{ $user->employee_file_no }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
