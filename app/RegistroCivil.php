<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroCivil extends Model
{
    protected $fillable = ["nombre"];
    protected $table ="registro_civil";
}
