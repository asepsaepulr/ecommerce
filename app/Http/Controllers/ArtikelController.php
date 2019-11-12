<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=0;
        $artikel=Artikel::all();
        return view('backEnd.artikel.index',compact('menu_active','artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=2;
       $artikel = Artikel::all();
       return view('backEnd.artikel.create',compact('menu_active','artikel'));
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
        'judul' => 'required|max:255',
        'gambar' => '',
        'deskripsi' => 'required|min:2',
        'slug' => '',
    ]);
      $artikel = new Artikel;
      $artikel->judul = $request->judul;
      $artikel->slug =str_slug($request->judul,'-');
      $artikel->deskripsi = $request->deskripsi;
      if ($request->file('gambar')) {
        $file = $request->file('gambar');
        $destinationPath = public_path(). '/assets/img/artikel/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $artikel->gambar = $filename;
    } 
    $artikel->save();
    return redirect()->route('artikel.index');
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
        $menu_active=0;
        $artikel = Artikel::findOrFail($id);
        return view('backEnd.artikel.edit',compact('menu_active','artikel'));
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
       $this->validate($request,[
           'judul' => 'required',
           'gambar' => '',
           'deskripsi' => 'required',
           'slug' => '',
           
       ]);
       $artikel = Artikel::findOrFail($id);
       $artikel->judul = $request->judul;
       $artikel->slug =str_slug($request->judul,'-');
       if ($request->file('gambar')) {
        $file = $request->file('gambar');
        $destinationPath = public_path(). '/assets/img/artikel/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        if ($artikel->gambar) {
            $old_gambar = $artikel->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/artikel'
            . DIRECTORY_SEPARATOR . $artikel->gambar;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $artikel->gambar = $filename;
    }
    $artikel->deskripsi = $request->deskripsi;
    $artikel->save();
    return redirect()->route('artikel.index');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $artikel = Artikel::findOrFail($id);
       $artikel->delete();
       return redirect()->route('artikel.index');
   }
}
