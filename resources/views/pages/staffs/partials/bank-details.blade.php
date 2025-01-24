@if ($user->staffBankDetails->isNotEmpty())
    <div class="card-header">
        <h4 class="card-title">Bank Details</h4>
    </div>
    <div class="p-4">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden border rounded-lg shadow">
                    <table class="min-w-full divide-y divide-default-200">
                        @foreach ($user->staffBankDetails as $bankDetail)
                            <tbody class="divide-y divide-default-200">
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        Account Name
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                        {{ $bankDetail->account_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        Account Number
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                        {{ $bankDetail->account_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        Bank Name
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                        {{ $bankDetail->bank_name }}
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
