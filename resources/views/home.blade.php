@extends('layouts.app')

@section('content')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{ asset('build/assets/home_img/minicrm.jpg') }}" alt="Image" width="100%">
@endsection


