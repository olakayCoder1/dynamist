<?php

namespace App\Http\Resources;

use App\Http\Resources\InputRuleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InputTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "rules" => array_map(function($rule){
                return [
                    "name"=> $rule['name']
                ];
            },$this->rules->toArray()),
        ];
    }
}
