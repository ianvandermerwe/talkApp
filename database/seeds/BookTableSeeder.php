<?php

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookTableSeeder extends Seeder {

    public function run()
    {
        DB::table('books')->delete();

        //Fiction Books
        Book::create([
            'book_category_id' => '1',
            'name' => 'Lord of the Rings',
            'desc' => 'lotr description',
            'enabled' => '1'
        ]);

        Book::create([
            'book_category_id' => '1',
            'name' => 'Harry Potter',
            'desc' => 'hp description',

        ]);

        Book::create([
            'book_category_id' => '1',
            'name' => 'Animal Farm',
            'desc' => 'af description',
            'enabled' => '1'
        ]);

        Book::create([
            'book_category_id' => '1',
            'name' => 'The Hunger Games',
            'desc' => 'thg description',
            'enabled' => '1'
        ]);

        //Mystery Books
        Book::create([
            'book_category_id' => '2',
            'name' => 'The Da Vinci Code',
            'desc' => 'tdvc description',
            'enabled' => '1'
        ]);

        Book::create([
            'book_category_id' => '2',
            'name' => 'Angles & Demons',
            'desc' => 'a&d description',
            'enabled' => '1'
        ]);

        //Drama Books
        Book::create([
            'book_category_id' => '3',
            'name' => 'Romeo and Juliet',
            'desc' => 'raj description',
            'enabled' => '1'
        ]);

        Book::create([
            'book_category_id' => '3',
            'name' => 'Hamlet',
            'desc' => 'h description',
            'enabled' => '1'
        ]);

        Book::create([
            'book_category_id' => '3',
            'name' => 'Macbeth',
            'desc' => 'm description',
            'enabled' => '1'
        ]);

        Book::create([
            'book_category_id' => '3',
            'name' => 'Othello',
            'desc' => 'o description',
            'enabled' => '1'
        ]);

        //Horror Books
        Book::create([
            'book_category_id' => '4',
            'name' => 'The Shining',
            'desc' => 'ts description',
            'enabled' => '1'
        ]);

        Book::create([
            'book_category_id' => '4',
            'name' => 'The Stand',
            'desc' => 'ts description',
            'enabled' => '1'
        ]);

        Book::create([
            'book_category_id' => '4',
            'name' => 'Frankenstein',
            'desc' => 'f description',
            'enabled' => '1'
        ]);
    }

}