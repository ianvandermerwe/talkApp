<?php namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Eloquent{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['book_category_id','name','desc','enabled'];

    public function bookCategory()
    {
        $this->belongsTo('App\BookCategory');
    }

    public function findInstance($id = null){
        $book = $this->find($id);
        if(!is_null($book)){
            return $book;
        }

        return $this;
    }

    public function scopeEnabled($query)
    {
        return $query->where('enabled', '=', 1);
    }
}