<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rule;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rules = [
            [
                "id"=> 1,
                "name"=> "Maximum length",
            ],
            [
                "id"=> 2,
                "name"=> "Minimum length",
            ],
            [
                "id"=> 3,
                "name"=> "length",
            ],
            [
                "id"=> 4,
                "name"=> "contains",
            ],
            [
                "id"=> 5,
                "name"=> "Doesn't contain",
            ],
            [
                "id"=> 6,
                "name"=> "Matches",
            ],
            [
                "id"=> 7,
                "name"=> "Greater than",
            ],
            [
                "id"=> 8,
                "name"=> "Greater than or equal to",
            ],
            [
                "id"=> 9,
                "name"=> "Less than",
            ],
            [
                "id"=> 10,
                "name"=> "Less than or equal to",
            ],
            [
                "id"=> 11,
                "name"=> "URL",
            ],
            [
                "id"=> 12,
                "name"=> "Email",
            ],
            [
                "id"=> 13,
                "name"=> "Select at leat",
            ],
            [
                "id"=> 14,
                "name"=> "Select at most",
            ],
            [
                "id"=> 15,
                "name"=> "Select exact",
            ]
            
            ];

        foreach ($rules as $rule) {
            $rule = Rule::create($rule);
        };
            
    }
}
