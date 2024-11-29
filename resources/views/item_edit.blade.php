<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Editar Item') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ route('items.index') }}">Voltar</a>
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @if (session()->has('message'))
          {{ session()->get('message'); }}
          @endif

          <form action="{{ route('items.update', ['item' => $item->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="name" value="{{ $item->name }}">
            <input type="text" name="description" value="{{ $item->description }}">
            <label for="found_date">Data em que o relato foi feito:</label>
            <input type="date" name="found_date" id="found_date" value="{{ $item->found_date }}">
            <select name="category_id">
              <option value="{{ $item->category_id }}" selected>{{ $item->category->name }}</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            <select name="location_id">
              <option value="{{ $item->location_id }}" selected>{{ $item->location->name }}</option>
              @foreach($locations as $location)
              <option value="{{ $location->id }}">{{ $location->name }}</option>
              @endforeach
            </select>
            <select name="status">
              <option value="{{ $item->status }}" selected>{{ $item->status }}</option>
              <option value="Perdido">Perdido</option>
              <option value="Devolvido">Devolvido</option>
            </select>
            <hr>
            <h5 style="color: rgb(255, 0, 0)">Fill only if the item has been returned*</h5>
            <label for="returned_date">Return date:</label>
            <input type="date" name="returned_date" id="returned_date" value="{{ $item->returned_date }}">
            <input type="text" name="returned_to" value="{{ $item->returned_to }}"></input>
            <hr>
            <button type="submit">Editar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>