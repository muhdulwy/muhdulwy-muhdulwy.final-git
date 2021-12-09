<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $berit = Berita::latest()->paginate(5);
        return view ('berit.index',compact('berit'))->with('i',(request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategor = Kategori::all();
        return view('berit.create', compact('kategor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Judul' => 'required',
            'IsiBerita' => 'required',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);
        
        Berita::create($request->all());

        return redirect()->route('berit.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berit)
    {
        return view('berit.show', compact('berit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berit)
    {
        $kategor = Kategori::all();
        return view('berit.edit', compact('kategor','berit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berit)
    {
        $request->validate([
            'Judul' => 'required',
            'IsiBerita' => 'required',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);
        $berit->update($request->all());

        return redirect()->route('berit.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berit)
    {
        $berit->delete();
        return redirect()->route('berit.index')->with('succes','Data Berhasil di Hapus');
    }
}
