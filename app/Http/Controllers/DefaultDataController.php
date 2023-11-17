<?php

namespace App\Http\Controllers;

use App\Models\InputType;
use App\Http\Resources\InputTypeResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class DefaultDataController extends Controller
{
    
    public function index(){
        $data = InputType::get()
            ->transform(function($item){
                return (new InputTypeResource($item));
            });

        return response()->json($data);
    }
}
