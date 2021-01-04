<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoordinacionZona extends Model
{
    protected $table ='coordinacionDeZona';
    protected $fillable = ["nombre", "municipio_id","num_coordinacion"];

    public function municipio()
    {
    	return $this->belongsTo('App\Municipio');
    }
}
