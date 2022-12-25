<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info Koleksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('koleksiUpdate', $collection->id) }}">
                        @csrf

                        <!-- Id -->
                        <div>
                            <x-input-label for="id" :value="__('Id Koleksi')" />

                            <x-text-input id="id" class="block mt-1 w-full" type="text" name="id"
                                value="{{ $collection->id }}" readonly />

                            <x-input-error :messages="$errors->get('id')" class="mt-2" />
                        </div>

                        <!-- Nama -->
                        <div>
                            <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />

                            <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi"
                                value="{{ $collection->namaKoleksi }}" readonly />

                            <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
                        </div>


                        <div>
                            <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />

                            <select
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="jenisKoleksi" id="jenisKoleksi">
                                <option value="-1" @if (old('jenisKoleksi', $collection->jenisKoleksi) == -1) selected @endif>Pilih Salah
                                    satu</option>
                                <option value="1" @if (old('jenisKoleksi', $collection->jenisKoleksi) == 1) selected @endif>Buku</option>
                                <option value="2" @if (old('jenisKoleksi', $collection->jenisKoleksi) == 2) selected @endif>Majalah
                                </option>
                                <option value="3" @if (old('jenisKoleksi', $collection->jenisKoleksi) == 3) selected @endif>Cakram Digital
                                </option>

                            </select>
                        </div>

                        <!-- Jumlah Awal -->
                        <div class="my-5">
                            <x-input-label for="jumlahAwal" :value="__('Jumlah Awal')" />

                            <x-text-input id="jumlahAwal" class="block mt-1 w-full" type="text" name="jumlahAwal"
                                value="{{ $collection->jumlahAwal }}" readonly />

                            <x-input-error :messages="$errors->get('jumlahAwal')" class="mt-2" />
                        </div>

                        <!-- Jumlah Sisa -->
                        <div class="my-5">
                            <x-input-label for="jumlahSisa" :value="__('Jumlah Sisa')" />

                            <x-text-input id="jumlahSisa" class="block mt-1 w-full" type="text" name="jumlahSisa"
                                value="{{ old('namaKoleksi', $collection->jumlahSisa) }}" autofocus />

                            <x-input-error :messages="$errors->get('jumlahSisa')" class="mt-2" />
                        </div>

                        <!-- Jumlah Akhir -->
                        <div class="my-5">
                            <x-input-label for="jumlahKeluar" :value="__('Jumlah Keluar')" />

                            <x-text-input id="jumlahKeluar" class="block mt-1 w-full" type="text" name="jumlahKeluar"
                                value="{{ old('namaKoleksi', $collection->jumlahKeluar) }}" autofocus />

                            <x-input-error :messages="$errors->get('jumlahKeluar')" class="mt-2" />
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
