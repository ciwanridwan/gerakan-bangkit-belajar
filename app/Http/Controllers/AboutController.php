<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function table()
    {
        $about = About::all();
        return view('admins.about.table')->with('about', $about);
    }

    public function index()
    {   
        $about = About::all();
        return view('index')->with('about', $about);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.about.create');
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
            'isi' => 'required|max:255',
            'gambar' => 'required|image|mimes:png,jpeg,jpg',
            'deskripsi' => 'required',
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

        $about = new About();
        $about->judul = $request->input('judul');
        $about->isi = $request->input('isi');
        $about->deskripsi = $request->input('deskripsi');
        $about->gambar = $fileNameToStore;
        $about->save();
        
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
        $edit = About::find($id);
        return view('admins.about.edit')->with('edit', $edit);
        
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
        $update = About::find($id);
        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/gambars', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $update->judul = $request->input('judul');
        $update->isi = $request->input('isi');
        $update->gambar = $fileNameToStore;
        $update->update();
        
        Session::put('message', 'Data Berhasil Ditambah');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = About::find($id);
        $delete->delete();
        return redirect()->back();
    }
}
