<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InputRule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getInputRuleById($id)
    {
        return $this->belongsTo(InputType::class);
    }

   
    
}
