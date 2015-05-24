@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Books <a href="{{ action('BooksController@loadEditCreateBooks',null) }}" class="btn btn-primary">Create</a></h4>
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
                            @foreach($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->enabled == 1 ? "Enabled" : "Disabled" }}</td>
                                <td>{{ $book->created_at }}</td>
                                <td>
                                    <a href="{{ action('BooksController@loadEditCreateBooks',$book->id) }}" class="btn btn-default">Edit</a>
                                    <a href="{{ action('BooksController@loadDeleteBooks',$book->id) }}" class="btn btn-default">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {!!  $books->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
