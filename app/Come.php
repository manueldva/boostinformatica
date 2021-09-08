<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Come extends Model
{
    protected $fillable = [
		'description'
	];
	    

    public function receptions(){
    	return $this->HasMany(Reception::class);
    }

    public function clients(){
    	return $this->HasMany(Client::class);
    }
}
