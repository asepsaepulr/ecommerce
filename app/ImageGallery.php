<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
	protected $table='tblgallery';
	protected $primaryKey='id';
	protected $fillable=['products_id','image'];
}
