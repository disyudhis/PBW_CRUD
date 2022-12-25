<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-4">
                        <x-input-label for="peminjam" :value="__('Peminjam')" />

                        <x-text-input id="peminjam" class="block mt-1 w-full" type="text" name="peminjam"
                            value="{{ $transactions->fullnamePeminjam }}" readonly />

                        <x-input-error :messages="$errors->get('peminjam')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="petugas" :value="__('Petugas')" />

                        <x-text-input id="petugas" class="block mt-1 w-full" type="text" name="petugas"
                            value="{{ $transactions->fullnamePetugas }}" readonly />

                        <x-input-error :messages="$errors->get('petugas')" class="mt-2" />
                    </div>


                    <div class="container mt-4">
                        {{-- <h2 class="mb-4">Tabel Daftar Pengguna</h2> --}}
                        <table class="table table-bordered myTable ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Koleksi</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.myTable').DataTable({
                ajax: '{{ url("getAllDetailTransactions") }}'+"/"+ {{ $transactions->id }},
                processing: true,
                serverSide: false,
                fixedHeader: true,
                deferRender: true,
                type: 'GET',
                destroy: true,
                paging: true,
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'koleksi',
                        name: 'koleksi'
                    },
                    {
                        data: 'tanggalPinjam',
                        name: 'tanggalPinjam'
                    },
                    {
                        data: 'tanggalKembali',
                        name: 'tanggalKembali'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            })
        })
    </script>
</x-app-layout>
