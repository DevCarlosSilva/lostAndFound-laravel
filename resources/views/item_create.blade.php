<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Registrar Item Perdido') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('items.index') }}">Voltar</a>
      @if (session()->has('message'))
      {{ session()->get('message'); }}
      @endif
      <form action="{{ route('items.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Item name">
        <input type="text" name="description" placeholder="Item description">
        <label for="found_date">Date of find:</label>
        <input type="date" name="found_date" id="found_date">
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
        <input type="hidden" name="status" value="Perdido">
        <button type="submit">Create</button>
      </form>
    </div>
  </div>
</x-app-layout>