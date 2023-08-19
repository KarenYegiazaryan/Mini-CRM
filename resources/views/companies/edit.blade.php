@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Company</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $company->name) }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $company->email) }}">
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            @if ($company->logo)
                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" width="100">
            @else
                No Logo
            @endif
            <input type="file" class="form-control-file mt-2" id="logo" name="logo">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $company->website) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
