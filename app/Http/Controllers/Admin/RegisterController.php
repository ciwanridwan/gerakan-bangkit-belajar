<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.profiles.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (
            !$request->nama || !$request->email || !$request->password
        ) {
            Session::put('error', 'Semua Field Harus Diisi');
        }

        $customErrorMessage = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
            'digits_between' => 'Nomor handphone maksimal 13 number',
            'min' => 'password minimal 6 karakter',
            'confirmed' => 'Password tidak sesuai dengan konfirmasi password, cek kembali password yang diinput'
        ];
        $this->validate(
            $request,
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:admins',
                'password' => 'required|string|min:8|confirmed',
            ], 
            $customErrorMessage,
        );

        if (!auth()->guard('admin')->check()) {
            $admin = Admin::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'activate_token' => Str::random(30),
                'status' => true
            ]);
        }
        
        Session::put('success', 'Sukses Registrasi Akun');
        // dd($peserta);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
