@extends('master')

@section('content')
<h2>Home</h2>
<a href=" {{ route('users.index') }} ">Users index</a>
<hr>
<a href=" {{ route('items.index') }} ">Items index</a>
<hr>
<a href=" {{ route('reports.index') }} ">Reports index</a>
<hr>
<a href=" {{ route('adminPanel') }} ">Admin panel</a>
@endsection