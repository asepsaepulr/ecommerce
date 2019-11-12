<?php

namespace App\Http\Controllers;


use App\Category;
use App\Products;
use App\Orders;
use App\User;
use Image;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=3;
        $i=0;
        $products=Products::orderBy('created_at','desc')->get();
        return view('backEnd.products.index',compact('menu_active','products','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=3;
        $categories=Category::where('parent_id',0)->pluck('name','id')->all();
        return view('backEnd.products.create',compact('menu_active','categories'));
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
           'p_code'=>'required|unique:products|min:3',
           'p_name'=>'required|min:5',
           'p_color'=>'required',
           'description'=>'required',
           'price'=>'required|numeric',
           'image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
       ]);
        $formInput=$request->all();
        if($request->file('image')){
            $image=$request->file('image');
            if($image->isValid()){
                $fileName=time().'-'.str_slug($formInput['p_name'],"-").'.'.$image->getClientOriginalExtension();
                $large_image_path=public_path('products/large/'.$fileName);
                $medium_image_path=public_path('products/medium/'.$fileName);
                $small_image_path=public_path('products/small/'.$fileName);
                //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(600,600)->save($medium_image_path);
                Image::make($image)->resize(300,300)->save($small_image_path);
                $formInput['image']=$fileName;
            }
        }
        Products::create($formInput);
        return redirect()->route('product.create')->with('message','Add Products Successfully!');
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

    public function searchProducts(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $categories = Category::with('categories')->where(['parent_id' => 0])->get();
            $search_product = $data['product'];
            $products = Products::where('p_name','like','%'.$search_product.'%')->orwhere('p_code',$search_product)->where('description')->get();

            return view('frontEnd.listing')->with(compact('categories','products','search_product')); 

        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active=3;
        $categories=Category::where('parent_id',0)->pluck('name','id')->all();
        $edit_product=Products::findOrFail($id);
        $edit_category=Category::findOrFail($edit_product->categories_id);
        return view('backEnd.products.edit',compact('edit_product','menu_active','categories','edit_category'));
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
     $update_product=Products::findOrFail($id);
     $this->validate($request,[
        'p_code'=>'required|unique:products|min:3',
        'p_name'=>'required|min:5',
        'p_color'=>'required',
        'description'=>'required',
        'price'=>'required|numeric',
        'image'=>'image|mimes:png,jpg,jpeg|max:1000',
    ]);
     $formInput=$request->all();
     if($update_product['image']==''){
        if($request->file('image')){
            $image=$request->file('image');
            if($image->isValid()){
                $fileName=time().'-'.str_slug($formInput['p_name'],"-").'.'.$image->getClientOriginalExtension();
                $large_image_path=public_path('products/large/'.$fileName);
                $medium_image_path=public_path('products/medium/'.$fileName);
                $small_image_path=public_path('products/small/'.$fileName);
                    //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(600,600)->save($medium_image_path);
                Image::make($image)->resize(300,300)->save($small_image_path);
                $formInput['image']=$fileName;
            }
        }
    }else{
        $formInput['image']=$update_product['image'];
    }
    $update_product->update($formInput);
    return redirect()->route('product.index')->with('message','Update Products Successfully!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $delete=Products::findOrFail($id);
     $image_large=public_path().'/products/large/'.$delete->image;
     $image_medium=public_path().'/products/medium/'.$delete->image;
     $image_small=public_path().'/products/small/'.$delete->image;
     if($delete->delete()){
        unlink($image_large);
        unlink($image_medium);
        unlink($image_small);
    }
    return redirect()->route('product.index')->with('message','Delete Success!');
}
public function deleteImage($id){
        //Products::where(['id'=>$id])->update(['image'=>'']);
    $delete_image=Products::findOrFail($id);
    $image_large=public_path().'/products/large/'.$delete_image->image;
    $image_medium=public_path().'/products/medium/'.$delete_image->image;
    $image_small=public_path().'/products/small/'.$delete_image->image;
    if($delete_image){
        $delete_image->image='';
        $delete_image->save();
            ////// delete image ///
        unlink($image_large);
        unlink($image_medium);
        unlink($image_small);
    }
    return back();
    
}
public function userOrders(){
    $user_id = Auth::User()->id;
    $orders = Orders::with('orders')->where('users_id',$user_id)->orderBy('id','DESC')->get();
        /*$orders = json_decode(json_encode($orders));
        echo "<pre>"; print_r($orders); die;*/
        return view('checkout.user_orders')->with(compact('orders'));
    }

    public function userOrderDetails($order_id){
        $user_id = Auth::User()->id;
        $orderDetails = Orders::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        /*echo "<pre>"; print_r($orderDetails); die;*/
        return view('checkout.user_order_details')->with(compact('orderDetails'));
    }
    public function viewOrders(){
        $orders = Orders::with('orders')->orderBy('id','Desc')->get();
        $orders = json_decode(json_encode($orders));
        /*echo "<pre>"; print_r($orders); die;*/
        return view('backEnd.orders.view_orders')->with(compact('orders'));
    }
    public function viewOrderDetails($order_id){
        $orderDetails = Orders::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        /*echo "<pre>"; print_r($orderDetails); die;*/
        $users_id = $orderDetails->users_id;
        $userDetails = User::where('id',$users_id)->first();
        /*$userDetails = json_decode(json_encode($userDetails));
        echo "<pre>"; print_r($userDetails);*/
        return view('backEnd.orders.order_details')->with(compact('orderDetails','userDetails'));
    }
    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            Orders::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            return redirect()->back()->with('flash_message_success','Order Status has been updated successfully!');
        }
    }
}
