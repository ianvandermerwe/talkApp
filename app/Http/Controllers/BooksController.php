<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use View,Input;
use App\Models\Book;
use App\Services\BookService;
use App\Models\BookCategory;

class BooksController extends Controller{

    protected $book;
    protected $bookService;

    protected $bookCategories;

    function __construct(Book $book, BookService $bookService, BookCategory $bookCategories)
    {
        $this->book = $book;
        $this->bookService = $bookService;
        $this->bookCategories = $bookCategories;
    }

    public function listBooks()
    {
        $books = $this->book->paginate(5);

        return View::make('book/list',compact('books'));
    }

    public function loadEditCreateBooks($id = null)
    {
        $book = $this->book->findInstance($id);
        $bookCategories = $this->bookCategories->all();

        return View::make('book/editCreate',compact('book','bookCategories'));
    }

    public function postEditCreateBooks($id = null)
    {
        $book = $this->book->findInstance($id);

        $validator = $this->bookService->createValidator(Input::all());

        if($validator->fails()){
            $bookCategories = $this->bookCategories->all();
            return View::make('book/editCreate',compact('book','bookCategories'))
                ->withErrors($validator);
        }

        if(is_null($id)){
            $this->bookService->create($book);
        }else{
            $this->bookService->edit($book);
        }

        Return Redirect::action('BooksController@listBooks');
    }

    public function loadDeleteBooks($id)
    {
        $book = $this->book->findInstance($id);

        return View::make('book/delete',compact('book'));
    }

    public function postDeleteBooks($id)
    {
        $book = $this->book->findInstance($id);

        $this->bookService->deleteItem($book);

        Return Redirect::action('BooksController@listBooks');
    }
}