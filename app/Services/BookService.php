<?php namespace App\Services;

use Input;
use App\Services\Interfaces\CRUD;
use Illuminate\Support\Facades\Validator;

class BookService implements CRUD
{

    public function createValidator(array $data)
    {
        return Validator::make($data,[
            'name' => 'required',
            'desc' => 'required',
            'book_category' => 'required'
        ]);
    }

    public function create($book)
    {
        return $book->create([
            'book_category_id' => Input::get('book_category'),
            'name' => Input::get('name'),
            'desc' => Input::get('desc'),
            'enabled' => Input::get('enabled') == "on" ? 1 : 0
        ]);
    }

    public function edit($book)
    {
        $book->book_category_id = Input::get('book_category');
        $book->name = Input::get('name');
        $book->desc = Input::get('name');
        $book->enabled = Input::get('enabled') == "on" ? 1 : 0;

        return $book->save();
    }

    public function deleteItem($book)
    {
        $book->delete();
    }
}