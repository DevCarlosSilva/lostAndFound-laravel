@extends('master')

@section('content')
<a href="{{ route('home') }}">Home</a>
<hr>
<h2>Reports</h2>
@if (session()->has('message'))
{{ session()->get('message'); }}
@endif
<hr>
<a href="{{ route('reports.create') }}">Create</a>
<hr>
<ul>
    @foreach ($reports as $report)
    <li>{{ $report->item_name }} | <a href="{{ route('reports.edit', ['report' => $report->id]) }}">Edit</a> | <a
            href="{{ route('reports.show', ['report' => $report->id]) }}">Show</a>
    </li>
    @endforeach
</ul>
@endsection