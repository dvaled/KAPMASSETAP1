@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>history List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('history.create') }}">Create New history</a>
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
    @foreach ($logs as $history)
    <tr>
        <td>{{ $history->MasterID }}</td>
        <td>{{ $history->Condition }}</td>
        <td>{{ $history->NoSr }}</td>
        <td>{{ $history->Description }}</td>
        <td>{{ $history->ValueGcm }}</td>
        <td>{{ $history->logGcm }}</td>
        <td>{{ $history->Active }}</td>
        <td>
            <form action="{{ route('history.destroy', $history->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('history.show', $history->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('history.edit', $history->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button history="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $logs->links() !!}
@endsection
