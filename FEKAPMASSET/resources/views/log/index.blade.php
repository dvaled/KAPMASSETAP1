@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>logs List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('log.create') }}">Create New log</a>
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
        <th>MasterID</th>
        <th>Condition</th>
        <th>NoSr</th>
        <th>Description</th>
        <th>ValueGcm</th>
        <th>logGcm</th>
        <th>Active</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($logs as $log)
    <tr>
        <td>{{ $log->MasterID }}</td>
        <td>{{ $log->Condition }}</td>
        <td>{{ $log->NoSr }}</td>
        <td>{{ $log->Description }}</td>
        <td>{{ $log->ValueGcm }}</td>
        <td>{{ $log->logGcm }}</td>
        <td>{{ $log->Active }}</td>
        <td>
            <form action="{{ route('log.destroy', $log->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('log.show', $log->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('log.edit', $log->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button log="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $logs->links() !!}
@endsection
