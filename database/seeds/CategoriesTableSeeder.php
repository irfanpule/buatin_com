<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // categories
        $categories = [
            'Pemrograman & Teknologi', 
            'Desain Grafis',
            'Desain Arsitektur & Interior',
            'Fotografi', 
            'Videografi', 
            'Mode', 
            'Otomotif', 
            'Furnitur',
            'Kerajinan Tangan',
            'Seni Rupa',
            'Musik',
        ];

        foreach ($categories as $key => $category) {
            DB::table('categories')->insert([
                'category' => $category,
                'parent_id' => 0,
                'parent' => 0,
                'child' => 0,
            ]);
        }

        echo 'Berhasil isi data kategori';

    }
}
