<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       
        $tests = [
            ["name"=>"Name 1"],
            ["name"=>"Name 2"],
            ["name"=>"Name 3"],
            ["name"=>"Name 4"],
            ["name"=>"Name 5"],
            ["name"=>"Name 6"],
            ["name"=>"Name 7"],
            ["name"=>"Name 8"],
            ["name"=>"Name 9"],
            ["name"=>"Name 10"],
        ];
        DB::table('tests')->delete();
        DB::table('tests')->insert($tests);
        
    
    }
}
