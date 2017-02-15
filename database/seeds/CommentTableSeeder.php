<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        for ($i=0; $i < 50 ; $i++) {
        	for ($a=0; $a < 4 ; $a++) {
        	Comment::create(['comment' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'post_id' => $i + '1',
                    'user_id' => rand(1,4)
                    ]);
    		}
    	}
	}
}