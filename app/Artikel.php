<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
     protected $table='artikels';

    protected $fillable=['judul','gambar','deskripsi'];

    public $timestamps=true;
    public function getRouteKeyName()
    {
    	return 'slug';
    }
}