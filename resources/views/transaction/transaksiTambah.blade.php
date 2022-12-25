<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="my-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"
                    onclick="$(this).remove()">
                    <ul><strong class="font-bold">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </strong>
                    </ul>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('transaksiStore') }}">
                        @csrf

                        <!-- Peminjam -->
                        <div class="mb-3">
                            <x-input-label for="peminjam" :value="__('Peminjam')" />

                            <select
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="peminjam" id="peminjam">
                                <option value="-1"selected>Pilih dahulu</option>
                                @foreach ($users as $user)
                                    @if ($user->id == old('userPeminjam'))
                                        <option value="{{ $user->id }}" selected>{{ $user->fullname }}</option>
                                    @else
                                        <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                                    @endif
                                @endforeach

                            </select>

                            <x-input-error :messages="$errors->get('peminjam')" class="mt-2" />
                        </div>

                        <!-- Koleksi 1 -->
                        <div class="mb-3">
                            <x-input-label for="koleksi1" :value="__('Koleksi 1')" />

                            <select
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="koleksi1" id="koleksi1">
                                <option value="-1"selected>Pilih dahulu</option>
                                @foreach ($collections as $collection)
                                    @if ($collection->id == old('koleksi1'))
                                        <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}
                                        </option>
                                    @else
                                        <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                                    @endif
                                @endforeach

                            </select>

                            <x-input-error :messages="$errors->get('koleksi1')" class="mt-2" />
                        </div>

                        <!-- Koleksi 2 -->
                        <div class="mb-3">
                            <x-input-label for="koleksi2" :value="__('Koleksi 2')" />

                            <select
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="koleksi2" id="koleksi2">
                                <option value="-1"selected>Pilih dahulu</option>
                                @foreach ($collections as $collection)
                                    @if ($collection->id == old('koleksi2'))
                                        <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}
                                        </option>
                                    @else
                                        <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                                    @endif
                                @endforeach

                            </select>

                            <x-input-error :messages="$errors->get('koleksi2')" class="mt-2" />
                        </div>

                        <!-- Koleksi 3 -->
                        <div class="mb-3">
                            <x-input-label for="koleksi3" :value="__('Koleksi 3')" />

                            <select
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="koleksi3" id="koleksi3">
                                <option value="-1"selected>Pilih dahulu</option>
                                @foreach ($collections as $collection)
                                    @if ($collection->id == old('koleksi3'))
                                        <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}
                                        </option>
                                    @else
                                        <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                                    @endif
                                @endforeach

                            </select>

                            <x-input-error :messages="$errors->get('koleksi3')" class="mt-2" />
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
