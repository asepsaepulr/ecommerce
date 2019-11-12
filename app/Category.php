<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;


class Category extends Model
{
	protected $table='categories';
	protected $primaryKey='id';
	protected $fillable=['parent_id','name','description','status'];

	  public function products(){
    	return $this->hasMany('App\Products','categories_id');
    }
     public function categories(){
    	return $this->hasMany('App\Category','parent_id');
    }


      public static function boot()
{
	parent::boot();
	self::deleting(function($categories) {
		// mengecek apakah penulis masih punya buku
		if ($categories->products->count() > 0) {
			// menyiapkan pesan error
			$html = 'Penulis tidak bisa dihapus karena masih memiliki buku : ';
			$html .= '<ul>';
			foreach ($categories->products as $product) {
				$html .= "<li>$product->p_name</li>";
			}
			$html .= '</ul>';

		Session::flash("flash_notification",[
			'level'=>"danger",
			"message"=>"$html"
		]);
		// membatalkan proses penghapusan
		return false;
		}
	});
}
}
