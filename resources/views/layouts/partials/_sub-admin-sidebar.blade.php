<li class="menu-item hs-accordion {{ request()->routeIs('staff.index') ? 'hs-accordion-active' : '' }}">
    <a href="javascript:void(0)"
        class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5
        {{ request()->routeIs('staff.index') ? 'hs-accordion-active:bg-default-100/5 hs-accordion-active:text-default-100' : '' }}">
        <i class="i-lucide-user-circle size-5"></i>
        <span class="menu-text"> Staff Management </span>
        <span class="menu-arrow"></span>
    </a>

    <div
        class="hs-accordion-content {{ request()->routeIs('staff.index') ? 'block' : 'hidden' }} w-full overflow-hidden transition-[height] duration-300">
        <ul class="mt-1 space-y-1">
            <li class="menu-item">
                <a class="{{ request()->routeIs('staff.index') ? 'active' : '' }} flex items-center gap-x-3.5 rounded-md px-3 py-1.5 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                    href="{{ route('admin.staff.index') }}">
                    <i class="menu-dot"></i>
                    Add Staff
                </a>
            </li>
            <li class="menu-item">
                <a class="{{ request()->routeIs('staff.index') ? 'active' : '' }} flex items-center gap-x-3.5 rounded-md px-3 py-1.5 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                    href="{{ route('admin.staff.index') }}">
                    <i class="menu-dot"></i>
                    Staff List
                </a>
            </li>
        </ul>
    </div>
</li>
