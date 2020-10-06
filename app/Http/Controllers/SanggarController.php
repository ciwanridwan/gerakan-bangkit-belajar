<?php

namespace App\Http\Controllers;

use App\Sanggar;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SanggarController extends Controller
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
        return view('monev.sanggar.create');
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
            'jumlah_anggota' => 'required',
            'jumlah_sanggar' => 'required',
            'jumlah_perprovinsi' => 'required',
            'zona_covid' => 'required',
            'jumlah_pelajar' => 'required',
            'jumlah_komputer' => 'required',
            'jumlah_gadget' => 'required',
            'jumlah_wifi' => 'required',
            'jumlah_berita' => 'required',
            'jumlah_link_youtube' => 'required',
        ]);

        $sanggar = new Sanggar();
        $sanggar->jumlah_anggota = $request->input('jumlah_anggota');
        $sanggar->jumlah_sanggar = $request->input('jumlah_sanggar');
        $sanggar->jumlah_perprovinsi = $request->input('jumlah_perprovinsi');
        $sanggar->zona_covid = $request->input('zona_covid');
        $sanggar->jumlah_pelajar = $request->input('jumlah_pelajar');
        $sanggar->jumlah_komputer = $request->input('jumlah_komputer');
        $sanggar->jumlah_gadget = $request->input('jumlah_gadget');
        $sanggar->jumlah_wifi = $request->input('jumlah_wifi');
        $sanggar->jumlah_berita = $request->input('jumlah_berita');
        $sanggar->jumlah_link_youtube = $request->input('jumlah_link_youtube');
        $sanggar->save();

        Session::put('message', 'Data Sanggar berhasil diinput');
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
