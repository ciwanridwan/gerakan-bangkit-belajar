<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FasilitasController extends Controller
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
        return view('monev.fasilitas.create');
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
            'jumlah_pc' => 'required',
            'jumlah_hp' => 'required',
            'jumlah_wifi' => 'required',
            'jumlah_berita' => 'required',
            'bukti_berita' => 'required',
            'foto_smartphone' => 'required',
            'foto_wifi' => 'required',
            'foto_komputer' => 'required',
            'bukti_pjj' => 'required',
            'link_youtube' => 'required',
        ]);

        if ($request->hasFile('bukti_berita')) {
            $fileNameWithExtension = $request->file('bukti_berita')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('bukti_berita')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('bukti_berita')->storeAs('public/files', $fileNameToStore);
        } else {
            $fileNameToStore = 'nofile.pdf';
        }

        if ($request->hasFile('foto_smartphone')) {
            $fileNameWithExtension = $request->file('foto_smartphone')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('foto_smartphone')->getClientOriginalExtension();
            $fotoSmartphone = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('foto_smartphone')->storeAs('public/photos', $fotoSmartphone);
        } else {
            $fotoSmartphone = 'noimage.jpg';
        }

        if ($request->hasFile('foto_wifi')) {
            $fileNameWithExtension = $request->file('foto_wifi')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('foto_wifi')->getClientOriginalExtension();
            $fotoWifi = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('foto_wifi')->storeAs('public/photos', $fotoWifi);
        } else {
            $fotoWifi = 'noimage.jpg';
        }

        if ($request->hasFile('foto_komputer')) {
            $fileNameWithExtension = $request->file('foto_komputer')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('foto_komputer')->getClientOriginalExtension();
            $fotoKomputer = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('foto_komputer')->storeAs('public/photos', $fotoKomputer);
        } else {
            $fotoKomputer = 'noimage.jpg';
        }

        if ($request->hasFile('bukti_pjj')) {
            $fileNameWithExtension = $request->file('bukti_pjj')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('bukti_pjj')->getClientOriginalExtension();
            $fotoBuktiPjj = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('bukti_pjj')->storeAs('public/photos', $fotoBuktiPjj);
        } else {
            $fotoBuktiPjj = 'noimage.jpg';
        }

        $fasilitas = new Fasilitas();
        $fasilitas->jumlah_pc = $request->input('jumlah_pc');
        $fasilitas->jumlah_hp = $request->input('jumlah_hp');
        $fasilitas->jumlah_wifi = $request->input('jumlah_wifi');
        $fasilitas->jumlah_berita = $request->input('jumlah_berita');
        $fasilitas->bukti_berita = $fileNameToStore;
        $fasilitas->foto_smartphone = $fotoSmartphone;
        $fasilitas->foto_wifi = $fotoWifi;
        $fasilitas->foto_komputer = $fotoKomputer;
        $fasilitas->bukti_pjj = $fotoBuktiPjj;
        $fasilitas->link_youtube = $request->input('link_youtube');
        $fasilitas->save();
        dd($fasilitas->bukti_berita);

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
