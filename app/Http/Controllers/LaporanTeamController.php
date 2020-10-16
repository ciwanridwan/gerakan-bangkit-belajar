<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Jenjang;
use App\Monev;
use App\Relawan;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanTeamController extends Controller
{
    public function export($bulanTahun)
    {
        // set_time_limit(60);
        $tanggal = Carbon::now()->toDateString();
		$pecah = explode("-", $bulanTahun);
		$tahun = $pecah[0];
        $bulan = $pecah[1];
        $day = $pecah[2];
		$id_users = Auth::user()->id;
        $laporan = DB::table('monevs')->select('monevs.*', 'anggotas.nama as nama_anggota', 'jenjangs.nama as nama_jenjang', 'relawans.*', 'villages.name as nama_desa', 'districts.name as nama_kecamatan', 'cities.name as nama_kabupaten', 'provinces.name as nama_provinsi')->join('anggotas', 'anggota_id', '=', 'anggotas.id')->join('jenjangs', 'anggotas.jenjang_id', '=', 'jenjangs.id')->join('relawans', 'anggotas.id', '=', 'relawans.anggota_id')->join('villages', 'relawans.village_id', '=', 'villages.id')->join('districts', 'relawans.district_id', '=', 'districts.id')->join('cities', 'relawans.city_id', '=', 'cities.id')->join('provinces', 'relawans.province_id', '=', 'provinces.id')->where('monevs.user_id', '=', $id_users)->whereYear('monevs.created_at', '=', $tahun)->whereMonth('monevs.created_at', '=', $bulan)->first();
        $anggota = Anggota::where('id', $laporan->anggota_id)->get();
        $css = '<link rel="stylesheet" href="{{ asset('.'assets/css/style-pdf.css'.')}}">';
        $pdf = PDF::loadview('monev.laporan.cetak_pdf', ['laporan' => $laporan, 'bulan' => $bulan, 'tahun' => $tahun, 'tanggal' => $tanggal, 'day' => $day, 'anggota' => $anggota, 'css' => $css]);
        // dd($pdf);
    	return $pdf->download('laporan-team.pdf');
    }

    public function hasil(Request $request)
    {
		$this->validate($request, 
        [
            'bulan_tahun' => 'required',
        ]);
        $bulan_tahun = $request->input('bulan_tahun');
		$pecah = explode("-", $bulan_tahun);
        $tahun = $pecah[0];
        $bulan = $pecah[1];
        $day = $pecah[2];
		$id_users = Auth::user()->id;
        $laporan = DB::table('monevs')->select('monevs.*', 'anggotas.nama as nama_anggota', 'jenjangs.nama as nama_jenjang', 'relawans.*', 'villages.name as nama_desa', 'districts.name as nama_kecamatan', 'cities.name as nama_kabupaten', 'provinces.name as nama_provinsi')->join('anggotas', 'anggota_id', '=', 'anggotas.id')->join('jenjangs', 'anggotas.jenjang_id', '=', 'jenjangs.id')->join('relawans', 'anggotas.id', '=', 'relawans.anggota_id')->join('villages', 'relawans.village_id', '=', 'villages.id')->join('districts', 'relawans.district_id', '=', 'districts.id')->join('cities', 'relawans.city_id', '=', 'cities.id')->join('provinces', 'relawans.province_id', '=', 'provinces.id')->where('monevs.user_id', '=', $id_users)->whereYear('monevs.created_at', '=', $tahun)->whereMonth('monevs.created_at', '=', $bulan)->first();
        $anggota = Anggota::where('id', $laporan->anggota_id)->get();
        // dd($anggota);
		return view('monev.laporan.hasil-laporan', ['laporan' => $laporan, 'bulan' => $bulan, 'tahun' => $tahun, 'bulanTahun' => $bulan_tahun, 'day' => $day, 'anggota' => $anggota])->with('i');
    }

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
