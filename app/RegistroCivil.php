<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroCivil extends Model
{
    protected $fillable = ["nombre"];
    protected $table ="registro_civil";

    public function figuraSolidaria()
    {
        return $this->hasOne(FiguraSolidaria::class);
    }
}
