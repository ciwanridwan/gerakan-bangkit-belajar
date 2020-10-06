<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\City;
use App\District;
use App\Jenjang;
use App\Province;
use App\Relawan;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RelawanController extends Controller
{
    public function getCity()
    {
        $cities = City::where('province_id', request()->province_id)->get();
        return response()->json(['status' => 'success', 'data' => $cities]);
    }

    public function getDistrict()
    {
        $districts = District::where('city_id', request()->city_id)->get();
        return response()->json(['status' => 'success', 'data' => $districts]);
    }

    public function getVillage()
    {
        $village = Village::where('district_id', request()->district_id)->get();
        return response()->json(['status' => 'success', 'data' => $village]);
    }
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
        $jenjang = Jenjang::all();
        $anggota = Anggota::all();
        $provinces = Province::all();
        return view('monev.relawan.create')->with('provinces', $provinces)->with('anggota', $anggota)->with('jenjang', $jenjang);
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
