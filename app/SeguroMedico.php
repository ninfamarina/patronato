<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguroMedico extends Model
{
    protected $fillable = ["nombre"];
    protected $table ="seguro_medico";
}
