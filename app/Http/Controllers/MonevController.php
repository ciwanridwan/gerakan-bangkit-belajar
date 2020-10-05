<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Monev;
use App\Relawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MonevController extends Controller
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
        $anggota = Anggota::all();
        $relawan = Relawan::all();
        return view('monev.create')->with("anggota", $anggota)->with('relawan', $relawan);
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
            'user_id' => 'required|exists:users,id',
            'anggota_id' => 'required|exists:anggotas,id',
            'relawan_id' => 'required|exists:relawans,id',
            'foto_gadget' => 'required|image|mimes:jpg,jpeg,png',
            'foto_komputer' => 'required|image|mimes:jpg,jpeg,png',
            'foto_wifi' => 'required|image|mimes:jpg,jpeg,png',
            'zona_covid' => 'required|string',
            'jumlah_paud' => 'required',
            'jumlah_sd' => 'required',
            'jumlah_smp' => 'required',
            'jumlah_sma' => 'required',
            'jumlah_komputer' => 'required',
            'jumlah_gadget' => 'required',
            'jumlah_wifi' => 'required',
            'jumlah_berita' => 'required',
            'jumlah_link_youtube' => 'required',
        ]);

        if ($request->hasFile('foto_gadget')) {
            $fileNameWithExtension = $request->file('foto_gadget')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('foto_gadget')->getClientOriginalExtension();
            $gadget = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('foto_gadget')->storeAs('public/monevs', $gadget);
        } else {
            $gadget = 'noimage.jpg';
        }

        if ($request->hasFile('foto_komputer')) {
            $fileNameWithExtension = $request->file('foto_komputer')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('foto_komputer')->getClientOriginalExtension();
            $komputer = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('foto_komputer')->storeAs('public/monevs', $komputer);
        } else {
            $komputer = 'noimage.jpg';
        }

        if ($request->hasFile('foto_wifi')) {
            $fileNameWithExtension = $request->file('foto_wifi')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('foto_wifi')->getClientOriginalExtension();
            $wifi = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('foto_wifi')->storeAs('public/monevs', $wifi);
        } else {
            $wifi = 'noimage.jpg';
        }

        $monev = new Monev();
        $monev->user_id = $request->input('user_id');
        $monev->anggota_id = $request->input('anggota_id');
        $monev->relawan_id = $request->input('relawan_id');
        $monev->foto_gadget = $gadget;
        $monev->foto_komputer = $komputer;
        $monev->foto_wifi = $wifi;
        $monev->zona_covid = $request->input('zona_covid');
        $monev->jumlah_paud = $request->input('jumlah_paud');
        $monev->jumlah_sd = $request->input('jumlah_sd');
        $monev->jumlah_smp = $request->input('jumlah_smp');
        $monev->jumlah_sma = $request->input('jumlah_sma');
        $monev->jumlah_gadget = $request->input('jumlah_gadget');
        $monev->jumlah_komputer = $request->input('jumlah_komputer');
        $monev->jumlah_wifi = $request->input('jumlah_wifi');
        $monev->jumlah_berita = $request->input('jumlah_berita');
        $monev->jumlah_link_youtube = $request->input('jumlah_link_youtube');
        $monev->save();

        Session::put('message', 'Monev Berhasil Diinput');
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
