<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\Province;
use App\Relawan;
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
        $provinces = Province::orderBy('created_at', 'DESC')->get();
        return view('monev.relawan.create')->with('provinces', $provinces);
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
