<?php namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCategory extends Eloquent{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','enabled'];

    public function books()
    {
        $this->hasMany('App\Books', 'book_id');
    }

    public function findInstance($id = null){
        $bookCategory = $this->find($id);
        if(!is_null($bookCategory)){
            return $bookCategory;
        }

        return $this;
    }

    public function scopeEnabled($query)
    {
        return $query->where('enabled', '=', 1);
    }
}