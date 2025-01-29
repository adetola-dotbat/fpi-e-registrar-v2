<header class="sticky top-0 z-50 flex items-center bg-white app-header min-h-topbar">
    <div class="flex items-center justify-between w-full gap-4 px-6">
        <div class="flex items-center gap-5">
            <!-- Sidenav Menu Toggle Button -->
            <button
                class="flex items-center p-2 transition-all bg-white border rounded-full cursor-pointer text-default-500 border-default-200 hover:bg-primary/15 hover:text-primary hover:border-primary/5"
                data-hs-overlay="#app-menu" aria-label="Toggle navigation">
                <i class="text-2xl i-lucide-align-left"></i>
            </button>

            <!-- Topbar Brand Logo -->
            <a class="flex md:hidden">
                <img src="{{ asset('upload/passports/' . auth()->user()->passport) }}" class="h-5" alt="Small logo">
                <img src="{{ auth()->user()->passport ? asset('upload/passports/' . auth()->user()->passport) : asset('/assets/images/logo-sm.png') }}"
                    class="h-5" alt="Small logo">
            </a>
        </div>





        <div class="flex items-center gap-5">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button"
                    class="hs-dropdown-toggle inline-flex items-center p-2 rounded-full bg-white border border-default-200 hover:bg-primary/15 hover:text-primary transition-all">
                    <i class="i-lucide-bell text-2xl"></i>
                    @if (auth()->user()->unreadNotifications->count() > 0)
                        <span
                            class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold leading-none text-white bg-red-500 rounded-full">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                </button>

                <!-- Dropdown menu -->
                <div
                    class="hs-dropdown-menu duration mt-2 w-full max-w-sm rounded-lg border border-default-200 bg-white opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 hidden">
                    <div class="block px-4 py-2 font-medium text-center text-default-700 rounded-t-lg bg-default-50">
                        Notifications
                        <form action="{{ route('notifications.markAllRead') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs text-primary hover:underline">
                                Mark All as Read
                            </button>
                        </form>
                    </div>

                    <div class="divide-y divide-default-100">
                        @forelse(auth()->user()->unreadNotifications as $notification)
                            <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                class="flex px-4 py-3 hover:bg-default-100">
                                <div class="flex-shrink-0">
                                    <div class="rounded-full w-11 h-11 bg-gray-200 flex items-center justify-center">
                                        <i class="i-tabler-bell text-xl text-gray-600"></i>
                                    </div>
                                </div>
                                <div class="w-full ps-3">
                                    <div class="text-default-500 text-sm mb-1.5">
                                        {{ $notification->data['message'] ?? 'You have a new notification.' }}
                                    </div>
                                    <div class="text-xs text-primary">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="px-4 py-3 text-default-500 text-sm text-center">
                                No new notifications.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>


            <!-- Fullscreen Toggle Button -->
            <div class="hidden md:flex">
                <button data-toggle="fullscreen" type="button"
                    class="p-2 transition-all bg-white border rounded-full border-default-200 hover:bg-primary/15 hover:text-primary">
                    <span class="sr-only">Fullscreen Mode</span>
                    <span class="flex items-center justify-center size-6">
                        <i class="i-lucide-maximize text-2xl flex group-[-fullscreen]:hidden"></i>
                        <i class="i-lucide-minimize text-2xl hidden group-[-fullscreen]:flex"></i>
                    </span>
                </button>
            </div>

            <!-- Profile Dropdown Button -->
            <div class="relative">
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button type="button" class="hs-dropdown-toggle">
                        <img src="{{ auth()->user()->passport ? asset('upload/passports/' . auth()->user()->passport) : asset('/assets/images/logo-sm.png') }}"
                            alt="user-image" class="h-10 rounded-full">
                    </button>
                    <div
                        class="hs-dropdown-menu duration mt-2 min-w-48 rounded-lg border border-default-200 bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 hidden">

                        {{-- <a class="flex items-center px-3 py-2 text-sm rounded-md text-default-800 hover:bg-default-100"
                            href="{{ route('staff.profile.view', auth()->id()) }}">
                            Profile
                        </a> --}}

                        {{-- <hr class="my-2 -mx-2"> --}}

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>

                        <a class="flex items-center px-3 py-2 text-sm rounded-md text-default-800 hover:bg-default-100 cursor-pointer"
                            href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
