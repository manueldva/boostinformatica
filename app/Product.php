<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
		'producttype_id','description','price','stock'
  ];
    

  public function producttype(){
		
		return $this->belongsTo(Producttype::class);
	}
  
  public function scopeType($query, $producttype_id, $valor) 
  {
  
  if ($producttype_id)
      {
        $query->where('description', 'like', '%' . $valor . '%')->where('producttype_id', '=', $producttype_id)->orderBy('description');

      } else
      {
        $query->orderBy('description');
      }
  }
}
