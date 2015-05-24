@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Book Edit</h4>
                    </div>

                    <div class="panel-body">
                        <form action="{{ action('BooksController@postEditCreateBooks',$book->id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Book Category</label>
                                <select name="book_category" id="book_category" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($bookCategories as $bookCategory)
                                        <option value="{{ $bookCategory->id }}" {{ isset($book->book_category_id) && $book->book_category_id == $bookCategory->id? "selected='selected'" : "" }}>{{ $bookCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->first('book_category'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    {{ $errors->first('book_category') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ isset($book->name)? $book->name : Input::get('name') }}">
                            </div>
                            @if($errors->first('name'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control" id="desc" cols="30" rows="10">{{ isset($book->desc)? $book->desc : Input::get('desc') }}</textarea>
                            </div>
                            @if($errors->first('desc'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    {{ $errors->first('desc') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Enabled</label>
                                <input type="checkbox" name="enabled" {{ isset($book->enabled) && $book->enabled == 1 ? 'checked' : '' }}/>
                            </div>
                            <a href="{{ action('BooksController@listBooks') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
