@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin panel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('route.add') }}">Create New Route</a>
                <a class="btn btn-success" href="{{ route('request.add') }}">Create New Request</a>
                <a class="btn btn-success" href="{{ route('response.add') }}">Create New Responses</a>
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
            <th><a href="{{ route('routes') }}">Routes</a></th>
            <th><a href="{{ route('requests') }}">Requests</a></th>
            <th><a href="{{ route('responses') }}">Responses</a></th>
        </tr>
        @foreach ($routes as $route)
            <tr>
                <td>name: {{ $route->name }}<br/>
                    Route URL: {{ $route->route }}<br/>
                    <a class="btn btn-primary" href="{{ route('route.edit', ['id' => $route->id]) }}">Edit</a>
                </td>
                <td>
                    @foreach($route->requests as $request)
                        Body: {{ $request->body }}<br/>
                        Method: {{ $request->method }}<br/>
                        <a class="btn btn-primary" href="{{ route('request.edit', ['id' => $request->id]) }}">Edit</a>

                        <br/>
                    @endforeach
                </td>
                <td>
                    @foreach($route->requests as $request)
                        @if ($request->response)
                            Body: {{ $request->response->body }}<br/>
                            Http code: {{ $request->response->http_code }}<br/>
                            <a class="btn btn-primary"
                               href="{{ route('response.edit', ['id' => $request->response->id]) }}">Edit</a>

                            <br/>
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>

@endsection
