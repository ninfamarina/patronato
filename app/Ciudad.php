<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = ["nombre", "municipio_id"];
    protected $table = "ciudades";

    public function municipio()
    {
    	return $this->belongsTo('App\Municipio');
    }
}
