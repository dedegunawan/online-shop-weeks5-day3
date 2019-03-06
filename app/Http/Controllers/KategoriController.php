<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategories = Kategori::all();
        return view('kategori.index', compact('kategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data
        $validatedDate = $this->validate($request, [
            'nama_kategori' => 'required',
        ]);

        // proses simpan data
        $menu = Kategori::create($request->only([
            'nama_kategori'
        ]));

        // kembali ke halaman utama
        return redirect(route('kategories.index'))
            ->with('success_message', 'Berhasil menambah kategori baru');
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
        $kategori = Kategori::find($id);
        if (!$kategori) return redirect()->back();
        return view('kategori.edit', array('kategori' => $kategori));
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
        // validasi data
        $validatedDate = $this->validate($request, [
            'nama_kategori' => 'required',
        ]);


        $kategori = Kategori::find($id);
        if (!$kategori) return redirect()->back();

        $kategori->update($request->only([
            'nama_kategori'
        ]));


        // kembali ke halaman utama
        return redirect(route('kategories.index'))
            ->with('success_message', 'Berhasil mengubah kategori');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) return redirect()->back();

        $kategori->delete();

        // kembali ke halaman utama
        return redirect(route('kategories.index'))
            ->with('success_message', 'Berhasil manghapus kategori');
    }

    public function count() {
        $kategoris = Kategori::all();
        foreach ($kategoris as $kategori) {
            $jumlah_produk = $kategori->product->count();
            $kategori->jumlah_produk = $jumlah_produk;
            $kategori->update();
        }
        return redirect(route('kategories.index'))
            ->with('success_message', 'Berhasil menghitung ulang produk');
    }
}
