<?php

namespace App\Http\Controllers\Admin;

use App\Anggota;
use App\Http\Controllers\Controller;
use App\Monev;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class LaporanAdminController extends Controller
{
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
        $anggota_dprri = count(DB::table('anggotas')->where('jenjang_id', '=', 1)->get());
		$anggota_dprprov = count(DB::table('anggotas')->where('jenjang_id', '=', 2)->get());
        $anggota_dprkab = count(DB::table('anggotas')->where('jenjang_id', '=', 3)->get());
        $sanggar_dprri = count(DB::table('relawans')->select('relawans.anggota_id')->leftJoin('anggotas', 'relawans.anggota_id', '=', 'anggotas.id')->where('anggotas.jenjang_id', '=', 1)->get());
		$sanggar_dprprov = count(DB::table('relawans')->select('relawans.anggota_id')->leftJoin('anggotas', 'relawans.anggota_id', '=', 'anggotas.id')->where('anggotas.jenjang_id', '=', 2)->get());
		$sanggar_dprkab = count(DB::table('relawans')->select('relawans.anggota_id')->leftJoin('anggotas', 'relawans.anggota_id', '=', 'anggotas.id')->where('anggotas.jenjang_id', '=', 3)->get());
		$zona_merah = Monev::where('zona_covid', '=', 'Merah')->count();
		$zona_kuning = count(DB::table('monevs')->select('id')->where('zona_covid', '=', 'Kuning')->get());
		$zona_hijau = count(DB::table('monevs')->select('id')->where('zona_covid', '=', 'Hijau')->get());
        $jumlah_paud = DB::table('monevs')->sum('jumlah_paud');
		$jumlah_sd = DB::table('monevs')->sum('jumlah_sd');
		$jumlah_smp = DB::table('monevs')->sum('jumlah_smp');
		$jumlah_sma = DB::table('monevs')->sum('jumlah_sma');
		$jumlah_komputer = DB::table('monevs')->sum('jumlah_komputer');
		$jumlah_gadget = DB::table('monevs')->sum('jumlah_gadget');
		$jumlah_wifi = DB::table('monevs')->sum('jumlah_wifi');
		$jumlah_berita = DB::table('monevs')->sum('jumlah_berita');
		$jumlah_link_youtube = DB::table('monevs')->sum('jumlah_link_youtube');
		$provinsi = DB::table('provinces')->get();
		return view('admins.laporan.hasil-laporan', ['anggota_dprri' => $anggota_dprri, 'anggota_dprprov' => $anggota_dprprov, 'anggota_dprkab' => $anggota_dprkab, 'sanggar_dprri' => $sanggar_dprri, 'sanggar_dprprov' => $sanggar_dprprov, 'sanggar_dprkab' => $sanggar_dprkab, 'zona_merah' => $zona_merah, 'zona_kuning' => $zona_kuning, 'zona_hijau' => $zona_hijau, 'jumlah_paud' => $jumlah_paud, 'jumlah_sd' => $jumlah_sd, 'jumlah_smp' => $jumlah_smp, 'jumlah_sma' => $jumlah_sma, 'jumlah_komputer' => $jumlah_komputer, 'jumlah_gadget' => $jumlah_gadget, 'jumlah_wifi' => $jumlah_wifi, 'jumlah_berita' => $jumlah_berita, 'jumlah_link_youtube' => $jumlah_link_youtube, 'provinsi' => $provinsi, 'bulan' => $bulan, 'tahun' => $tahun, 'bulanTahun' => $bulan_tahun, 'day' => $day])->with('i');
    }

    public function cetak($bulanTahun)
    {
        $pecah = explode("-", $bulanTahun);
		$tahun = $pecah[0];
        $bulan = $pecah[1];
        $day = $pecah[2];
		$anggota_dprri = count(DB::table('anggotas')->where('jenjang_id', '=', 1)->get());
		$anggota_dprprov = count(DB::table('anggotas')->where('jenjang_id', '=', 2)->get());
		$anggota_dprkab = count(DB::table('anggotas')->where('jenjang_id', '=', 3)->get());
		$sanggar_dprri = count(DB::table('relawans')->select('relawans.anggota_id')->leftJoin('anggotas', 'relawans.anggota_id', '=', 'anggotas.id')->where('anggotas.jenjang_id', '=', 1)->get());
		$sanggar_dprprov = count(DB::table('relawans')->select('relawans.anggota_id')->leftJoin('anggotas', 'relawans.anggota_id', '=', 'anggotas.id')->where('anggotas.jenjang_id', '=', 2)->get());
		$sanggar_dprkab = count(DB::table('relawans')->select('relawans.anggota_id')->leftJoin('anggotas', 'relawans.anggota_id', '=', 'anggotas.id')->where('anggotas.jenjang_id', '=', 3)->get());
		$zona_merah = count(DB::table('monevs')->select('id')->where('zona_covid', '=', 'Merah')->get());
		$zona_kuning = count(DB::table('monevs')->select('id')->where('zona_covid', '=', 'Kuning')->get());
		$zona_hijau = count(DB::table('monevs')->select('id')->where('zona_covid', '=', 'Hijau')->get());
		$jumlah_paud = DB::table('monevs')->sum('jumlah_paud');
		$jumlah_sd = DB::table('monevs')->sum('jumlah_sd');
		$jumlah_smp = DB::table('monevs')->sum('jumlah_smp');
		$jumlah_sma = DB::table('monevs')->sum('jumlah_sma');
		$jumlah_komputer = DB::table('monevs')->sum('jumlah_komputer');
		$jumlah_gadget = DB::table('monevs')->sum('jumlah_gadget');
		$jumlah_wifi = DB::table('monevs')->sum('jumlah_wifi');
		$jumlah_berita = DB::table('monevs')->sum('jumlah_berita');
		$jumlah_link_youtube = DB::table('monevs')->sum('jumlah_link_youtube');
		$provinsi = DB::table('provinces')->get();
		$pdf = PDF::loadview('admins.laporan.cetak-pdf', ['anggota_dprri' => $anggota_dprri, 'anggota_dprprov' => $anggota_dprprov, 'anggota_dprkab' => $anggota_dprkab, 'sanggar_dprri' => $sanggar_dprri, 'sanggar_dprprov' => $sanggar_dprprov, 'sanggar_dprkab' => $sanggar_dprkab, 'zona_merah' => $zona_merah, 'zona_kuning' => $zona_kuning, 'zona_hijau' => $zona_hijau, 'jumlah_paud' => $jumlah_paud, 'jumlah_sd' => $jumlah_sd, 'jumlah_smp' => $jumlah_smp, 'jumlah_sma' => $jumlah_sma, 'jumlah_komputer' => $jumlah_komputer, 'jumlah_gadget' => $jumlah_gadget, 'jumlah_wifi' => $jumlah_wifi, 'jumlah_berita' => $jumlah_berita, 'jumlah_link_youtube' => $jumlah_link_youtube, 'provinsi' => $provinsi, 'bulan' => $bulan, 'tahun' => $tahun, 'bulanTahun' => $bulanTahun, 'day' => $day]);
    	return $pdf->stream('laporan-admin.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.laporan.index');
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
