@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin panel for requests</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('request.add') }}"> Create New Request</a>
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
            <th>Body</th>
            <th>Method</th>
            <th>Route</th>
        </tr>
        @foreach ($requests as $request)
            <tr>
                <td>{{ $request->body }}</td>
                <td>{{ $request->method }}</td>
                <td>
                    {{ $request->route->name }}
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('request.edit', ['id' => $request->id]) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('request.delete', ['id' => $request->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
