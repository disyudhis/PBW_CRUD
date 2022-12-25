<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();


        return view('user.daftarPengguna', compact('users'));
    }

    public function create()
    {

        return view('user.registrasi');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'fullname' => ['required', 'string', 'max:255'],
                'email' => ['email'],
                'alamat' => ['required', 'string'],
                'phoneNumber' => ['required'],
                'birthdate' => ['required', 'date', 'before:today'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username telah digunakan',
                'birthdate.before' => 'Tanggal lahir harus sebelum hari ini'
            ]
        );

        $user = User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'phoneNumber' => $request->phoneNumber,
            'birthdate' => $request->birthdate,
            'password' => Hash::make($request->password),
        ]);

        $users = User::paginate();

        return view('user.daftarPengguna', compact('users'));
    }

    public function show(User $user)
    {
        # code...
        return view('user.infoPengguna', compact('user'));
    }

    public function getAllUser()
    {
        $users = DB::table('users')
            ->select(
                'id as id',
                'username as name',
                'alamat as alamat',
                'email as email',
                'phoneNumber as phoneNumber',
            )
            ->orderBy('username', 'asc')
            ->get();

        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                $btn = '<a type="button" href="' . url('userView') . "/" . $users->id . '" style="padding: 3px 20px" class="edit bg-green-500 inline-flex text-white btn-sm rounded-lg">Edit</a>
            <a type="button" href="' . url('userDestroy') . "/" . $users->id . '" style="padding: 3px 20px" class="edit bg-red-600 inline-flex text-white btn-sm rounded-md">Delete</a>';
                return $btn;
            })
            ->make(true);
    }

    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();

        return redirect('user');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'fullname'     => ['required', 'string'],
            'password'    => ['required', Rules\Password::defaults()],
            'alamat'  => ['required', 'string'],
            'phoneNumber' => ['required']
        ]);

        $user->update([
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'phoneNumber' => $request->phoneNumber
        ]);
        return view('user.daftarPengguna');
    }
}
