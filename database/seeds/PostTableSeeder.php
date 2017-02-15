<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;

class PostTableSeeder extends Seeder
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

           /* $post = ['title' => 'Prueba'.' '.$i,
                    'content' => str_random(500),
                    'imagen' => 'prueba'.rand(1,6).'.jpg',
                    'url' => 'Prueba'.'-'.$i
                    ];*/
                    $post = new Post;
                    $post->title = 'Prueba'.' '.$i;
                    $post->content = $faker->text($maxNbChars = 700);
                    $post->imagen = 'prueba'.rand(1,6).'.jpg';
                    $post->url = 'Prueba'.'-'.$i;
                    $post->user_id = rand(2,4);

                    $post->save();

         	/*Post::create($post);*/
            if($post->save()){
            $post->categories()->sync(['category_id' => rand(1,5)]);
        }
         }
    }
}
