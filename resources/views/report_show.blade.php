@extends('master')

@section('content')
<a href="{{ route('reports.index') }}">Go back</a>
<h2>Report - {{ $report->item_name }}</h2>
<form action="{{ route('reports.destroy', ['report' => $report->id]) }}" method="post">
    @csrf
    <ul>
        <li>{{ $report->description }}</li>
        <li>{{ $report->report_date }}</li>
        <li>{{ $report->reporter_name }}</li>
        <li>{{ $report->category->name }}</li>
        <li>{{ $report->location->name }}</li>
    </ul>
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Delete</button>
</form>
@endsection