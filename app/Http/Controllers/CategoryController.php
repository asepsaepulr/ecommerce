<?php

namespace App\Http\Controllers;

use App\Category;
use foo\bar;
use Illuminate\Http\Request;
use Session;
use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=0;
        $categories=Category::all();
        return view('backEnd.category.index',compact('menu_active','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=2;
        $plucked=Category::where('parent_id',0)->pluck('name','id');
        $cate_levels=['0'=>'Main Category']+$plucked->all();
        return view('backEnd.category.create',compact('menu_active','cate_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkCateName(Request $request){
        $data=$request->all();
        $category_name=$data['name'];
        $ch_cate_name_atDB=Category::select('name')->where('name',$category_name)->first();
        if($category_name==$ch_cate_name_atDB['name']){
            echo "true"; die();
        }else {
            echo "false"; die();
        }
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:categories,name',
        ]);
        $data=$request->all();
        Category::create($data);
        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       echo $id;
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
        $plucked=Category::where('parent_id',0)->pluck('name','id');
        $cate_levels=['0'=>'Main Category']+$plucked->all();
        $edit_category=Category::findOrFail($id);
        return view('backEnd.category.edit',compact('edit_category','menu_active','cate_levels'));
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
       $update_categories=Category::findOrFail($id);
       $this->validate($request,[
        'name'=>'required|max:255|unique:categories,name,'.$update_categories->id,
    ]);
        //dd($request->all());die();
       $input_data=$request->all();
       if(empty($input_data['status'])){
        $input_data['status']=0;
    }
    $update_categories->update($input_data);
    alert()->success('Berhasil.','Data telah diubah!');
    return redirect()->route('category.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Category::findOrFail($id);
        $delete->delete();
        return redirect()->route('category.index')->with('message','Delete Success!');
    }
}
