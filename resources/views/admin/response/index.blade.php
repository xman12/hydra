@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin panel for response</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('response.add') }}"> Create New Response</a>
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
            <th>Route</th>
            <th>Request</th>
            <th>Http code</th>
        </tr>
        @foreach ($responses as $response)
            <tr>
                <td>{{ $response->body }}</td>
                <td>{{ $response->request->route->name }}</td>
                <td>{{ $response->request->name }}</td>
                <td>{{ $response->http_code }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('response.edit', ['id' => $response->id]) }}">Edit</a>
                    <form action="#" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
