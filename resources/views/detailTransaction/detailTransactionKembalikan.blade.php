<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"
                    onclick="$(this).remove();">
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

                    <form method="POST" action="{{ route('detailUpdate') }}">
                        @csrf

                        <!-- Id  Transaksi -->
                        <div class="mb-3">
                            <x-input-label for="idTransaksi" :value="__('ID Transaksi')" />

                            <x-text-input id="idTransaksi" class="block mt-1 w-full" type="text" name="idTransaksi"
                                value="{{ $detailTransaction->idTransaksi }}" readonly />

                            <x-input-error :messages="$errors->get('idTransaksi')" class="mt-2" />
                        </div>

                        <!-- Id Detail Transaksi -->
                        <div class="mb-3">
                            <x-input-label for="idDetailTransaksi" :value="__('ID Detail Transaksi')" />

                            <x-text-input id="idDetailTransaksi" class="block mt-1 w-full" type="text"
                                name="idDetailTransaksi" value="{{ $detailTransaction->id }}" readonly />

                            <x-input-error :messages="$errors->get('idDetailTransaksi')" class="mt-2" />
                        </div>

                        <!-- Peminjam -->
                        <div class="mb-3">
                            <x-input-label for="idPeminjam" :value="__('Peminjam')" />

                            <x-text-input id="idPeminjam" class="block mt-1 w-full" type="text" name="idPeminjam"
                                value="{{ $detailTransaction->namaPeminjam }}" disabled />

                            <x-input-error :messages="$errors->get('idPeminjam')" class="mt-2" />
                        </div>

                        <!-- Petugas -->
                        <div class="mb-3">
                            <x-input-label for="idPetugas" :value="__('Petugas')" />

                            <x-text-input id="idPetugas" class="block mt-1 w-full" type="text" name="idPetugas"
                                value="{{ $detailTransaction->namaPetugas }}" disabled />

                            <x-input-error :messages="$errors->get('idPetugas')" class="mt-2" />
                        </div>

                        <!-- Koleksi -->
                        <div class="mb-3">
                            <x-input-label for="koleksi" :value="__('Koleksi')" />

                            <x-text-input id="koleksi" class="block mt-1 w-full" type="text" name="koleksi"
                                value="{{ $detailTransaction->koleksi }}" disabled />

                            <x-input-error :messages="$errors->get('koleksi')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <x-input-label for="status" :value="__('status')" />

                            <select
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="status" id="status">
                                <option value="1" @if (old('status', $detailTransaction->status) == 1) selected @endif>Pinjam</option>
                                <option value="2" @if (old('status', $detailTransaction->status) == 2) selected @endif>Kembali
                                </option>
                                <option value="3" @if (old('status', $detailTransaction->status) == 3) selected @endif>Hilang
                                </option>

                            </select>

                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
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
