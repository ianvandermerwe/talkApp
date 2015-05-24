@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Are you sure you want to delete this item</h4>
                    </div>

                    <div class="panel-body">
                        <form action="{{ action('BooksController@postDeleteBooks',$book->id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" disabled name="name" value="{{ isset($book->name)? $book->name : Input::get('name') }}">
                            </div>
                            <a href="{{ action('BooksController@listBooks') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-default">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
