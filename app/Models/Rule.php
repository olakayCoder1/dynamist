<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rules(): BelongsToMany
    {
        return $this->belongsToMany(
            InputType::class, 
            'input_rules', 
            'rule_id',
            'input_type_id'
            
        );
    }
}
