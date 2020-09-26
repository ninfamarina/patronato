<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = ["nombre"];

    public function ciudades() 
    {
    	return $this->hasMany('App\Ciudad');
    }

    public function coordinacionZonas() 
    {
    	return $this->hasMany('App\CoordinacionZona');
    }
}
