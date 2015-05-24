<?php

use Illuminate\Database\Seeder;
use App\Models\BookCategory;

class BookCategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('book_categories')->delete();

        BookCategory::create([
            'id' => 1,
            'name' => 'Fiction',
            'enabled' => 1,
        ]);

        BookCategory::create([
            'id' => 2,
            'name' => 'Mystery',
            'enabled' => 1,
        ]);

        BookCategory::create([
            'id' => 3,
            'name' => 'Drama',
            'enabled' => 1,
        ]);

        BookCategory::create([
            'id' => 4,
            'name' => 'Horror',
            'enabled' => 1,
        ]);
    }

}