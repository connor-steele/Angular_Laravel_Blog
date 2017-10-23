<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Comment;
class CommentTableSeeder extends Seeder 
{

	public function run()
	{
		DB::table('comments')->delete();

		Comment::create(array(
			'author' => 'Chris Sevilleja',
			'body' => 'Look I am a test comment.',
			'title' => 'Hey there, check out this nice test!',
			'date' => date("Y/m/d")
		));

		Comment::create(array(
			'author' => 'Nick Cerminara',
			'body' => 'This is going to be super crazy.',
			'title' => 'Hey there, check out this nice test!',
			'date' => date("Y/m/d")
		));

		Comment::create(array(
			'author' => 'Holly Lloyd',
			'body' => 'I am a master of Laravel and Angular.',
			'title' => "My favorite sauce is Jumpin n' Johnny's Hot Sauce",
			'date' => date("Y/m/d")
		));
	}

}