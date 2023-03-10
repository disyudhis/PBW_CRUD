<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
            <div>
                <x-input-label for="username" :value="__('Username')" />

                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                    required autofocus />

                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Full Name -->
            <div>
                <x-input-label for="fullname" :value="__('Full Name')" />

                <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')"
                    required autofocus />

                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Phone Number --}}
            <div class="mt-4">
                <x-input-label for="phoneNumber" :value="__('Phone Number')" />

                <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="old('phoneNumber')"
                    required />

                <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
            </div>

            {{-- BirthDate --}}
            <div class="mt-4">
                <x-input-label for="birthdate" :value="__('Birthdate')" />

                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')"
                    required />

                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>

            {{-- Alamat --}}
            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat')" />

                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"
                    required />

                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
