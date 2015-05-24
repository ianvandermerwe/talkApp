<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use View,Input;
use App\Models\BookCategory;
use App\Services\BookCategoryService;

class BookCategoriesController extends Controller{

    protected $bookCategory;
    protected $bookCategoryService;

    function __construct(BookCategory $bookCategory, BookCategoryService $bookCategoryService)
    {
        $this->bookCategory = $bookCategory;
        $this->bookCategoryService = $bookCategoryService;
    }

    public function listCategories()
    {
        $bookCategories = $this->bookCategory->paginate(5);

        return View::make('bookCategories/list',compact('bookCategories'));
    }

    public function loadEditCreateCategories($id = null)
    {
        $bookCategory = $this->bookCategory->findInstance($id);

        return View::make('bookCategories/editCreate',compact('bookCategory'));
    }

    public function postEditCreateCategories($id = null)
    {
        $bookCategory = $this->bookCategory->findInstance($id);

        $validator = $this->bookCategoryService->createValidator(Input::all());

        if($validator->fails()){
            return View::make('bookCategories/editCreate',compact('bookCategory'))
                ->withErrors($validator);
        }

        if(is_null($id)){
            $this->bookCategoryService->create($bookCategory);
        }else{
            $this->bookCategoryService->edit($bookCategory);
        }

        Return Redirect::action('BookCategoriesController@listCategories');
    }

    public function loadDeleteCategories($id)
    {
        $bookCategory = $this->bookCategory->findInstance($id);

        return View::make('bookCategories/delete',compact('bookCategory'));
    }

    public function postDeleteCategories($id)
    {
        $bookCategory = $this->bookCategory->findInstance($id);

        $this->bookCategoryService->deleteItem($bookCategory);

        return Redirect::action('BookCategoriesController@listCategories');
    }
}