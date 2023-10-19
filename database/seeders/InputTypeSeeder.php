<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InputType;
class InputTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
            [
                "id"=> 1,
                "name"=> "Number",
                "has_validation" => true
            ],
            [
                "id"=> 2,
                "name"=> "Short text",
                "has_validation" => true
            ],
            [
                "id"=> 3,
                "name"=> "Long text",
                "has_validation" => true
            ],
            [
                "id"=> 4,
                "name"=> "Checkbox",
                "has_validation" => true,
                "has_options" => true,
            ],
            [
                "id"=> 5,
                "name"=> "Select",
                "has_validation" => true,
                "has_options" => true,
            ],
            [
                "id"=> 6,
                "name"=> "Radio",
                "has_options" => true,
            ],
            [
                "id"=> 7,
                "name"=> "Date",
                "is_date" => true,
            ]

            ];

        foreach ($rules as $rule) {
            $rule = InputType::create($rule);
        };
    }
}
