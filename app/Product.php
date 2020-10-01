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
  
  public function scopeType($query, $type, $valor) 
  {
  
  if ($type == 'description')
      {
        $query->where('description', 'like', '%' . $valor . '%')->orderBy('description');

      } else
      {
        $query->orderBy('description');
      }
  }
}
