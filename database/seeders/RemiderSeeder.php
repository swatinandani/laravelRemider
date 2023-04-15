<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reminder;

class RemiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "title" => "class 6 maths query",
                "description" => "all maths question and answer display here",
                "datetime" => "2023-04-14 17:16:45"
                
            ],
            [
                "title" => "class 7 maths query",
                "description" => "all maths question and answer display here",
                "datetime" =>  "2023-04-14 16:16:45"
              
            ],
        ];
  
        foreach ($users as $key => $value) {
            Reminder::create($value);
        }
    }
}
