@extends('master')

@section('content')
<a href="{{ route('items.index') }}">Go back</a>
<h2>Edit</h2>

@if (session()->has('message'))
{{ session()->get('message'); }}
@endif

<form action="{{ route('items.update', ['item' => $item->id]) }}" method="post">
  @csrf
  <input type="hidden" name="_method" value="PUT">
  <input type="text" name="name" value="{{ $item->name }}">
  <input type="text" name="description" value="{{ $item->description }}">
  <label for="found_date">Date of find:</label>
  <input type="date" name="found_date" id="found_date" value="{{ $item->found_date }}">
  <select name="category_id">
    <option value="{{ $item->category_id }}" selected>{{ $item->category->name }}</option>
    @foreach($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
  <select name="location_id">
    <option value="{{ $item->location_id }}" selected>{{ $item->location->name }}</option>
    @foreach($locations as $location)
    <option value="{{ $location->id }}">{{ $location->name }}</option>
    @endforeach
  </select>
  <input type="text" name="status" value="{{ $item->status }}">
  <hr>
  <h5 style="color: rgb(255, 0, 0)">Fill only if the item has been returned*</h5>
  <label for="returned_date">Return date:</label>
  <input type="date" name="returned_date" id="returned_date" value="{{ $item->returned_date }}">
  <input type="text" name="returned_to" value="{{ $item->returned_to }}"></input>
  <hr>
  <button type="submit">Edit</button>
</form>
@endsection