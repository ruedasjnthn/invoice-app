<nav x-data="{ open: false }"
    class="bg-[#373B53] dark:bg-[#1E2139] flex xl:rounded-r-[20px] xl:max-w-[6.5rem] xl:h-screen justify-between xl:flex-col">
    <a href="{{ route('invoice.index') }}">
        <x-application-logo />
    </a>

    <!-- Settings Dropdown -->
    <div class="flex items-center px-6 md:px-8 xl:py-6 xl:px-0 xl:justify-center border-l border-[#494E6E] xl:border-l-0 xl:border-t">
        <x-dropdown align="left">
            <x-slot name="trigger">
                <button>
                    <img src="{{ asset('images/profile-pic.jpg') }}" alt="" class="rounded-full">
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>
