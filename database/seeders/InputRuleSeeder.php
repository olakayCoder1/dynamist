<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InputRule;
class InputRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // short text 
        $shot_text = [
            [
                "id"=> 1,
                "input_type_id"=> 2,
                "rule_id" => 1
            ],
            [
                "id"=> 2,
                "input_type_id"=> 2,
                "rule_id" => 2
            ],
            [
                "id"=> 3,
                "input_type_id"=> 2,
                "rule_id" => 4
            ],
            [
                "id"=> 4,
                "input_type_id"=> 2,
                "rule_id" => 5
            ],
            [
                "id"=> 5,
                "input_type_id"=> 2,
                "rule_id" => 6
            ],
            [
                "id"=> 14,
                "input_type_id"=> 2,
                "rule_id" => 11
            ],
            [
                "id"=> 15,
                "input_type_id"=> 2,
                "rule_id" => 12
            ]
          
        ];

        foreach ($shot_text as $rule) {
            $rule = InputRule::create($rule);
        };


        // long text
        $long_text = [
            [
                "id"=> 6,
                "input_type_id"=> 3,
                "rule_id" => 1
            ],
            [
                "id"=> 7,
                "input_type_id"=> 3,
                "rule_id" => 2
            ],
            [
                "id"=> 8,
                "input_type_id"=> 3,
                "rule_id" => 4
            ],
            [
                "id"=> 9,
                "input_type_id"=> 3,
                "rule_id" => 5
            ],
            [
                "id"=> 10,
                "input_type_id"=> 3,
                "rule_id" => 6
            ]
          
        ];

        foreach ($long_text as $rule) {
            $rule = InputRule::create($rule);
        };


        // check box
        $checkbox_text = [
            [
                "id"=> 11,
                "input_type_id"=> 4,
                "rule_id" => 13
            ],
            [
                "id"=> 12,
                "input_type_id"=> 3,
                "rule_id" => 14
            ],
            [
                "id"=> 13,
                "input_type_id"=> 3,
                "rule_id" => 15
            ]
          
        ];

        foreach ($checkbox_text as $rule) {
            $rule = InputRule::create($rule);
        };


        // Select text
        $select_text = [
            [
                "id"=> 16,
                "input_type_id"=> 5,
                "rule_id" => 13
            ],
            [
                "id"=> 17,
                "input_type_id"=> 5,
                "rule_id" => 14
            ],
            [
                "id"=> 18,
                "input_type_id"=> 5,
                "rule_id" => 15
            ]
          
        ];

        foreach ($select_text as $rule) {
            $rule = InputRule::create($rule);
        };


    }
}
