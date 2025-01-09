@extends('layouts.app')

@section('content')
<h1>Categories</h1>
@foreach($categories as $category)
    <a href="/category/{{ $category->id }}">{{ $category->name }}</a>
@endforeach
@endsection
