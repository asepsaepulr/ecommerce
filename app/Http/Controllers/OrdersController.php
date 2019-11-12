<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Orders;
use App\OrdersProduct;
use App\DeliveryAddress;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class OrdersController extends Controller
{

 public function index(){
    $session_id=Session::get('session_id');
    $cart_datas=Cart::where('session_id',$session_id)->get();
    $total_price=0;
    foreach ($cart_datas as $cart_data){
        $total_price+=$cart_data->price*$cart_data->quantity;
    }
    $shipping_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
    return view('checkout.review_order',compact('shipping_address','cart_datas','total_price'));
}
public function order(Request $request){
   if($request->isMethod('post')){
            $data = $request->all();
            $users_id = Auth::user()->id;
            $users_email = Auth::user()->email;

            // Get Shipping Address of User
            $shippingDetails = DeliveryAddress::where(['users_email' => $users_email])->first();

            /*echo "<pre>"; print_r($data); die;*/

            if(empty(Session::get('CouponCode'))){
               $coupon_code = ''; 
            }else{
               $coupon_code = Session::get('CouponCode'); 
            }

            if(empty(Session::get('CouponAmount'))){
               $coupon_amount = ''; 
            }else{
               $coupon_amount = Session::get('CouponAmount'); 
            }

            $order = new Orders;
            $order->users_id = $users_id;
            $order->users_email = $users_email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->state = $shippingDetails->state;
            $order->pincode = $shippingDetails->pincode;
            $order->country = $shippingDetails->country;
            $order->mobile = $shippingDetails->mobile;
            $order->coupon_code = $coupon_code;
            $order->coupon_amount = $coupon_amount;
            $order->order_status = "New";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();

            $order_id = DB::getPdo()->lastInsertId();

            $cartProducts = DB::table('cart')->where(['user_email'=>$users_email])->get();
            foreach($cartProducts as $pro){
                $cartPro = new OrdersProduct;
                $cartPro->order_id = $order_id;
                $cartPro->users_id = $users_id;
                $cartPro->product_id = $pro->products_id;
                $cartPro->product_code = $pro->product_code; 
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_color = $pro->product_color;
                $cartPro->product_size = $pro->size;
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();
            }

            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);
            
            if($data['payment_method']=="BANK"){

                $productDetails = Orders::with('orders')->where('id',$order_id)->first();
                $productDetails = json_decode(json_encode($productDetails),true);
                /*echo "<pre>"; print_r($productDetails);*/ /*die;*/

                $userDetails = User::where('id',$users_id)->first();
                $userDetails = json_decode(json_encode($userDetails),true);
                /*echo "<pre>"; print_r($userDetails); die;
*/
                /* Code for Order Email Start */
                $email = $users_email;
                $messageData = [
                    'email' => $email,
                    'name' => $shippingDetails->name,
                    'order_id' => $order_id,
                    'productDetails' => $productDetails,
                    'userDetails' => $userDetails
                ];
                Mail::send('emails.order',$messageData,function($message) use($email){
                    $message->to($email)->subject('Order Placed - E-com Website');    
                });
                /* Code for Order Email Ends */

                // COD - Redirect user to thanks page after saving order
                return redirect('/bank');
            }

        }
    }
public function cod(){
    $user_order=Orders::where('users_id',Auth::id())->first();
    return view('payment.cod',compact('user_order'));
}
}
