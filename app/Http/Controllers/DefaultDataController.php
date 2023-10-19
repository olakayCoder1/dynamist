<?php

namespace App\Http\Controllers;

use App\Models\InputType;
use App\Http\Resources\InputTypeResource;
use Illuminate\Http\Request;

class DefaultDataController extends Controller
{
    
    public function index(){
        return InputTypeResource::collection(InputType::all());
    }
}
