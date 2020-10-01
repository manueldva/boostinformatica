<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producttype extends Model
{
    protected $fillable = [
		'description'
	];
	    

    /*public function receptions(){
    	return $this->HasMany(Reception::class);
    }*/
}
