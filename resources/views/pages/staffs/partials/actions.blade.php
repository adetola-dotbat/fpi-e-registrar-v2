@hasanyrole('subadmin|admin')
    <div class="card">
        <div class="p-5">
            <h4 class="mb-4 card-title">Actions</h4>

            <div class="flex flex-wrap items-center gap-3">
                <a type="button" href="{{ route('admin.staff.transfer', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Transfer</a>
                <a type="button" href="{{ route('admin.staff.promotion', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Promotion</a>
                <a type="button" href="{{ route('admin.staff.acting.appointment', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Acting
                    Appointment</a>
                <a type="button" href="{{ route('admin.staff.gratitude.payment', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Gratitude
                    Payment</a>
                <a type="button" href="{{ route('admin.staff.public.service.view', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Service</a>
                <a type="button" href="{{ route('admin.staff.commendation.view', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Commendation</a>
                <a type="button" href="{{ route('admin.staff.bank.details.view', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Bank
                    Details</a>
                <a type="button" href="{{ route('admin.staff.termination', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Termination</a>
                <a type="button" href="{{ route('admin.staff.institution.attended.view', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Institution
                    Attended</a>
                <a type="button" href="{{ route('admin.staff.professional.details.view', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Professional
                    Details</a>
                <a type="button" href="{{ route('admin.staff.leave.view', $user->id) }}"
                    class="border rounded-full btn border-success text-success hover:bg-success hover:text-white">Leave</a>
            </div>
        </div>
    </div>
@endhasanyrole
