<?php

use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->insert([
            'path' => '/themes/one/index.html',
            'thumbnail' => '/themes/one/default.png',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'path' => '/themes/two/index.html',
            'thumbnail' => '/themes/two/default.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

