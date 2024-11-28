<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
            {{ session()->get('message'); }}
            @endif
            <hr>
            <a href="{{ route('reports.create') }}">Create</a>
            <hr>
            @if ($reports->isEmpty())
            <div class="">
                <strong>Informação:</strong> Não há relatos.
            </div>
            @else
            <ul>
                @foreach ($reports as $report)
                <li>{{ $report->item_name }} | <a href="{{ route('reports.edit', ['report' => $report->id]) }}">Edit</a>
                    | <a href="{{ route('reports.show', ['report' => $report->id]) }}">Show</a>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</x-app-layout>