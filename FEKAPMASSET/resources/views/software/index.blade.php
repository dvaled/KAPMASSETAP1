@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>software List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('software.create') }}">Create New software</a>
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
        <th>softwareGcm</th>
        <th>Active</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($softwares as $software)
    <tr>
        <td>{{ $software->MasterID }}</td>
        <td>{{ $software->Condition }}</td>
        <td>{{ $software->NoSr }}</td>
        <td>{{ $software->Description }}</td>
        <td>{{ $software->ValueGcm }}</td>
        <td>{{ $software->softwareGcm }}</td>
        <td>{{ $software->Active }}</td>
        <td>
            <form action="{{ route('softwares.destroy', $software->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('softwares.show', $software->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('softwares.edit', $software->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button software="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $softwares->links() !!}
@endsection
