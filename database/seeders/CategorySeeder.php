<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use \Carbon\Carbon;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('category')->insert([
            'name' => Str::random(10),
            'description' => Str::random(100),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
