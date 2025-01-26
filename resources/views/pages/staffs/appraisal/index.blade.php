@extends('layouts.app')
@section('pageTitle', $pageTitle)

@section('content')
    <div class="mt-3 overflow-hidden card">
        <div class="card-header">
            <h4 class="card-title">{{ Str::plural($pageTitle) }}</h4>
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
                                        Appraisal</th>
                                    <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                                        Form
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        1
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        BEST NON-TEACHING SENIOR
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        <div class="hs-tooltip">
                                            <a href="https://www.federalpolyilaro.edu.ng/storage/document/Best%20Non-Teaching%20Senior%20Staff%20of%20the%20Year_1727454638.pdf"
                                                target="_blank" class="text-primary-500 hover:underline group relative"
                                                data-fc-placement="bottom">
                                                <i class="i-tabler-external-link text-success"></i>
                                            </a>
                                            <span
                                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-default-900 text-xs font-medium text-white rounded shadow-sm"
                                                role="tooltip">
                                                View Document
                                            </span>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        2
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        BEST JUNIOR STAFF OF THE YEAR
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        <div class="hs-tooltip">
                                            <a href="https://www.federalpolyilaro.edu.ng/storage/document/Best%20Junior%20Staff%20of%20the%20Year_1727454620.pdf"
                                                target="_blank" class="text-primary-500 hover:underline group relative"
                                                data-fc-placement="bottom">
                                                <i class="i-tabler-external-link text-success"></i>
                                            </a>
                                            <span
                                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-default-900 text-xs font-medium text-white rounded shadow-sm"
                                                role="tooltip">
                                                View Document
                                            </span>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        3
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        BEST ACADEMIC STAFF OF THE YEAR
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        <div class="hs-tooltip">
                                            <a href="https://www.federalpolyilaro.edu.ng/storage/document/Best%20Academic%20Staff%20of%20the%20Year_1727454597.pdf"
                                                target="_blank" class="text-primary-500 hover:underline group relative"
                                                data-fc-placement="bottom">
                                                <i class="i-tabler-external-link text-success"></i>
                                            </a>
                                            <span
                                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-default-900 text-xs font-medium text-white rounded shadow-sm"
                                                role="tooltip">
                                                View Document
                                            </span>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        4
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        BEST RESEARCHER OF THE YEAR
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                                        <div class="hs-tooltip">
                                            <a href="https://www.federalpolyilaro.edu.ng/storage/document/Best%20Researcher%20of%20the%20Year_1727454544.pdf"
                                                target="_blank" class="text-primary-500 hover:underline group relative"
                                                data-fc-placement="bottom">
                                                <i class="i-tabler-external-link text-success"></i>
                                            </a>
                                            <span
                                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-default-900 text-xs font-medium text-white rounded shadow-sm"
                                                role="tooltip">
                                                View Document
                                            </span>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
