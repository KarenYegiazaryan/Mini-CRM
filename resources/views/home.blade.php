@extends('layouts.app')

@section('content')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{ asset('storage/logos/minicrm.jpg') }}" alt="Company Logo" width="100%">
@endsection


