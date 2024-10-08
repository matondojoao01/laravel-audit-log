@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Audit Logs</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>IP Address</th>
                <th>URL</th>
                <th>Method</th>
                <th>Status Code</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->user_id }}</td>
                    <td>{{ $log->ip_address }}</td>
                    <td>{{ $log->url }}</td>
                    <td>{{ $log->method }}</td>
                    <td>{{ $log->status_code }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
