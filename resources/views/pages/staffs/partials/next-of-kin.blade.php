@if (!is_null($user->nextOfKins))
    <div class="overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Next of Kin</h4>
        </div>
        <div class="p-4">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden border rounded-lg shadow">
                        <table class="min-w-full divide-y divide-default-200">
                            @foreach ($user->nextOfKins as $kin)
                                <tbody class="divide-y divide-default-200">
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-bold whitespace-nowrap text-default-800">
                                            Relationship
                                        </td>
                                        <td class="px-6 py-4 text-sm font-bold whitespace-nowrap text-default-800">
                                            {{ $kin->relationship->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Fullname
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $kin->fullname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Phone
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $kin->phone_number }}
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
