<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jenjang;
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

        Session::put('success', 'Data Berhasil Dihapus');
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
        return view('admins.relawans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
