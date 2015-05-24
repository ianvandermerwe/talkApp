@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Book Category</h4>
                    </div>

                    <div class="panel-body">
                        <form action="{{ action('BookCategoriesController@postEditCreateCategories',$bookCategory->id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ isset($bookCategory->name)? $bookCategory->name : Input::get('name') }}">
                            </div>
                            @if($errors->first('name'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Enabled</label>
                                <input type="checkbox" name="enabled" {{ isset($bookCategory->enabled) &&  isset($bookCategory->enabled) == 1 ? 'checked' : '' }}/>
                            </div>
                            <a href="{{ action('BookCategoriesController@listCategories') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
