@extends('master')

@section('content')
<a href="{{ route('reports.index') }}">Go back</a>
<h2>Create</h2>

@if (session()->has('message'))
{{ session()->get('message'); }}
@endif

<form action="{{ route('reports.store') }}" method="post">
    @csrf
    <input type="text" name="item_name" placeholder="Item name">
    <input type="text" name="description" placeholder="Item description">
    <label for="report_date">Report date:</label>
    <input type="date" name="report_date" id="report_date">
    <input type="text" name="reporter_name" placeholder="Reporter name">
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
    <button type="submit">Create</button>
</form>
@endsection