<div class="overflow-hidden card">
    <div class="card-header">
        <h4 class="card-title">Personal Information</h4>
    </div>
    <div class="relative">
        <div class="relative w-full h-44">
            <img class="object-cover w-full h-full" src="{{ asset('upload/passports/' . $user->passport) }}"
                alt="Cover Image">
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            </div>
        </div>

        <!-- Profile Image with Status -->
        <div class="absolute transform -translate-x-1/2 -bottom-14 start-1/2">
            <div class="relative">
                <img class="border-4 border-white rounded-full shadow-md w-28 h-28"
                    src="{{ asset('upload/passports/' . $user->passport) }}" alt="Profile Picture">
                <span class="absolute w-5 h-5 bg-green-500 border-2 border-white rounded-full bottom-1 end-1"></span>
            </div>
        </div>

    </div>

    <!-- Name, Title, and Location -->
    <div class="pt-16 pb-4 text-center">
        <h2 class="mb-2 text-xl font-semibold text-default-700"> {{ ucfirst($user->title) }}.
            {{ $user->fullname }}
        </h2>
        <p class="text-sm text-default-600">{{ $user->email }}</p>
        <span class="text-xs text-default-400">{{ $user->employee_file_no }}</span>
    </div>
    @hasanyrole('admin|subadmin|manager')
        <div class="flex justify-center px-6 pb-4 space-x-4">
            <a href="{{ route('admin.staff.view', $user->id) }}"
                class="btn border-primary text-primary hover:bg-primary hover:text-white">View Profile</a>
        </div>
    @endhasanyrole
</div>
