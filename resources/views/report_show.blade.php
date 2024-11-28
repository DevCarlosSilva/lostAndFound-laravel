<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ver Relato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('reports.index') }}">Voltar</a>
            <form action="{{ route('reports.destroy', ['report' => $report->id]) }}" method="post">
                @csrf
                <ul>
                    <li>{{ $report->item_name }}</li>
                    <li>{{ $report->description }}</li>
                    <li>{{ $report->report_date }}</li>
                    <li>{{ $report->reporter_name }}</li>
                    <li>{{ $report->category->name }}</li>
                    <li>{{ $report->location->name }}</li>
                </ul>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>