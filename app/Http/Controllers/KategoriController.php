<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->cari){
            $cari = '%' . $request->cari . '%';
            $kategor=Kategori::where('NamaKategori','like', $cari)
                ->paginate(10);
        } else {
            $kategor = Kategori::latest()->paginate(10);
        }

        return view ('kategor.index',compact('kategor'))->with('i',(request()->input('page', 1)-1)* 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategor.create',);
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
            'NamaKategori' => 'required',

        ]);
        Kategori::create($request->all());

        return redirect()->route('kategor.index')->with('succes','Data Berhasil Di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategor)
    {
        return view('kategor.show', compact('kategor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategor)
    {
        return view('kategor.edit', compact('kategor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategor)
    {
        $request->validate([
            'NamaKategori' => 'required',
        ]);

        $kategor->update($request->all());

        return redirect()->route('kategor.index')->with('succes','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategor)
    {
        $kategor->delete();
        return redirect()->route('kategor.index')->with('succes','Data Berhasil Di Hapus');
    }
}
