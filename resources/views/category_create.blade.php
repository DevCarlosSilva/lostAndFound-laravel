@extends('master')

@section('content')
<a href="{{ route('adminPanel') }}">Go back</a>
<h2>Create</h2>

@if (session()->has('message'))
{{ session()->get('message'); }}
@endif

<form action="{{ route('categories.store') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Category name">
    <button type="submit">Create</button>
</form>
@endsection