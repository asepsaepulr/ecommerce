<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use File;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=0;
        $galeri =Galeri::all();
        return view('backEnd.galeri.index',compact('menu_active','galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $menu_active=2;
      $galeri = Galeri::all();
      return view('backEnd.galeri.create',compact('menu_active','galeri'));
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'gambar' => '',
        'slug' => '',
        
    ]);
       $galeri = new Galeri;
       if ($request->file('gambar')) {
        $file = $request->file('gambar');
        $destinationPath = public_path(). '/assets/img/galeri/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $galeri->gambar = $filename;
    }
    $galeri->slug =str_slug($request->nama_barang,'-');
    $galeri->save();
    return redirect()->route('galeri.index');
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
       $galeri = Galeri::findOrFail($id);
       return view('backEnd.galeri.edit',compact('menu_active','galeri'));
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
           'gambar' => '',
           'slug' => '',
           
       ]);
       $galeri = Galeri::findOrFail($id);
       if ($request->file('gambar')) {
        $file = $request->file('gambar');
        $destinationPath = public_path(). '/assets/img/galeri/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        if ($galeri->gambar) {
            $old_gambar = $galeri->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/galeri'
            . DIRECTORY_SEPARATOR . $galeri->gambar;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $galeri->gambar = $filename;
    }
    $galeri->slug =str_slug($request->p_name,'-');
    $galeri->save();
    return redirect()->route('galeri.index');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete=Galeri::findOrFail($id);
       $delete->delete();
       return redirect()->route('galeri.index')->with('message','Delete Success!');
   }
}
