<?php namespace App\Services;

use Input;
use App\Models\BookCategory;
use App\Services\Interfaces\CRUD;
use Illuminate\Support\Facades\Validator;

class BookCategoryService implements CRUD
{
    public function createValidator(array $data)
    {
        return Validator::make($data,[
            'name' => 'required',
        ]);
    }

    public function create($bookCategory)
    {
        return $bookCategory->create([
            'name' => Input::get('name'),
            'enabled' => Input::get('enabled') == "on" ? 1 : 0
        ]);
    }

    public function edit($bookCategory)
    {
        $bookCategory->name = Input::get('name');
        $bookCategory->enabled = Input::get('enabled') == "on" ? 1 : 0;

        return $bookCategory->save();
    }

    public function deleteItem($bookCategory)
    {
        $bookCategory->delete();
    }
}