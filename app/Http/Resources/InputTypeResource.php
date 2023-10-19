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
            "has_validation"=> $this->has_validation,
            "has_options"=> $this->has_options,
            "response_type"=> $this->response_type,
            "is_date"=> $this->is_date,
        ];
    }
}
