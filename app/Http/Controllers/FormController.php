<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    
    public function index(Request $request){
        $validator = Validator::make($request->json()->all(), [
            "title"=> "required|string|max:200",
            "description"=> "string",
        ]);
        if($validator->fails()){
            return response()->json(
                [
                    "status"=> false,
                    "message"=> $validator->messages(),
                ],400);
        }else{
            $newForm = Form::create([
                "title"=> $request->title,
                "user_id" => 1,
                "description"=> $request->description,
            ]);
            return response()->json(
                [
                    "status"=> true,
                    "data"=> $request->json()->all()
                ],200);
        }
    }
}


