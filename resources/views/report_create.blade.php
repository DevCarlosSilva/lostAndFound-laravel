<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relatar Item Perdido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('reports.index') }}">Voltar</a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session()->has('message'))
                    {{ session()->get('message'); }}
                    @endif

                    <form action="{{ route('reports.store') }}" method="post">
                        @csrf
                        <input type="text" name="item_name" placeholder="Nome do item">
                        <input type="text" name="description" placeholder="Descrição do item">
                        <label for="report_date">Data em que o relato foi feito:</label>
                        <input type="date" name="report_date" id="report_date">
                        <input type="text" name="reporter_name" placeholder="Nome do relator">
                        <select name="category_id">
                            <option value="" disabled selected>Escolha uma categoria</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <select name="location_id">
                            <option value="" disabled selected>Escolha um local</option>
                            @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>