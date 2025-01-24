@extends('layouts.app')

@section('content')
    @include('pages.staffs.partials.actions')
    <div class="grid gap-6 mt-8 lg:grid-cols-2">

        @include('pages.staffs.partials.personal-info')
        <div class="card">
            <div class="flex items-center justify-between card-header">
                <div class="">
                    <h5 class="mb-1 text-lg font-medium capitalize text-default-950">Other Staff Information</h5>
                    <p class="text-sm font-medium text-default-600">Click the sections below to
                        expand/collapse the section content..</p>
                </div>
            </div>
            <div class="card-body">
                <div class="hs-accordion-group">
                    <div class="hs-accordion" id="basic-heading-one">
                        <button
                            class="inline-flex items-center w-full py-3 font-semibold text-left transition hs-accordion-toggle hs-accordion-active:text-primary group gap-x-3 text-default-800 hover:text-default-500"
                            aria-controls="hs-basic-collapse-one">
                            <i
                                class="block w-3 h-3 i-tabler-plus hs-accordion-active:hidden hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            <i
                                class="hidden w-3 h-3 i-tabler-minus hs-accordion-active:block hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            Academic Details
                        </button>
                        <div id="basic-collapse-one"
                            class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                            aria-labelledby="#basic-heading-one" style="height: 0px;">
                            @include('pages.staffs.partials.academic-details')
                        </div>
                    </div>
                    <div class="hs-accordion" id="basic-heading-two">
                        <button
                            class="inline-flex items-center w-full py-3 font-semibold text-left transition hs-accordion-toggle hs-accordion-active:text-primary group gap-x-3 text-default-800 hover:text-default-500"
                            aria-controls="hs-basic-collapse-one">
                            <i
                                class="block w-3 h-3 i-tabler-plus hs-accordion-active:hidden hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            <i
                                class="hidden w-3 h-3 i-tabler-minus hs-accordion-active:block hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            Bank Details
                        </button>
                        <div id="basic-collapse-one"
                            class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                            aria-labelledby="#basic-heading-one" style="height: 0px;">
                            @include('pages.staffs.partials.bank-details')
                        </div>
                    </div>

                    <div class="hs-accordion" id="basic-heading-three">
                        <button
                            class="inline-flex items-center w-full py-3 font-semibold text-left transition hs-accordion-toggle hs-accordion-active:text-primary group gap-x-3 text-default-800 hover:text-default-500"
                            aria-controls="hs-basic-collapse-three">
                            <i
                                class="block w-3 h-3 i-tabler-plus hs-accordion-active:hidden hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            <i
                                class="hidden w-3 h-3 i-tabler-minus hs-accordion-active:block hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            Employee Details
                        </button>
                        <div id="basic-collapse-three"
                            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                            aria-labelledby="#basic-heading-three" style="height: 0px;">
                            @include('pages.staffs.partials.employee-details')

                        </div>
                    </div>


                    <div class="hs-accordion" id="basic-heading-four">
                        <button
                            class="inline-flex items-center w-full py-3 font-semibold text-left transition hs-accordion-toggle hs-accordion-active:text-primary group gap-x-3 text-default-800 hover:text-default-500"
                            aria-controls="hs-basic-collapse-one">
                            <i
                                class="block w-3 h-3 i-tabler-plus hs-accordion-active:hidden hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            <i
                                class="hidden w-3 h-3 i-tabler-minus hs-accordion-active:block hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            Emergency
                        </button>
                        <div id="basic-collapse-one"
                            class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                            aria-labelledby="#basic-heading-one" style="height: 0px;">
                            @include('pages.staffs.partials.emergency')
                        </div>
                    </div>

                    <div class="hs-accordion" id="basic-heading-five">
                        <button
                            class="inline-flex items-center w-full py-3 font-semibold text-left transition hs-accordion-toggle hs-accordion-active:text-primary group gap-x-3 text-default-800 hover:text-default-500"
                            aria-controls="hs-basic-collapse-five">
                            <i
                                class="block w-3 h-3 i-tabler-plus hs-accordion-active:hidden hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            <i
                                class="hidden w-3 h-3 i-tabler-minus hs-accordion-active:block hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            Next of Kin
                        </button>
                        <div id="basic-collapse-five"
                            class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                            aria-labelledby="#basic-heading-five" style="height: 0px;">
                            @include('pages.staffs.partials.next-of-kin')
                        </div>
                    </div>

                    <div class="hs-accordion" id="basic-heading-six">
                        <button
                            class="inline-flex items-center w-full py-3 font-semibold text-left transition hs-accordion-toggle hs-accordion-active:text-primary group gap-x-3 text-default-800 hover:text-default-500"
                            aria-controls="hs-basic-collapse-six">
                            <i
                                class="block w-3 h-3 i-tabler-plus hs-accordion-active:hidden hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            <i
                                class="hidden w-3 h-3 i-tabler-minus hs-accordion-active:block hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            Professional Details
                        </button>
                        <div id="basic-collapse-six"
                            class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                            aria-labelledby="#basic-heading-six" style="height: 0px;">
                            @include('pages.staffs.partials.professional-details')
                        </div>
                    </div>

                    <div class="hs-accordion" id="basic-heading-seven">
                        <button
                            class="inline-flex items-center w-full py-3 font-semibold text-left transition hs-accordion-toggle hs-accordion-active:text-primary group gap-x-3 text-default-800 hover:text-default-500"
                            aria-controls="hs-basic-collapse-seven">
                            <i
                                class="block w-3 h-3 i-tabler-plus hs-accordion-active:hidden hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            <i
                                class="hidden w-3 h-3 i-tabler-minus hs-accordion-active:block hs-accordion-active:text-primary-600 text-default-600 group-hover:text-default-500"></i>
                            Previous Employment Details
                        </button>
                        <div id="basic-collapse-seven"
                            class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                            aria-labelledby="#basic-heading-seven" style="height: 0px;">
                            @include('pages.staffs.partials.previous-employment')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
