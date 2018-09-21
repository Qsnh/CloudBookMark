@extends('layouts.app')

@section('content')

    @if(!Auth::check())
        @include('frontend.index.no_login')
    @else
        @include('frontend.index.login')
    @endif

@endsection