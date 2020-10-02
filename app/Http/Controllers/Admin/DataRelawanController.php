<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jenjang;
use App\Province;
use App\Relawan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataRelawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJenjang()
    {
        $jenjang = Jenjang::all();
        return view('admins.jenjang.index')->with('jenjang', $jenjang);
    }

    public function createJenjang()
    {
        return view('admins.jenjang.create');
    }

    public function storeJenjang(Request $request)
    {
        $customError = [
            'required' => ':atttribute Harus Diisi'
        ];

        $this->validate($request,
        [
            'nama' => 'required|string|max:255'
        ], $customError);

        $tambahJenjang = new Jenjang();
        $tambahJenjang->nama = $request->input('nama');
        $tambahJenjang->save();

        Session::put('success', 'Data Berhasil Ditambah');
        return redirect()->back();
    }

    public function editJenjang($id)
    {
        $editJenjang = Jenjang::find($id);
        return view('admins.jenjang.edit')->with('editJenjang', $editJenjang);
    }

    public function updateJenjang(Request $request, $id)
    {
        $updateJenjang = Jenjang::find($id);
        $updateJenjang->nama = $request->input('nama');
        $updateJenjang->update();
        Session::put('success', 'Data Berhasil Diperbaharui');
        return redirect()->back();
    }

    public function deleteJenjang($id)
    {
        $deleteJenjang = Jenjang::find($id);
        $deleteJenjang->delete();

        Session::put('message', 'Data Berhasil Dihapus');
        return redirect()->back();
    }

    public function indexAccount()
    {
        $user = User::all();
        return view('admins.account.index')->with('user', $user);
    }

    public function createAccount()
    {
        return view('admins.account.create');
    }

    public function storeAccount(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $akun = new User();
        $akun->name = $request->input('name');
        $akun->email = $request->input('email');
        $akun->password = $request->input('password');
        $akun->save();

        Session::put('success', 'Data Berhasil Ditambah');
        return redirect()->back();
    }

    public function index()
    {
        $relawan = Relawan::all();
        return view('admins.relawans.index')->with('relawan', $relawan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::orderBy('created_at', 'DESC')->get();
        $jenjang = Jenjang::all();
        return view('admins.relawans.create')->with('provinces', $provinces)->with('jenjang', $jenjang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'nama' => 'required|string',
            'jenjang' => 'required|string',
            'follow_ig' => 'required|string',
            'subscribe_youtube' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'kelurahan' => 'required|string',
            'jumlah_sanggar' => 'required|string',
            'jumlah_pelajar' => 'required|string',
            'zona_covid' => 'required|string',
        ]);

        $relawan = new Relawan();
        $relawan->nama = $request->input('nama');
        $relawan->jenjang = $request->input('jenjang');
        $relawan->follow_ig = $request->input('follow_ig');
        $relawan->subscribe_youtube = $request->input('subscribe_youtube');
        $relawan->province_id = $request->input('province_id');
        $relawan->city_id = $request->input('city_id');
        $relawan->district_id = $request->input('district_id');
        $relawan->kelurahan = $request->input('kelurahan');
        $relawan->jumlah_sanggar = $request->input('jumlah_sanggar');
        $relawan->jumlah_pelajar = $request->input('jumlah_pelajar');
        $relawan->zona_covid = $request->input('zona_covid');
        $relawan->save();

        Session::put('message', 'Data Relawan Berhasil Diinput');
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
        $editRelawan = Relawan::find($id);
        return view('admins.relawans.edit')->with('editRelawan', $editRelawan);
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
