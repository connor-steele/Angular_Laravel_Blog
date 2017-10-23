<?php

use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('blogposts')->insert([
            'title' => 'Who is the greatest?',
            'body' => 'I am the GOAT developer.',
            'author' => 'Connor Steele',
            'date' => date("Y/m/d")
            ]);
    }
}
