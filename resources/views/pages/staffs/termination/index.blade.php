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

                <div class="flex border-b border-gray-200">
                    <button
                        class="tab-btn flex-1 py-2 text-center font-medium text-gray-500 hover:text-blue-600 border-b-2 border-transparent focus:outline-none"
                        onclick="openTab('resignation', 'resignationTable')">Resignation</button>
                    <button
                        class="tab-btn flex-1 py-2 text-center font-medium text-gray-500 hover:text-blue-600 border-b-2 border-transparent focus:outline-none"
                        onclick="openTab('death', 'deathTable')">Death</button>
                    <button
                        class="tab-btn flex-1 py-2 text-center font-medium text-gray-500 hover:text-blue-600 border-b-2 border-transparent focus:outline-none"
                        onclick="openTab('transfer', 'transferTable')">Transfer</button>
                </div>

                <!-- Tab Contents -->
                <div class="p-4">
                    <!-- Resignation Form -->
                    <div id="resignation" class="tab-content">
                        <h2 class="text-xl font-semibold mb-4">Termination By Resignation</h2>
                        <form class="flex flex-col gap-3" action="{{ route('admin.staff.termination.resignation.store') }}"
                            method="post">
                            @csrf
                            @method('post')
                            <input type="text" name="user_id" hidden value="{{ $user->id }}">

                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Date Terminated</label>
                                <div class="col-span-3">
                                    <input type="date" name="date_terminated" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Type</label>
                                <div class="col-span-3">
                                    <input type="text" name="type" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Pension Amount</label>
                                <div class="col-span-3">
                                    <input type="number" name="pension_amount" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Pension From</label>
                                <div class="col-span-3">
                                    <input type="text" name="pension_from" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Gratuity Amount</label>
                                <div class="col-span-3">
                                    <input type="text" name="gratuity_amount" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Contract Gratuity</label>
                                <div class="col-span-3">
                                    <input type="text" name="contract_gratuity" class="form-input w-full">
                                </div>
                            </div>
                            <button type="submit" class="btn bg-blue-500 text-white py-2 px-4 rounded">Save</button>
                        </form>
                    </div>

                    <!-- Death Form -->
                    <div id="death" class="tab-content hidden">
                        <h2 class="text-xl font-semibold mb-4">Termination By Death</h2>
                        <form class="flex flex-col gap-3" action="{{ route('admin.staff.termination.death.store') }}"
                            method="post">
                            <input type="text" name="user_id" hidden value="{{ $user->id }}">

                            @csrf
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Date of Death</label>
                                <div class="col-span-3">
                                    <input type="date" name="date_of_death" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Estate Gratuity</label>
                                <div class="col-span-3">
                                    <input type="text" name="estate_gratuity" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Widow Pension</label>
                                <div class="col-span-3">
                                    <input type="text" name="widow_pension" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Widow Pension From</label>
                                <div class="col-span-3">
                                    <input type="text" name="widow_pension_from" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Orphan Pension</label>
                                <div class="col-span-3">
                                    <input type="text" name="orphan_pension" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Orphan Pension
                                    From</label>
                                <div class="col-span-3">
                                    <input type="text" name="orphan_pension_from" class="form-input w-full">
                                </div>
                            </div>
                            <button type="submit" class="btn bg-blue-500 text-white py-2 px-4 rounded">Save</button>
                        </form>
                    </div>

                    <!-- Transfer Form -->
                    <div id="transfer" class="tab-content hidden">
                        <h2 class="text-xl font-semibold mb-4">Termination By Transfer</h2>
                        <form class="flex flex-col gap-3" action="{{ route('admin.staff.termination.transfer.store') }}"
                            method="post">
                            <input type="text" name="user_id" hidden value="{{ $user->id }}">

                            @csrf
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Transfer Date</label>
                                <div class="col-span-3">
                                    <input type="date" name="transfer_date" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Type</label>
                                <div class="col-span-3">
                                    <input type="text" name="type" class="form-input w-full">
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-4 gap-6 mb-4">
                                <label class="inline-block text-sm font-medium text-default-800">Aggregate Service</label>
                                <div class="col-span-3">
                                    <input type="text" name="aggregate_service" class="form-input w-full">
                                </div>
                            </div>
                            <button type="submit" class="btn bg-blue-500 text-white py-2 px-4 rounded">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('pages.staffs.partials.short-personal-info')
    </div>
    <div class="mt-3 overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Service Termination Records</h4>
        </div>
        @if (!is_null($terminationByResignation))
            <div id="resignationTable" class="tab-content">
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
                                            <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-default-200">
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
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                <a class="text-primary hover:text-primary-700"
                                                    href="{{ route('admin.staff.termination.resignation.destroy', $terminationByResignation->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (!is_null($terminationByDeath))
            <div id="deathTable" class="tab-content hidden">
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
                                            <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-default-200">
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
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                <a class="text-primary hover:text-primary-700"
                                                    href="{{ route('admin.staff.termination.death.destroy', $terminationByDeath->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (!is_null($terminationByTransfer))
            <div id="transferTable" class="tab-content hidden">
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
                                            <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-default-200">
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
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                <a class="text-primary hover:text-primary-700"
                                                    href="{{ route('admin.staff.termination.transfer.destroy', $terminationByTransfer->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
