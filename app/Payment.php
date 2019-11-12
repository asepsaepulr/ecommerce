<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table='payment_confirm';
	protected $primaryKey='id';
	protected $fillable=['email','name_order','code_order','owner_rekening','transfer','nominal_pembayaran','note','gambar'];
}
