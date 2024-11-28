<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relatar Item Perdido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('reports.index') }}">Voltar</a>

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
        </div>
    </div>
</x-app-layout>