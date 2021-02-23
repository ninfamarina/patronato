<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiguraSolidaria extends Model
{
	protected $table = "figuras_solidarias";
    protected $fillable = ["comprobante_grado_estudio", "curp",  "comprobante_curp","rfc", "nombre", "apellido_paterno", "apellido_materno", "fecha_nacimiento", "sexo", "domicilio","colonia", "hijos", "codigo_postal", "telefono", "fecha_registro","fecha_incorporacion", "carta_compromiso", "comprobante_ine", "segurdo_medico_id", "escolaridad_id", "registro_civil_id"];
}
