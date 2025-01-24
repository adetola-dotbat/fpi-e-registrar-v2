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

                <form class="flex flex-col gap-3" action="{{ route('admin.staff.gratitude.payment.store') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="text" name="user_id" hidden value="{{ $user->id }}">

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="dateOfPayment" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Date of Payment
                        </label>
                        <div class="md:col-span-3">
                            <input type="date" name="date_of_payment" class="form-input" placeholder="Date of Payment">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="fromDate" class="inline-block mb-2 text-sm font-medium text-default-800">From</label>
                        <div class="md:col-span-3">
                            <input type="date" name="from" class="form-input" placeholder="From Date">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="toDate" class="inline-block mb-2 text-sm font-medium text-default-800">To</label>
                        <div class="md:col-span-3">
                            <input type="date" name="to" class="form-input" placeholder="To Date">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="rateOfGratuity" class="inline-block mb-2 text-sm font-medium text-default-800">
                            Rate of Gratuity
                        </label>
                        <div class="md:col-span-3">
                            <input type="number" name="rate_of_gratuity" class="form-input" placeholder="Rate of Gratuity">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="amountPaid" class="inline-block mb-2 text-sm font-medium text-default-800">Amount
                            Paid</label>
                        <div class="md:col-span-3">
                            <input type="number" name="amount_paid" class="form-input" placeholder="Amount Paid">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="filePageRef" class="inline-block mb-2 text-sm font-medium text-default-800">
                            File Page Reference
                        </label>
                        <div class="md:col-span-3">
                            <input type="text" name="file_page_ref" class="form-input" placeholder="File Page Reference">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <label for="checkedBy" class="inline-block mb-2 text-sm font-medium text-default-800">Checked
                            By</label>
                        <div class="md:col-span-3">
                            <input type="text" name="checked_by" class="form-input" placeholder="Checked By">
                        </div>
                    </div>

                    <div class="grid items-center grid-cols-4 gap-6">
                        <div class="md:col-start-2">
                            <button type="submit" class="text-white btn bg-info">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('pages.staffs.partials.short-personal-info')
    </div>
    <div class="mt-3 overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Promotion Records</h4>
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
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action</th>
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

                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-primary hover:text-primary-700"
                                                href="{{ route('admin.staff.gratitude.payment.destroy', $gratitudePayment->id) }}">Delete</a>
                                            <button type="button" class="btn bg-primary text-white edit-btn"
                                                data-id="{{ $gratitudePayment->id }}"
                                                data-date-of-payment="{{ $gratitudePayment->date_of_payment }}"
                                                data-from="{{ $gratitudePayment->from }}"
                                                data-to="{{ $gratitudePayment->to }}"
                                                data-rate-of-gratuity="{{ $gratitudePayment->rate_of_gratuity }}"
                                                data-amount-paid="{{ $gratitudePayment->amount_paid }}"
                                                data-file-page-ref="{{ $gratitudePayment->file_page_ref }}"
                                                data-checked-by="{{ $gratitudePayment->checked_by }}"
                                                data-hs-overlay="#modal-two">
                                                Edit
                                            </button>
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


    <!-- Edit Modal -->
    <div id="modal-two"
        class="hs-overlay w-full h-full fixed top-0 left-0 z-70 transition-all duration-500 overflow-y-auto pointer-events-none hidden">
        <div
            class="translate-y-10 hs-overlay-open:translate-y-0 hs-overlay-open:opacity-100 opacity-0 ease-in-out transition-all duration-500 sm:max-w-lg sm:w-full my-8 sm:mx-auto flex flex-col bg-white shadow-sm rounded">
            <div class="flex flex-col border border-default-200 shadow-sm rounded-lg pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b border-default-200">
                    <h3 class="text-lg font-medium text-default-900">Edit Promotion</h3>
                    <button type="button" class="text-default-600 cursor-pointer" data-hs-overlay="#modal-two">
                        <i class="i-tabler-x text-lg"></i>
                    </button>
                </div>
                <form id="edit-gratitude-payment-form" method="POST"
                    action="{{ route('admin.staff.gratitude.payment.update', 0) }}">
                    @csrf
                    @method('POST')
                    <div class="p-4 overflow-y-auto">
                        <input type="hidden" name="id" id="gratitude-payment-id">

                        <div class="mb-4">
                            <label for="date-of-payment" class="block text-sm font-medium text-default-800">Date of
                                Payment</label>
                            <input type="date" name="date_of_payment" id="date-of-payment" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label for="from" class="block text-sm font-medium text-default-800">From</label>
                            <input type="date" name="from" id="from" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label for="to" class="block text-sm font-medium text-default-800">To</label>
                            <input type="date" name="to" id="to" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label for="rate-of-gratuity" class="block text-sm font-medium text-default-800">Rate of
                                Gratuity</label>
                            <input type="number" name="rate_of_gratuity" id="rate-of-gratuity"
                                class="form-input w-full" placeholder="Rate of Gratuity">
                        </div>

                        <div class="mb-4">
                            <label for="amount-paid" class="block text-sm font-medium text-default-800">Amount
                                Paid</label>
                            <input type="number" name="amount_paid" id="amount-paid" class="form-input w-full"
                                placeholder="Amount Paid">
                        </div>

                        <div class="mb-4">
                            <label for="file-page-ref" class="block text-sm font-medium text-default-800">File Page
                                Reference</label>
                            <input type="text" name="file_page_ref" id="file-page-ref" class="form-input w-full"
                                placeholder="File Page Reference">
                        </div>

                        <div class="mb-4">
                            <label for="checked-by" class="block text-sm font-medium text-default-800">Checked By</label>
                            <input type="text" name="checked_by" id="checked-by" class="form-input w-full"
                                placeholder="Checked By">
                        </div>

                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-default-200">
                        <button type="button" class="btn bg-primary text-white"
                            data-hs-overlay="#modal-two">Close</button>
                        <button type="submit" class="btn bg-primary text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const paymentId = this.getAttribute('data-id');
                const dateOfPayment = this.getAttribute('data-date-of-payment');
                const fromDate = this.getAttribute('data-from');
                const toDate = this.getAttribute('data-to');
                const rateOfGratuity = this.getAttribute('data-rate-of-gratuity');
                const amountPaid = this.getAttribute('data-amount-paid');
                const filePageRef = this.getAttribute('data-file-page-ref');
                const checkedBy = this.getAttribute('data-checked-by');

                // Populate the modal fields with the data
                document.getElementById('gratitude-payment-id').value = paymentId;
                document.getElementById('date-of-payment').value = dateOfPayment;
                document.getElementById('from').value = fromDate;
                document.getElementById('to').value = toDate;
                document.getElementById('rate-of-gratuity').value = rateOfGratuity;
                document.getElementById('amount-paid').value = amountPaid;
                document.getElementById('file-page-ref').value = filePageRef;
                document.getElementById('checked-by').value = checkedBy;
            });
        });
    </script>
@endpush
