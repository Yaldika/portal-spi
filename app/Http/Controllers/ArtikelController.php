<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $artikel = Artikel::all();
    return view('back.artikel.index', [
        'artikel' => $artikel
    ]);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('back.artikel.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::user()->id;
        $data['views'] = 0;
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('assets/artikel', 'public');

        Artikel::create($data);
                return redirect()->route('artikel.index')->with(['success' => 'Data berhasil tersimpan']);
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
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();
        return view('back.artikel.edit', [
            'artikel' => $artikel,
            'kategori' => $kategori
        ]);
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
    $artikel = Artikel::find($id);

    if (!$artikel) {
        return redirect()->route('artikel.index')->with(['error' => 'Data tidak ditemukan']);
    }

    if (empty($request->file('gambar_artikel'))) {
        $artikel->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'body' => $request->body,
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::user()->id,
            'gambar_artikel' => $artikel->gambar_artikel,
            'is_active' => $request->is_active
            
        ]);
        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil diupdate']);
    } else {
        Storage::delete($artikel->gambar_artikel);
        $artikel->update([
            'judul' => $request->judul,
            'body' => $request->body,
            'slug' => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'is_active' => $request->is_active,
            'user_id' => Auth::user()->id,
            'gambar_artikel' => $request->file('gambar_artikel')->store('assets/artikel', 'public'),
        ]);
        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil diupdate']);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();
        return redirect()->route('artikel.index')->with(['delete' => 'Data berhasil terhapus']);
    }
}
