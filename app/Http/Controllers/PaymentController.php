<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use File;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=0;
        $payment =Payment::orderBy('created_at','desc')->get();
        return view('backEnd.payment.index',compact('menu_active','payment'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $menu_active=2;
     $payment = Payment::all();
     return view('backEnd.payment.create',compact('menu_active','payment'));
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
        'email' => 'required|max:255',
        'name_order' => 'required|max:255',
        'code_order' =>'required|unique|max:255',
        'owner_rekening' => 'required|max:255',
        'transfer' => 'required|max:255',
        'nominal_pembayaran' => '',
        'note' => 'required|max:255',
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
    return redirect()->route('payment.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
   }
