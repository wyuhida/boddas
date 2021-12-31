<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category_Item;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categori = new Category_Item();
        $categori->category_name = 'kecantikan';
        $categori->save();

        $categori = new Category_Item();
        $categori->category_name = 'Kesehatan';
        $categori->save();
    }
}
