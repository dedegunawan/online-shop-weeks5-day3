<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = (new Menu())->menu_parent();
        return view('menu.index', array('menus' => $menus));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
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
            'nama_menu' => 'required',
            'url' => 'required'
        ]);

        // proses simpan data
        $menu = Menu::create($request->only([
            'nama_menu', 'icon', 'parent', 'url'
        ]));

        // kembali ke halaman utama
        return redirect(route('menus.index'))
            ->with('success_message', 'Berhasil menambah menu baru');
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
        $menu = Menu::find($id);
        if (!$menu) return redirect()->back();
        return view('menu.edit', ['menu' => $menu]);
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
        $menu = Menu::find($id);
        if (!$menu) return redirect()->back();
        $validatedDate = $this->validate($request, [
            'nama_menu' => 'required',
            'url' => 'required'
        ]);
        $menu->update($request->only([
            'nama_menu', 'icon', 'parent', 'url'
        ]));
        return redirect(route('menus.index'))
            ->with('success_message', 'Berhasil mengupdate menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check ada tidak?
        $menu = Menu::find($id);
        if (!$menu) return redirect()->back();

        // check punya child?
        $child = $menu->child;
        if ($child && $child->count()) return redirect()->back();

        // delete menu
        $menu->delete();

        // kembali
        return redirect(route('menus.index'))
            ->with('success_message', 'Berhasil menghapus menu');

    }
}
