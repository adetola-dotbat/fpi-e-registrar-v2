@if (!is_null($user->staffProfessionalDetails))

    <div class="overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Professional Details</h4>
        </div>
        <div class="p-4">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden border rounded-lg shadow">
                        <table class="min-w-full divide-y divide-default-200">
                            @foreach ($user->staffProfessionalDetails as $detail)
                                <tbody class="divide-y divide-default-200">
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-bold whitespace-nowrap text-default-800">
                                            Profession name
                                        </td>
                                        <td class="px-6 py-4 text-sm font-bold whitespace-nowrap text-default-800">
                                            {{ $detail->professional_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Certificate
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            <a href="{{ asset('upload/profession_body/' . $detail->certificate) }}"
                                                target="_blank"
                                                class="btn btn-sm border-success text-success hover:bg-success hover:text-white"><i
                                                    class="material-symbols-rounded">file_download</i> View
                                                Document</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            Date
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $detail->year }}
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
