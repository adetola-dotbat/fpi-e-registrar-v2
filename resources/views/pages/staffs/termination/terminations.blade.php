@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')

    <div class="mt-3 overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Service Termination Records</h4>
        </div>
        @if ($terminationByResignations->isNotEmpty())
            <div class="p-4">
                <div class="overflow-x-auto custom-scroll">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-default-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Date Terminated
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Pension
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Pension From
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Gratuity
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Contract Gratuity
                                        </th>
                                        @role('admin')
                                            <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                                Action</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-default-200">
                                    @foreach ($terminationByResignations as $terminationByResignation)
                                        <tr>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                                {{ $terminationByResignation->date_terminated }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByResignation->type }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByResignation->pension_amount }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByResignation->pension_from }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByResignation->gratuity_amount }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByResignation->contract_gratuity }}
                                            </td>
                                            @role('admin')
                                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                    <a href="{{ route('admin.staff.termination', $terminationByResignation->user_id) }}"
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
        @endif
        @if ($terminationByDeaths->isNotEmpty())
            <div class="p-4">
                <div class="overflow-x-auto custom-scroll">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-default-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Date of Death
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Estate Gratuity
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Widow Pension
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Widow Pension From
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Orphan Pension
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Orphan Pension From
                                        </th>
                                        @role('admin')
                                            <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                                Action</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-default-200">
                                    @foreach ($terminationByDeaths as $terminationByDeath)
                                        <tr>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                                {{ $terminationByDeath->date_of_death }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByDeath->estate_gratuity }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByDeath->widow_pension }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByDeath->widow_pension_from }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByDeath->orphan_pension }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByDeath->orphan_pension_from }}
                                            </td>
                                            @role('admin')
                                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                    <a href="{{ route('admin.staff.termination', $terminationByDeath->user_id) }}"
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
        @endif
        @if ($terminationByTransfers->isNotEmpty())
            <div class="p-4">
                <div class="overflow-x-auto custom-scroll">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-default-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Transfer Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                            Aggregate Service
                                        </th>
                                        @role('admin')
                                            <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                                Action</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-default-200">
                                    @foreach ($terminationByTransfers as $terminationByTransfer)
                                        <tr>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                                {{ $terminationByTransfer->transfer_date }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByTransfer->type }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                                                {{ $terminationByTransfer->aggregate_service }}
                                            </td>
                                            @role('admin')
                                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                    <a href="{{ route('admin.staff.termination', $terminationByDeath->user_id) }}"
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
        @endif

    </div>
@endsection

@push('scripts')
    <script src="/assets/libs/shufflejs/shuffle.min.js"></script>
    <script src="/assets/js/pages/gallery.js"></script>

    <script>
        function openTab(...tabIds) {
            const allTabs = document.querySelectorAll('.tab-content');
            allTabs.forEach(tab => tab.classList.add('hidden'));

            tabIds.forEach(id => {
                const tab = document.getElementById(id);
                if (tab) {
                    tab.classList.remove('hidden');
                }
            });

            const allButtons = document.querySelectorAll('.tab-btn');
            allButtons.forEach(button => button.classList.remove('text-blue-600', 'border-blue-600'));
            tabIds.forEach(id => {
                const button = document.querySelector(`[onclick*="${id}"]`);
                if (button) {
                    button.classList.add('text-blue-600', 'border-blue-600');
                }
            });
        }
    </script>
@endpush
