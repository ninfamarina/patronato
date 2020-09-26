<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolFiguraSolidaria extends Model
{
    protected $fillable = ["nombre", "no_rol"];
    protected $table ="roles";
}
