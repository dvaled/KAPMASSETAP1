@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Asset</h2>

    <!-- Show error messages if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trnasset.store') }}" method="POST">
        @csrf

        <!-- ASSETCATEGORY -->
        <div class="form-group">
            <label for="ASSETCATEGORY">Asset Category</label>
            <input type="text" class="form-control" name="ASSETCATEGORY" id="ASSETCATEGORY" required>
        </div>

        <!-- ASSETTYPE -->
        <div class="form-group">
            <label for="ASSETTYPE">Asset Type</label>
            <input type="text" class="form-control" name="ASSETTYPE" id="ASSETTYPE" required>
        </div>

        <!-- ASSETBRAND -->
        <div class="form-group">
            <label for="ASSETBRAND">Asset Brand</label>
            <input type="text" class="form-control" name="ASSETBRAND" id="ASSETBRAND" required>
        </div>

        <!-- ASSETMODEL -->
        <div class="form-group">
            <label for="ASSETMODEL">Asset Model</label>
            <input type="text" class="form-control" name="ASSETMODEL" id="ASSETMODEL" required>
        </div>

        <!-- ASSETSERIES -->
        <div class="form-group">
            <label for="ASSETSERIES">Asset Series</label>
            <input type="text" class="form-control" name="ASSETSERIES" id="ASSETSERIES" required>
        </div>

        <!-- ASSETSERIALNUMBER -->
        <div class="form-group">
            <label for="ASSETSERIALNUMBER">Asset Serial Number</label>
            <input type="text" class="form-control" name="ASSETSERIALNUMBER" id="ASSETSERIALNUMBER" required>
        </div>

        <!-- ADDEDDATE -->
        <div class="form-group">
            <label for="ADDEDDATE">Added Date</label>
            <input type="date" class="form-control" name="ADDEDDATE" id="ADDEDDATE" required>
        </div>

        <!-- ACTIVE -->
        <div class="form-group">
            <label for="ACTIVE">Active</label>
            <select class="form-control" name="ACTIVE" id="ACTIVE" required>
                <option value="YES">Yes</option>
                <option value="NO">No</option>
            </select>
        </div>

        <!-- NIPP (optional) -->
        <div class="form-group">
            <label for="NIPP">NIPP (Optional)</label>
            <input type="number" class="form-control" name="NIPP" id="NIPP">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
