<?php
use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Deportes']);
        Category::create(['name' => 'Videojuegos']);
        Category::create(['name' => 'Comida']);
        Category::create(['name' => 'Humor']);
        Category::create(['name' => 'Didactico']);
    }
}
