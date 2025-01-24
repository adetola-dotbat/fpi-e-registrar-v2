@if (!is_null($user->previousEmployments))
    <div class="overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Previous Employment</h4>
        </div>
        <div class="p-4">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden border rounded-lg shadow">
                        <table class="min-w-full divide-y divide-default-200">
                            @foreach ($user->previousEmployments as $previous)
                                <thead>
                                    <tr>
                                        <th colspan="2" class="py-4 text-lg font-semibold text-default-800">
                                            {{ $loop->iteration }}. Previous Employment
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-default-200">
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Company
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $previous->company }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Position Held
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $previous->position_held }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Date
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $previous->date_from }} to {{ $previous->date_to }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Salary
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $previous->salary }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Reason for Leaving
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $previous->reason_for_leaving }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Name of Employer
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $previous->name_of_employer }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Employer Address
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $previous->employer_address }}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
