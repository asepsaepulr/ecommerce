<?php

namespace App\Http\Controllers;

use App\Category;
use App\ImageGallery;
use App\ProductAtrr;
use App\Products;
use App\Galeri;
use App\Artikel;
use App\Payment;
use Session;
use file;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
       $products=Products::orderBy('created_at','decs')->get();
       return view('frontEnd.index',compact('products'));
   }
   public function galeri(){
    $galeris = Galeri::all();
    return view('frontEnd.galeri', compact('galeris'));
}
public function artikel(){
    $artikels = Artikel::all();
    return view('frontEnd.blog', compact('artikels'));
}
public function paymentconfirm(){
    $payment = Payment::all();
    return view('frontEnd.payment_confirm', compact('payment'));
}
public function submitpayment(Request $request)
{
   $this->validate($request, [
    'email' => 'required|max:255',
    'name_order' => 'required|max:255',
    'code_order' => 'required|max:255',
    'owner_rekening' => 'required|max:255',
    'transfer' => 'required|max:255',
    'nominal_pembayaran' => 'required|max:255',
    'note' => '',
    'gambar' => '',
]);
   $payment = new Payment;
   $payment->email = $request->email;
   $payment->name_order = $request->name_order;
   $payment->code_order = $request->code_order;
   $payment->owner_rekening = $request->owner_rekening;
   $payment->transfer = $request->transfer;
   $payment->nominal_pembayaran = $request->nominal_pembayaran;
   $payment->note = $request->note;
   if ($request->file('gambar')) {
    $file = $request->file('gambar');
    $destinationPath = public_path(). '/assets/img/payment/';
    $filename = str_random(6).'_'.$file->getClientOriginalName();
    $uploadSuccess = $file->move($destinationPath, $filename);
    $payment->gambar = $filename;
} 
$payment->save();
return redirect ('/payment')->with('message','Payment Confirmation Successfully!');
}
public function blogdetails(Artikel $artikels){

    return view('frontEnd.blogdetails',compact('artikels'));
}

public function shop(){
    $products=Products::latest()->paginate(6);
    $byCate="";
    return view('frontEnd.products',compact('products','byCate'));
}
public function listByCat($id){
    $list_product=Products::where('categories_id',$id)->get();
    $byCate=Category::select('name')->where('id',$id)->first();
    return view('frontEnd.products',compact('list_product','byCate'));
}
public function detialpro($id){
    $detail_product=Products::findOrFail($id);
    $imagesGalleries=ImageGallery::where('products_id',$id)->get();
    $totalStock=ProductAtrr::where('products_id',$id)->sum('stock');
    $relateProducts=Products::where('id','!=',$id)->where(['categories_id' => $detail_product->categories_id])->get();
    return view('frontEnd.product_details',compact('detail_product','imagesGalleries','totalStock','relateProducts'));
}
public function getAttrs(Request $request){
    $all_attrs=$request->all();
        //print_r($all_attrs);die();
    $attr=explode('-',$all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
    $result_select=ProductAtrr::where(['products_id'=>$attr[0],'size'=>$attr[1]])->first();
    echo $result_select->price."#".$result_select->stock;
}
}
