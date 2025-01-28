@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')

    <div class="mt-3 overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Gratuity Records</h4>
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
                                        Payment Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        From
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        To
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Gratitude Rate
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Amount Paid
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        File Page Reference
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Checked By
                                    </th>
                                    @role('admin')
                                        <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                            Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @foreach ($gratitudePayments as $gratitudePayment)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $gratitudePayment->date_of_payment }}
                                        </td>

                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $gratitudePayment->from }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $gratitudePayment->to }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $gratitudePayment->amount_paid }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $gratitudePayment->rate_of_gratuity }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $gratitudePayment->file_page_ref }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                            {{ $gratitudePayment->checked_by }}
                                        </td>
                                        @role('admin')
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                <a class="text-danger hover:text-primary-700"
                                                    href="{{ route('admin.staff.gratuity.destroy', $gratitudePayment->id) }}">Delete</a>
                                                <a href="{{ route('admin.staff.promotion.view', $promotion->user_id) }}"
                                                    class="btn btn-sm border-success text-success hover:bg-success hover:text-white">
                                                    View Profile
                                                </a>
                                            </td>
                                        @endrole
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
