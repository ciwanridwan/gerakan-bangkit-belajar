<?php

namespace App\Http\Controllers\Admin;

use App\Anggota;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
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

    public function editAccount($id)
    {
        $akun = User::find($id);
        return view('admins.account.edit')->with('akun', $akun);
    }

    public function updateAccount(Request $request, $id)
    {
        // $this->validate($request,
        // [
        //     'password' => 'min:8|confirmed'
        // ]);
        $update = User::find($id);
        $update->name = $request->input('name');
        $update->email = $request->input('email');
        $update->password = $request->input('password');
        $update->remember_token = Str::random(16);
        $update->update();

        Session::put('success', 'Data Berhasil Diperbaharui');
        return redirect()->back();
    }

    public function deleteAccount($id)
    {
        $del = User::find($id);
        $del->delete();

        Session::put('success', 'Data Berhasil Dihapus');
        return redirect()->back();
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
        $anggota = Anggota::all();
        $jenjang = Jenjang::all();
        $provinces = Province::all();
        $city = City::all();
        return view('admins.relawans.index', compact('anggota', 'jenjang', 'relawan', 'city', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        $jenjang = Jenjang::all();
        $anggota = Anggota::all();
        return view('admins.relawans.create')->with('provinces', $provinces)->with('jenjang', $jenjang)->with('anggota', $anggota);
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
            'anggota_id' => 'required|exists:anggotas,id',
            'jenjang_id' => 'required|exists:jenjangs,id',
            'follow_ig' => 'required|string',
            'subscribe_youtube' => 'required|string',
            'province_id' => 'nullable|required_if:jenjang_id,2|exists:provinces,id',
            'city_id' => 'nullable|required_if:jenjang_id,3|exists:cities,id',
            'district_id' => 'nullable|exists:districts,id',
            'village_id' => 'nullable|exists:villages,id',
            'nama_teknisi' => 'required|string',
            'nama_aktivis' => 'required|string',
            'email' => 'required|email',
            'instagram' => 'required|string',
            'nomor_hp' => 'required',
        ]);

        $relawan = new Relawan();
        $relawan->anggota_id = $request->input('anggota_id');
        $relawan->jenjang_id = $request->input('jenjang_id');
        $relawan->follow_ig = $request->input('follow_ig');
        $relawan->subscribe_youtube = $request->input('subscribe_youtube');
        $relawan->province_id = $request->input('province_id');
        $relawan->city_id = $request->input('city_id');
        $relawan->district_id = $request->input('district_id');
        $relawan->village_id = $request->input('village_id');
        $relawan->nama_teknisi = $request->input('nama_teknisi');
        $relawan->nama_aktivis = $request->input('nama_aktivis');
        $relawan->email = $request->input('email');
        $relawan->instagram = $request->input('instagram');
        $relawan->nomor_hp = $request->input('nomor_hp');
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
        $provinces = Province::all();
        $jenjang = Jenjang::all();
        $anggota = Anggota::all();
        return view('admins.relawans.edit')->with('provinces', $provinces)->with('jenjang', $jenjang)->with('anggota', $anggota)->with('editRelawan', $editRelawan);
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
        $this->validate($request, [
            'anggota_id' => 'exists:anggotas,id',
            'jenjang_id' => 'exists:jenjangs,id',
            'province_id' => 'nullable|required_if:jenjang_id,2|exists:provinces,id',
            'city_id' => 'nullable|required_if:jenjang_id,3|exists:cities,id',
            'district_id' => 'nullable|exists:districts,id',
            'village_id' => 'nullable|exists:villages,id',
        ]);

        $relawan = Relawan::find($id);
        $relawan->anggota_id = $request->input('anggota_id');
        $relawan->jenjang_id = $request->input('jenjang_id');
        $relawan->follow_ig = $request->input('follow_ig');
        $relawan->subscribe_youtube = $request->input('subscribe_youtube');
        $relawan->province_id = $request->input('province_id');
        $relawan->city_id = $request->input('city_id');
        $relawan->district_id = $request->input('district_id');
        $relawan->village_id = $request->input('village_id');
        $relawan->nama_teknisi = $request->input('nama_teknisi');
        $relawan->nama_aktivis = $request->input('nama_aktivis');
        $relawan->email = $request->input('email');
        $relawan->instagram = $request->input('instagram');
        $relawan->nomor_hp = $request->input('nomor_hp');
        $relawan->update();

        Session::put('message', 'Data Relawan Berhasil Diperbaharui');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relawan = Relawan::find($id);
        $relawan->delete();

        Session::put('message', 'Data Relawan Berhasil Dihapus');
        return redirect()->back();
    }
}
