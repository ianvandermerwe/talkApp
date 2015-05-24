@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Are you sure you want to delete this item</div>

                    <div class="panel-body">
                        <form action="{{ action('BookCategoriesController@postDeleteCategories',$bookCategory->id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" disabled name="name" value="{{ isset($bookCategory->name)? $bookCategory->name : Input::get('name') }}">
                            </div>
                            <a href="{{ action('BookCategoriesController@listCategories') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-default">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
