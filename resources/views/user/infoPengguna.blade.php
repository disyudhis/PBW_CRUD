<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('userUpdate', $user->id) }}">
                        @csrf

                        <!-- Nama Lengkap-->
                        <div class="my-3">
                            <x-input-label for="fullname" :value="__('* Nama Lengkap')" />

                            <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname"
                                value="{{ old('fullname', $user->fullname) }}" autofocus/>

                            <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                        </div>

                        <!-- Username-->
                        <div class="my-3">
                            <x-input-label for="username" :value="__('Username')" />

                            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                value="{{ $user->username }}" readonly/>

                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>

                        <!-- Email-->
                        <div class="my-3">
                            <x-input-label for="email" :value="__('Email')" />

                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                value="{{ $user->email }}" readonly/>

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                         <!-- BirthDate-->
                         <div class="my-3">
                            <x-input-label for="birthdate" :value="__('Tanggal Lahir')" />

                            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"
                                value="{{ $user->birthdate }}" readonly/>

                            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                        </div>

                        {{-- Password --}}
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('* Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Alamat-->
                        <div class="my-3">
                            <x-input-label for="alamat" :value="__('* Alamat')" />

                            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat"
                                value="{{ old('username', $user->alamat) }}" autofocus/>

                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <!-- Phone Number-->
                        <div class="my-3">
                            <x-input-label for="phoneNumber" :value="__('* Nomor Telepon')" />

                            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber"
                                value="{{ old('username', $user->phoneNumber) }}" autofocus/>

                            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                            <x-secondary-button class="ml-4">
                                {{ __('Reset') }}
                            </x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
