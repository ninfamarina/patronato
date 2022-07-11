<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiguraSolidaria extends Model
{
	protected $table = "figuras_solidarias";
    protected $fillable = ["comprobante_grado_estudio",  "comprobante_curp","rfc", "curp","nombre", "apellido_paterno", "apellido_materno", "fecha_nacimiento", "sexo", "domicilio","colonia", "ciudad_id", "hijos", "codigo_postal", "telefono", "fecha_registro","fecha_incorporacion", "carta_compromiso", "comprobante_ine", "seguro_medico_id", "escolaridad_id","comprobante_domicilio" ,"registro_civil_id"];

    public function coordinacionDeZonas()
    {
    	return $this->belongsToMany('App\CoordinacionZona', 'FiguraSolidaria_has_coordinacion', 'figuraSolidaria_id','coordinacionDeZona_id')
            ->withPivot('created_at');
    }

    public function registroCivil()
    {
        return $this->belongsTo(RegistroCivil::class, 'registro_civil_id');
    }

    public function seguroMedico()
    {
        return $this->belongsTo(SeguroMedico::class, 'seguro_medico_id');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }
}
