<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Collection;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        # code...
        return view('transaction.daftarTransaksi');
    }

    public function create()
    {
        # code...
        $users = User::get();
        $collections = Collection::where('jumlahSisa', '>', 0)->get();
        return view('transaction.transaksiTambah', compact('collections', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'peminjam' => 'required|integer|gt:0',
                'koleksi1' => 'required|integer|gt:0',
            ],
            [
                'peminjam' => 'Pilih salah satu',
                'koleksi1.gt' => 'Pilih jenis Item'
            ]
        );

        // buat 1 object transaction dan simpan kedalam table transactions
        $transaction = new Transaction;
        $transaction->userIdPeminjam = $request->peminjam;
        $transaction->userIdPetugas = auth()->user()->id;
        $transaction->tanggalPinjam = Carbon::now()->toDateString();
        // $transaction->tanggalSelesai = DAY_5;
        $transaction->save();

        // mengambil last transaction id untuk digunakan
        // pada proses insert detail transaction
        $lastTransactionIdStored = $transaction->id;

        // membuat object detail transaction dan simpan kedalam table detail_transactions

        // Peminjaman koleksi 1
        $detilTransaksi1 = new DetailTransaction;
        $detilTransaksi1->transactionId = $lastTransactionIdStored;
        $detilTransaksi1->collectionId = $request->koleksi1;
        $detilTransaksi1->status = 1;
        $detilTransaksi1->save();

        // mengurangi jumlah stok
        DB::table('collections')->where('id', $request->koleksi1)->decrement('jumlahSisa');
        DB::table('collections')->where('id', $request->koleksi1)->increment('jumlahKeluar');

        // Peminjaman koleksi 2
        if ($request->koleksi2 > 0) {
            $detilTransaksi2 = new DetailTransaction;
            $detilTransaksi2->transactionId = $lastTransactionIdStored;
            $detilTransaksi2->collectionId = $request->koleksi2;
            $detilTransaksi2->status = 1;
            $detilTransaksi2->save();
            DB::table('collections')->where('id', $request->koleksi2)->decrement('jumlahSisa');
            DB::table('collections')->where('id', $request->koleksi2)->decrement('jumlahKeluar');
        }
        // Peminjaman koleksi 3
        if ($request->koleksi3 > 0) {
            $detilTransaksi3 = new DetailTransaction;
            $detilTransaksi3->transactionId = $lastTransactionIdStored;
            $detilTransaksi3->collectionId = $request->koleksi3;
            $detilTransaksi3->status = 1;
            $detilTransaksi3->save();
            DB::table('collections')->where('id', $request->koleksi3)->decrement('jumlahSisa');
            DB::table('collections')->where('id', $request->koleksi3)->decrement('jumlahKeluar');
        }

        return redirect()->route('transaksi')->with('status', 'Peminjaman berhasil');
    }
    public function show(Transaction $transaction)
    {
        $transactions = DB::table('transactions')
        ->select(
            'transactions.id as id',
            'u1.fullname as fullnamePeminjam',
            'u2.fullname as fullnamePetugas',
            'tanggalPinjam as tanggalPinjam',
            'tanggalSelesai as tanggalSelesai',
        )
        ->join('users as u1', 'userIdPeminjam', '=', 'u1.id')
        ->join('users as u2', 'userIdPetugas', '=', 'u2.id')
        ->where('transactions.id', '=', $transaction->id)
        ->orderBy('tanggalPinjam', 'asc')
        ->first();
        return view('transaction.transaksiView', compact('transactions'));
    }

    public function getAllTransactions()
    {
        $transactions = DB::table('transactions')
            ->select(
                'transactions.id as id',
                'u1.fullname as peminjam',
                'u2.fullname as petugas',
                'tanggalPinjam as tanggalPinjam',
                'tanggalSelesai as tanggalSelesai',
            )
            ->join('users as u1', 'userIdPeminjam', '=', 'u1.id')
            ->join('users as u2', 'userIdPetugas', '=', 'u2.id')
            ->orderBy('tanggalPinjam', 'asc')
            ->get();

        return DataTables::of($transactions)
            ->addColumn('action', function ($transactions) {
                $btn = '<a type="button" href="' . url('transaksiView') . "/" . $transactions->id . '" style="padding: 3px 20px" class="edit bg-green-500 inline-flex text-white btn-sm rounded-lg">Edit</a>';
                return $btn;
            })
            ->make(true);
    }
}
