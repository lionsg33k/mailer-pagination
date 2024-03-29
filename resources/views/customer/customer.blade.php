@extends('layouts.index')


@section('content')
    <h1 class=" text-white">Hello {{ Auth::user()->name }}</h1>
@endsection
