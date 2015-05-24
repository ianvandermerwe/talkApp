@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Book Categories <a href="{{ action('BookCategoriesController@loadEditCreateCategories',null) }}" class="btn btn-primary">Create</a></h4>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Enabled</th>
                                <th>Created</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($bookCategories as $bookCategory)
                            <tr>
                                <td>{{ $bookCategory->id }}</td>
                                <td>{{ $bookCategory->name }}</td>
                                <td>{{ $bookCategory->enabled == 1 ? "Enabled" : "Disabled" }}</td>
                                <td>{{ $bookCategory->created_at }}</td>
                                <td>
                                    <a href="{{ action('BookCategoriesController@loadEditCreateCategories',$bookCategory->id) }}" class="btn btn-default">Edit</a>
                                    <a href="{{ action('BookCategoriesController@loadDeleteCategories',$bookCategory->id) }}" class="btn btn-default">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {!!  $bookCategories->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
