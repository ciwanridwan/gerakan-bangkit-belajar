<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Berita;
use App\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $confirm = Berita::find($id);
        $confirm->status = 1;
        $confirm->update();

        Session::put('message',  $confirm->judul. ' Berhasil Di Konfirmasi');
        return redirect()->back();
    }
    public function table()
    {
        $berita = Berita::paginate(10);
        return view('admins.berita.table')->with('berita', $berita);
    }
    public function index()
    {
        $berita = Berita::all();
        return view('berita.index')->with('berita', $berita);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.berita.create');
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
            'judul' => 'required',
            'seo_judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',
            'gambar' => 'required',
            'user_id' => 'nullable'
        ]);

        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/gambars', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $berita = new Berita();
        $berita->judul = $request->input('judul');
        $berita->seo_judul = $request->input('seo_judul');
        $berita->isi = $request->input('isi');
        $berita->penulis = $request->input('penulis');
        $berita->gambar = $fileNameToStore;
        $berita->user_id = $request->input('user_id');
        $berita->save();
        Session::put('message', 'Data Berhasil Ditambah');
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
