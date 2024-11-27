@extends('master')

@section('content')
<a href="{{ route('items.index') }}">Go back</a>
<h2>Create</h2>

@if (session()->has('message'))
{{ session()->get('message'); }}
@endif

<form action="{{ route('items.store') }}" method="post">
  @csrf
  <input type="text" name="name" placeholder="Item name">
  <input type="text" name="description" placeholder="Item description">
  <label for="found_date">Date of find:</label>
  <input type="date" name="found_date" id="found_date">
  <select name="category_id">
    <option value="" disabled selected>Choose a category</option>
    @foreach($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
  <select name="location_id">
    <option value="" disabled selected>Choose a location</option>
    @foreach($locations as $location)
    <option value="{{ $location->id }}">{{ $location->name }}</option>
    @endforeach
  </select>
  <input type="text" name="status" placeholder="Item status">
  <button type="submit">Create</button>
</form>
@endsection