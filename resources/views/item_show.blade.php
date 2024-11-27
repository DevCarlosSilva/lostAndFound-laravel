@extends('master')

@section('content')
<a href="{{ route('items.index') }}">Go back</a>
<h2>Item - {{ $item->name }}</h2>
<form action="{{ route('items.destroy', ['item' => $item->id]) }}" method="post">
  @csrf
  <ul>
    <li>{{ $item->description }}</li>
    <li>{{ $item->found_date }}</li>
    <li>{{ $item->category->name }}</li>
    <li>{{ $item->location->name }}</li>
    <li>{{ $item->status }}</li>
    <li>{{ $item->returned_date }}</li>
    <li>{{ $item->returned_to }}</li>
  </ul>
  <input type="hidden" name="_method" value="DELETE">
  <button type="submit">Delete</button>
</form>
@endsection