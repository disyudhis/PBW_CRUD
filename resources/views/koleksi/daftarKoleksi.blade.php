<x-app-layout>
    <x-slot name="header">
      


        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Koleksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="my-3">
                        <a href="{{ route('koleksiTambah') }}"
                            class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">+ Tambah
                            Data Koleksi</a>
                    </div>
                    <div class="container">
                        {{-- <h2 class="mb-4">Tabel Daftar Pengguna</h2> --}}
                        <table class="table table-bordered myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
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



    <script type="text/javascript">
        $(document).ready(function() {
            $('.myTable').DataTable({
                processing: true,
                serverSide: false,
                fixedHeader: true,
                deferRender: true,
                type: 'GET',
                destroy: true,
                paging: true,
                ajax: "{{ route('koleksi.list') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'namaKoleksi',
                        name: 'namaKoleksi'
                    },
                    {
                        data: 'jenisKoleksi',
                        name: 'jenisKoleksi'
                    },
                    {
                        data: 'jumlahSisa',
                        name: 'jumlahSisa'
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
