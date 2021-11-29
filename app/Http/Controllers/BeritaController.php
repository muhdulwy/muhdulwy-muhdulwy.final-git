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
        $Berit = Berita::latest()->paginate(5);
        return view ('Berit.index',compact('Berit'))->with('i',(request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategor = Kategori::all();
        
        return view('Berit.create', compact('kategor'));
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
            'JudulBerita' => 'required',
            'IsiBerita' => 'required',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);
        
        Berita::create($request->all());

        return redirect()->route('Berit.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $Berit)
    {
        return view('Berit.show', compact('Berit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $Berit)
    {
        return view('Berit.edit', compact('Berit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $Berit)
    {
        $request->validate([
            'JudulBerita' => 'required',
            'IsiBerita' => 'required',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);
        $Berit->update($request->all());

        return redirect()->route('Berit.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $Berit)
    {
        $Berit->delete();
        return redirect()->route('Berit.index')->with('succes','Data Berhasil di Hapus');
    }
}
