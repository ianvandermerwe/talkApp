<?php namespace App\Models;

use App\Services\CRUD;
use Illuminate\Database\Eloquent;

class Book extends Eloquent implements CRUD{

    public function bookCategory()
    {
        $this->belongsTo('App\BookCategory');
    }

    public function editCreateItem($id = null)
    {
        // TODO: Implement editCreateItem() method.
    }

    public function deleteItem($id)
    {
        // TODO: Implement deleteItem() method.
    }
}