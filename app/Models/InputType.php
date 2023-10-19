<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputType extends Model
{
    use HasFactory;

    public function getHasValidationAttribute($value){
        return $value == 1 ? true : false;
    }
    public function getHasOptionsAttribute($value){
        return $value == 1 ? true : false;
    }
    public function getIsDateAttribute($value){
        return $value == 1 ? true : false;
    }

    public function inputRules()
    {
        return $this->hasMany(InputRule::class, 'id', 'input_type_id');
    }

    public function getInputTypes(){  
        return $this->all();
    }
}
