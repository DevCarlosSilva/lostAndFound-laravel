<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Items') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @if (session()->has('message'))
          {{ session()->get('message'); }}
          @endif
          @if(auth()->check() && auth()->user()->is_admin)
          <div>
            <a href="{{ route('items.create') }}">Create</a>
          </div>
          <hr>
          @endif
          <h2 class="mt-3 font-semibold text-xl">Items Perdidos</h2>
          <hr>
          @if ($lostItems->isEmpty())
          <div class="">
            <strong>Informação:</strong> Não há itens registrados.
          </div>
          @else
          <ul>
            @foreach ($lostItems as $item)
            <li>{{ $item->name }} |
              @if(auth()->check() && auth()->user()->is_admin)
              <div>
                <a href="{{ route('items.edit', ['item' => $item->id]) }}">Edit</a> |
              </div>
              @endif
              <a href="{{ route('items.show', ['item' => $item->id]) }}">Show</a>
            </li>
            @endforeach
          </ul>
          @endif
          <h2 class="mt-3 font-semibold text-xl">Items Devolvidos</h2>
          <hr>
          @if ($returnedItems->isEmpty())
          <div class="">
            <strong>Informação:</strong> Não há itens registrados.
          </div>
          @else
          <ul>
            @foreach ($returnedItems as $item)
            <li>{{ $item->name }} |
              @if(auth()->check() && auth()->user()->is_admin)
              <div>
                <a href="{{ route('items.edit', ['item' => $item->id]) }}">Edit</a> |
              </div>
              @endif
              <a href="{{ route('items.show', ['item' => $item->id]) }}">Show</a>
            </li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>

    </div>
  </div>
</x-app-layout>