@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin panel for route</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('route.add') }}"> Create New Route</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>URL route</th>
        </tr>
        @foreach ($routes as $route)
            <tr>
                <td>{{ $route->name }}</td>
                <td>{{ $route->route }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('route.edit', ['id' => $route->id]) }}">Edit</a>

                    <a class="btn btn-danger" href="{{ route('route.delete', ['id' => $route->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
