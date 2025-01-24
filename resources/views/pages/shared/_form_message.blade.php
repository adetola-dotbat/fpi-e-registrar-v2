@if (Session::has('success'))
    <div id="dismiss-alert"
        class="p-4 mb-3 transition duration-300 border border-teal-200 rounded-md hs-removing:translate-x-5 hs-removing:opacity-0 bg-teal-50"
        role="alert">
        <div class="flex items-center gap-3">
            <i class="text-xl i-tabler-circle-check"></i>
            <div class="flex-grow">
                <div class="text-sm font-medium text-teal-800">
                    {{ Session::get('success') }}
                </div>
            </div>
            <button data-hs-remove-element="#dismiss-alert" type="button" id="dismiss-test"
                class="flex items-center justify-center w-8 h-8 rounded-full ms-auto bg-default-200">
                <i class="text-xl i-tabler-x"></i>
            </button>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="p-4 text-sm rounded-md bg-danger/25 text-danger" role="alert">
        <span class="font-bold">Error!</span> {{ Session::get('error') }}
    </div>
@endif
