@if ($user->staffInstitutionsAttended->isNotEmpty())
    <div class="overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Academic Details</h4>
        </div>
        <div class="p-4">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden border rounded-lg shadow">
                        <table class="min-w-full divide-y divide-default-200">
                            @foreach ($user->staffInstitutionsAttended->where('approved_status', 'approved') as $academic)
                                <tbody class="divide-y divide-default-200">
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-bold whitespace-nowrap text-default-800">
                                            School Name
                                        </td>
                                        <td class="px-6 py-4 text-sm font-bold whitespace-nowrap text-default-800">
                                            {{ $academic->school_name }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Date
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $academic->date_obtained }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Certificate
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">

                                            <a href="{{ asset('upload/school_certificates/' . $academic->certificate) }}"
                                                target="_blank"
                                                class="btn btn-sm border-success text-success hover:bg-success hover:text-white"><i
                                                    class="material-symbols-rounded">file_download</i> View
                                                Document</a>
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
