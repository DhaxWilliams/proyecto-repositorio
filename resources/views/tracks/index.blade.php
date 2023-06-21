
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Listado de canciones
            </h2>
            <a href="{{ route('tracks.create') }}" class="bg-blue-500 rounded px-4 py-2">
                Añadir Canción
            </a>
        </div>
    </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg bg-black">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-3 gap-5">
                        @foreach($tracks as $track)
                        <div class="rounded bg-blue-300 p-2">
                            <div>
                                {{ $track->name }}
                              
                            </div>
                            <div >
                                <audio controls loop> 
                                    <source src="{{ $track->getUrl() }}" type="audio/mp3" class="bg-black"> 
                                 </audio>
                            </div>
                            <div class="my-6 flex justify-between">
                                <a href="{{ route('tracks.edit',['track'=>$track]) }}" class="bg-orange-400 rounded px-4 py-2">
                                    {{ __('Update') }}
                                </a>
                                <form action="{{ route('tracks.destroy',['track'=>$track]) }}"method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-400 rounded px-4 py-2">
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