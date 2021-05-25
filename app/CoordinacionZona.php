<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoordinacionZona extends Model
{
    protected $table ='coordinacionDeZona';
    protected $fillable = ["nombre", "municipio_id","num_coordinacion","nombre_encargado","apellido_paterno","apellido_materno","numero_celular","email"];

    public function municipio()
    {
    	return $this->belongsTo('App\Municipio');
    }

    public function figurasSolidarias()
    {
        return $this->BelongsToMany('App\FiguraSolidaria', 'FiguraSolidaria_has_coordinacion', 'coordinacionDeZona_id', 'figuraSolidaria_id')
            ->withPivot('created_at');
    }
}
