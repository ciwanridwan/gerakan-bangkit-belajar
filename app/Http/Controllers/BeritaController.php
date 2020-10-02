<?php

namespace App\Http\Controllers;

use App\Berita;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function table()
    {
        if (auth()->check()) {
            $berita = Berita::where('user_id', auth()->user()->id)->paginate(10);
        }
        return view('berita.table')->with('berita', $berita);
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
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'judul' => 'required',
                'seo_judul' => 'required',
                'isi' => 'required',
                'penulis' => 'required',
                'gambar' => 'required',
                'user_id' => 'required'
            ]
        );

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
        $berita->status = 0;
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
    public function show($seo_judul)
    {
        $berita = Berita::where('seo_judul', $seo_judul)->first();
        // dd($berita);
        return view('berita.show')->with('berita', $berita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Berita::find($id);
        return view('berita.edit')->with('edit', $edit);
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
        $update = Berita::find($id);
        $update->judul = $request->input('judul');
        $update->seo_judul = $request->input('seo_judul');
        $update->isi = $request->input('isi');
        $update->penulis = $request->input('penulis');
        $update->user_id = $request->input('user_id');
        $update->status = 0;


        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/gambars', $fileNameToStore);
            $update->gambar = $fileNameToStore;

            $select_old_gambar_name = DB::table('beritas')->where('id', $request->id)->first();

            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/gambars', $select_old_gambar_name->gambar);
            }
        }
        $update->update();

        Session::put('message', 'Data Berhasil Ditambah');
        return redirect('/berita/table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Berita::find($id);
        $delete->delete();

        Session::put('message', 'Data Berhasil DiHapus');
        return redirect()->back();
    }
}
