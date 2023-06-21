<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between bg-green-400">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Listado de Artistas
            </h2>
            <a href="{{ route('players.create') }}" class=" bg-blue-500  rounded px-4 py-2">
                Añadir Artista
            </a>
        </div>
    </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg bg-green-500  ">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-3 gap-5">
                        @foreach($players as $player)
                        <div class="rounded bg-purple-300 p-2">
                            <div>
                                {{ $player->name }}
                            </div>
                            <div class="my-6 flex justify-between">
                                <a href="{{ route('players.edit',['player'=>$player]) }}" class=" bg-yellow-300 0rounded px-4 py-2">
                                    {{ __('Update') }}
                                </a>
                                <form action="{{ route('players.destroy',['player'=>$player]) }}"method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" bg-red-500 rounded px-4 py-2">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
</x-app-layout>