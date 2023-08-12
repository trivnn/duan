<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("details")->delete();
        $details=[
            ["user"=>1,"birth"=>1],
            ["user"=>2,"birth"=>2],
            ["user"=>3,"birth"=>3],
            ["user"=>4,"birth"=>4],
            ["user"=>5,"birth"=>5],
            ["user"=>6,"birth"=>6],
           
        ];
        DB::table("details")->insert($details);
    }
}
