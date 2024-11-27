@extends('master')

@section('content')
<a href="{{ route('reports.index') }}">Go back</a>
<h2>Edit</h2>

@if (session()->has('message'))
{{ session()->get('message'); }}
@endif

<form action="{{ route('reports.update', ['report' => $report->id]) }}" method="post">
  @csrf
  <input type="hidden" name="_method" value="PUT">
  <input type="text" name="item_name" value="{{ $report->item_name }}">
  <input type="text" name="description" value="{{ $report->description }}">
  <label for="report_date">Report date:</label>
  <input type="date" name="report_date" id="report_date" value="{{ $report->report_date }}">
  <input type="text" name="reporter_name" value="{{ $report->reporter_name }}">
  <select name="category_id">
    <option value="{{ $report->category_id }}" selected>{{ $report->category->name }}</option>
    @foreach($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
  <select name="location_id">
    <option value="{{ $report->location_id }}" selected>{{ $report->location->name }}</option>
    @foreach($locations as $location)
    <option value="{{ $location->id }}">{{ $location->name }}</option>
    @endforeach
  </select>
  <hr>
  <button type="submit">Edit</button>
</form>
@endsection