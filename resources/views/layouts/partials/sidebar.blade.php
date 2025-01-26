<aside id="app-menu"
    class="hs-overlay fixed inset-y-0 start-0 z-60 hidden w-sidenav min-w-sidenav bg-green-900 overflow-y-auto -translate-x-full transform transition-all duration-200 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--body-scroll:true] [--overlay-backdrop:true] lg:[--overlay-backdrop:false]">

    <div class="flex flex-col h-full">
        <!-- Sidenav Logo -->
        <div class="sticky top-0 flex items-center justify-center px-6 h-topbar">
            <a href='/'>
                <img src="/assets/images/logo2x.png" alt="logo" class="">
            </a>
        </div>

        <div class="p-4 h-[calc(100%-theme('spacing.topbar'))] flex-grow" data-simplebar>
            <!-- Menu -->
            <ul class="flex flex-col w-full gap-1 admin-menu hs-accordion-group">
                <li class="px-3 py-2 text-xs font-medium uppercase text-default-500">Menu</li>

                <li class="menu-item">
                    <a class="{{ request()->routeIs('dashboard') ? 'active' : '' }} group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                        href="{{ route('dashboard') }}">
                        <i class="i-lucide-airplay size-5"></i>
                        Dashboard
                    </a>
                </li>
                @if (auth()->user()->hasRole('admin'))
                    <li
                        class="menu-item hs-accordion {{ request()->routeIs('staff.index') ? 'hs-accordion-active' : '' }}">
                        <a href="javascript:void(0)"
                            class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5
                        {{ request()->routeIs('staff.index') ? 'hs-accordion-active:bg-default-100/5 hs-accordion-active:text-default-100' : '' }}">
                            <i class="i-lucide-user-circle size-5"></i>
                            <span class="menu-text"> Staffs </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <div
                            class="hs-accordion-content {{ request()->routeIs('staff.index') ? 'block' : 'hidden' }} w-full overflow-hidden transition-[height] duration-300">
                            <ul class="mt-1 space-y-1">
                                <li class="menu-item">
                                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-1.5 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                                        href="{{ route('admin.staff.index', ['type' => 'academic']) }}">
                                        <i class="menu-dot"></i>
                                        Academic Staff
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="{{ request()->routeIs('staff.index') ? 'active' : '' }} flex items-center gap-x-3.5 rounded-md px-3 py-1.5 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                                        href="{{ route('admin.staff.index', ['type' => 'non teaching']) }}">
                                        <i class="menu-dot"></i>
                                        Non-Teaching Staff
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a class="{{ request()->routeIs('admin.staff.promotion.index') ? 'active' : '' }} group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                            href="{{ route('admin.staff.promotion.index') }}">
                            <i class="i-lucide-clipboard size-5"></i>

                            Promotion Management
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="{{ request()->routeIs('admin.staff.leave.index') ? 'active' : '' }} group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                            href="{{ route('admin.staff.leave.index') }}">
                            <i class="i-lucide-table size-5"></i>

                            Leave Management
                        </a>
                    </li>

                    {{-- <li class="menu-item">
                        <a class="{{ request()->routeIs('admin.staff.report') ? 'active' : '' }} group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                            href="{{ route('admin.staff.report') }}">
                            <i class="i-lucide-user-circle size-5"></i>
                            Requests
                        </a>
                    </li> --}}

                    <li class="px-3 py-2 text-xs font-medium uppercase text-default-500">App</li>


                    <li class="menu-item">
                        <a class='group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5'
                            href='{{ url('admin/staffs/reports') }}'>
                            <i class="i-lucide-user-circle size-5"></i>
                            Reports
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class='group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5'
                            href='{{ route('admin.user.index') }}'>
                            <i class="i-lucide-user-circle size-5"></i>
                            Users Management
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class='group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5'
                            href='app-calendar.html'>
                            <i class="i-lucide-calendar size-5"></i>
                            Staff Steps
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class='group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5'
                            href='app-gallery.html'>
                            <i class="i-lucide-image size-5"></i>
                            Staff Cadre
                        </a>
                    </li>
                @endif
                @role('subadmin|member')
                    @include('layouts.partials._sub-admin-sidebar')
                @endrole
                @if (auth()->user()->account_type != 'management')
                    @include('layouts.partials._staff-sidebar')
                @endif
            </ul>
        </div>
    </div>
</aside>
