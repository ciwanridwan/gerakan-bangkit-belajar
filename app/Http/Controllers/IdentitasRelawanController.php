<?php

namespace App\Http\Controllers;

use App\IdentitasRelawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IdentitasRelawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('monev.identitas.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monev.identitas.create');
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
            'nama_teknisi' => 'required|string|max:255',
            'nomor_teknisi' => 'required|string|max:255',
            'email_teknisi' => 'required|string|max:255',
            'jenis_teknisi' => 'required|string|max:255',
            'nama_aktivis' => 'required|string|max:255',
            'nomor_aktivis' => 'required|string|max:255',
            'email_aktivis' => 'required|string|max:255',
            'jenis_aktivis' => 'required|string|max:255'
        ]);

        $identitas = new IdentitasRelawan();
        $identitas->nama_teknisi = $request->input('nama_teknisi');
        $identitas->nomor_teknisi = $request->input('nomor_teknisi');
        $identitas->email_teknisi = $request->input('email_teknisi');
        $identitas->jenis_teknisi = $request->input('jenis_teknisi');
        $identitas->nama_aktivis = $request->input('nama_aktivis');
        $identitas->nomor_aktivis = $request->input('nomor_aktivis');
        $identitas->email_aktivis = $request->input('email_aktivis');
        $identitas->jenis_aktivis = $request->input('jenis_aktivis');
        $identitas->save();

        Session::put('message', 'Data Berhasil Diinput');
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
