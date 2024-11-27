@extends('master')

@section('content')
<a href="{{ route('home') }}">Go back</a>
<h2>Admin Panel</h2>
@if (session()->has('message'))
{{ session()->get('message'); }}
@endif
<hr>
<div class="d-flex justify-content-evenly">
    <div class="d-flex flex-column text-center gap-4">
        <div>QUAN. DE CATEGORIAS: {{ $countCategories }}
            <a class="d-block" href="{{ route('categories.create') }}">+</a>
        </div>
        <div>QUAN. DE LOCAIS: {{ $countLocations }}
            <a class="d-block" href="{{ route('locations.create') }}">+</a>
        </div>
    </div>
    <div class="text-center">
        <table class="table">
            <tr>
                <td>Categorias</td>
            </tr>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Quan. de items com essa cat.</th>
                <th scope="col">Quan. de relatos com essa cat.</th>
                <th scope="col">Ações</th>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->items_count }}</td>
                <td>{{ $category->reports_count }}</td>
                <td class="d-flex">
                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger p-0">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td>Locais</td>
            </tr>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Quan. de items com esse loc.</th>
                <th scope="col">Quan. de relatos com esse loc.</th>
                <th scope="col">Ações</th>
            </tr>
            @foreach ($locations as $location)
            <tr>
                <td>{{ $location->name }}</td>
                <td>{{ $location->items_count }}</td>
                <td>{{ $location->reports_count }}</td>
                <td class="d-flex">
                    <form action="{{ route('locations.destroy', ['location' => $location->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger p-0">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection