<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Contracts\DataTable;

class CollectionController extends Controller
{
    public function index()
    {

        $collections = Collection::paginate();

        return view('koleksi.daftarKoleksi', compact('collections'));
    }

    public function create()
    {
        return view('koleksi.registrasi');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'namaKoleksi' => ['required', 'string', 'max:255', 'unique:collections'],
                'jenisKoleksi' => ['required', 'numeric'],
                'jumlahKoleksi' => ['required', 'gt:0'],
            ],
            [
                'namaKoleksi.unique'   => 'Nama koleksi tersebut sudah ada'
            ]
        );

        $koleksi = Collection::create([

            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
            'jumlahAwal' => $request->jumlahKoleksi,
            'jumlahSisa' => $request->jumlahKoleksi,
            'jumlahKeluar' => 0,
        ]);

    
        return view('koleksi.daftarKoleksi');
    }

    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', compact('collection'));
    }

    public function getAllCollection()
    {
        $collection = DB::table('collections')
            ->select(
                'id as id',
                'namaKoleksi as namaKoleksi',
                DB::raw('
            (CASE
            WHEN jenisKoleksi="1" THEN "Buku"
            WHEN jenisKoleksi="2" THEN "Majalah"
            WHEN jenisKoleksi="3" THEN "Cakram Digital"
            END) AS jenisKoleksi
                '),
                'jumlahAwal as jumlahAwal',
                'jumlahSisa as jumlahSisa',
                'jumlahKeluar as jumlahKeluar',
            )
            ->orderBy('namaKoleksi', 'asc')
            ->get();

        return DataTables::of($collection)
            ->addColumn('action', function ($collection) {
                $btn = '<a type="button" href="' . url('koleksiView') . "/" . $collection->id . '" style="padding: 3px 20px" class="edit bg-green-500 inline-flex text-white btn-sm rounded-lg">Edit</a>
                <a type="button" href="' . url('koleksiDestroy') . "/" . $collection->id . '" style="padding: 3px 20px" class="edit bg-red-600 inline-flex text-white btn-sm rounded-md">Delete</a>';
                return $btn;
            })
            ->make(true);
    }

    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'jenisKoleksi'     => ['required', 'gt:0'],
            'jumlahSisa'    => ['required', 'gt:0'],
            'jumlahKeluar'  => ['required', 'gt:0']
        ]);

        $collection->update([
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahSisa' => $request->jumlahSisa,
            'jumlahKeluar' => $request->jumlahKeluar,
        ]);

        return view('koleksi.daftarKoleksi');
    }

    public function destroy($id)
    {
        $collection = DB::table('collections')->where('id', $id)->delete();

        return redirect('koleksi');
    }
}
