<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InputType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getHasValidationAttribute($value){
        return $value == 1 ? true : false;
    }
    public function getHasOptionsAttribute($value){
        return $value == 1 ? true : false;
    }
    public function getIsDateAttribute($value){
        return $value == 1 ? true : false;
    }

    public function rules(): BelongsToMany
    {
        return $this->belongsToMany(
            Rule::class, 
            'input_rules', 
            'input_type_id', 
            'rule_id'
        );
    }

}
