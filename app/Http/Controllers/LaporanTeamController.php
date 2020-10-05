<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Jenjang;
use App\Monev;
use App\Relawan;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanTeamController extends Controller
{
    public function cetak($user_id)
    {
        $monev = Monev::find($user_id);
        $tanggal = Carbon::now()->toDateString();
        $jenjang = Jenjang::all();
        $anggota = Anggota::all();
        $relawan = Relawan::all();
        $pdf = PDF::loadView('monev.laporan.cetak_pdf', ['monev' => $monev, 'tanggal' => $tanggal, 'jenjang' => $jenjang, 'anggota' => $anggota, 'relawan' => $relawan]);
        return $pdf->stream('laporan-team-gbb.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('monev.laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
