<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Local') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('adminPanel') }}">Voltar</a>

            @if (session()->has('message'))
            {{ session()->get('message'); }}
            @endif

            <form action="{{ route('locations.store') }}" method="post">
                @csrf
                <input type="text" name="name" placeholder="Location name">
                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>