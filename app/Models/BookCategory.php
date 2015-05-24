<?php namespace App\Models;

use Eloquent;

class BookCategory extends Eloquent{
    protected $fillable = ['name','enabled'];

    public function books()
    {
        $this->hasMany('App\Books', 'book_id');
    }

    public function findInstance($id = null){
        $book = $this->find($id);
        if(!is_null($book)){
            return $book;
        }

        return $this;
    }
}