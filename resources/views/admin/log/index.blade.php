@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>View logs </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('requests') }}">Requests</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Headers</th>
            <th>Body</th>
            <th>Date</th>
        </tr>
        @foreach ($logs as $log)
            <tr>
                <td>{{  \Symfony\Component\VarDumper\VarDumper::dump(json_decode($log->headers, true)) }}</td>
                <td>{{ $log->body }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
        @endforeach
    </table>

@endsection
