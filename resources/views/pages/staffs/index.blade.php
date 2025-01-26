@extends('layouts.app')
@section('pageTitle', $pageTitle)
@push('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <style>
        .dataTables_wrapper {
            padding: 15px !important;
        }
    </style>
@endpush
@section('content')

    <div class="overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">Staffs Table</h4>
        </div>
        <div>
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table id="staffTable" class="min-w-full divide-y divide-default-200">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Fullname</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Marital Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Gender
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Cadre
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-end text-default-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="odd:bg-white even:bg-default-100 hover:bg-default-100">
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ Str::title($user->fullname) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $user->phone_no }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $user->marital_status }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ $user->gender }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                            {{ optional($user->staffDetail)->grade_level }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                            <a class="text-success hover:text-primary-700"
                                                href="{{ route('admin.staff.view', $user->id) }}"><i
                                                    class="i-tabler-external-link text-success"></i></a>
                                            <a class="text-danger hover:text-primary-700"
                                                href="{{ route('admin.staff.destroy', $user->id) }}"><i
                                                    class="material-symbols-rounded">delete</i></a>
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
@endsection
@push('scripts')
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Buttons Extension JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- JSZip for Excel Export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- pdfmake for PDF Export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script>
        $(document).ready(function() {
            $('#staffTable').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                ordering: true,
                columnDefs: [{
                    orderable: false,
                    targets: [0], // Disable ordering for the S/N column
                }],
                dom: 'Bfrtip', // Include the buttons in the DataTable DOM
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Staff Data',
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Staff Data',
                        orientation: 'landscape', // Optional: adjust orientation for better display
                        pageSize: 'A4', // Optional: set PDF page size
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'Staff Data',
                    },
                    {
                        extend: 'print',
                        title: 'Staff Data',
                    },
                ],
            });
        });
    </script>
@endpush
