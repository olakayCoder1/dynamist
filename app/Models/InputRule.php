<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputRule extends Model
{
    use HasFactory;

    public function inputType()
    {
        return $this->belongsTo(InputType::class);
    }
}
