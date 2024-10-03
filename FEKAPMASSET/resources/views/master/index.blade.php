@extends('layouts.app')

@section('content')
{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Master List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('master.create') }}">Create New Master</a>
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
        <th>TypeGcm</th>
        <th>Active</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($types as $type)
    <tr>
        <td>{{ $type->MasterID }}</td>
        <td>{{ $type->Condition }}</td>
        <td>{{ $type->NoSr }}</td>
        <td>{{ $type->Description }}</td>
        <td>{{ $type->ValueGcm }}</td>
        <td>{{ $type->TypeGcm }}</td>
        <td>{{ $type->Active }}</td>
        <td>
            <form action="{{ route('master.destroy', $type->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('master.show', $type->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('master.edit', $type->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $types->links() !!} --}}
@endsection
