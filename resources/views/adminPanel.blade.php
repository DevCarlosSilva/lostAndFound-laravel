<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel de Administração') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                        <hr>
                        <div class="">
                            <h2 class="mt-3 font-semibold text-xl">Categorias</h2>
                            @if ($categories->isEmpty())
                            <div class="">
                                <strong>Informação:</strong> Não há categorias cadastradas.
                            </div>
                            @else
                            <table class="table">
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
                                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                            method="post">
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
                            @endif
                            <h2 class="mt-3 font-semibold text-xl">Locais</h2>
                            @if ($locations->isEmpty())
                            <div class="">
                                <strong>Informação:</strong> Não há locais cadastrados.
                            </div>
                            @else
                            <table class="table">
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
                                        <form action="{{ route('locations.destroy', ['location' => $location->id]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger p-0">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>