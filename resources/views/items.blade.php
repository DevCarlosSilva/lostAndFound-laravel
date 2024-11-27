@extends('master')

@section('content')
<a href="{{ route('home') }}">Home</a>
<hr>
<h2>Items</h2>
@if (session()->has('message'))
{{ session()->get('message'); }}
@endif
<hr>
<a href="{{ route('items.create') }}">Create</a>
<hr>
<ul>
  @foreach ($items as $item)
  <li>{{ $item->name }} | <a href="{{ route('items.edit', ['item' => $item->id]) }}">Edit</a> | <a
      href="{{ route('items.show', ['item' => $item->id]) }}">Show</a>
  </li>
  @endforeach
</ul>
@endsection