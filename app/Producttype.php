<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producttype extends Model
{
    protected $fillable = [
		'description'
	];
	    

    public function products(){
    	return $this->HasMany(Product::class);
    }
}
