<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   {{-- <h1>{{$search}}</h1>--}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!---Table---->
       <x-table>
        <div class="px-6 py-4 flex items-center">
            {{-- <input type="text" wire:model="search"> --}}
            <x-jet-input type="text" placeholder="Ingrese lo que desee buscar" class="flex-1 mr-4" wire:model="search" />

            @livewire('create-post')
        </div>
            @if ($posts->count()) {{--Este if nos dice si existe al menos un post de busqueda --}}
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="ordenar('id')">
                                ID

                                {{-- Ordenamineto --}}
                                @if ($sort == 'id')

                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>  
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>  
                                @endif
                                       
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="ordenar('title')">
                                Title

                                {{-- Ordenamineto --}}
                                @if ($sort == 'title')

                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>  
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>  
                                    @endif
                                           
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
        
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="ordenar('content')">
                                Content

                                {{-- Ordenamineto --}}
                                @if ($sort == 'content')

                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>  
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>  
                                @endif
                                       
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                            </th>

                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="ordenar('content')">
                                Imagen
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)
                            <tr>
                                
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">{{$post->id}}</div>
                                    
                                </td>
                                
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">{{$post->title}}</div>
                                </td>

                                <td class="px-6 py-4  text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{$post->content}}</div>
                                </td>

                                <td class="px-6 py-4  text-sm text-gray-500">
                                    @if ( $post->image )
                                        <img class="mb-4" src="{{ Storage::url( $post->image ) }}" >
                                    @else
                                        <div class="text-sm text-gray-900">Este post no cuenta con imagen disponible</div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-sm font-medium">
                                   @livewire('edit-post', ['post' => $post], key($post->id)) {{--Componenetes de anidamiento(VLW.13)--}}
                                </td>
                            </tr
                        @endforeach
                    </tbody>
                </table>
            @else
                <div>No existe algun registro coincidente</div>
                
            @endif

            @if ( $posts->hasPages() ) {{--Este metodo es para saber si hay dos o más páginas mostrara el div, sino se mostrará oculto (VLW.15) --}}
                <div class="px-6 py-3">
                    {{ $posts->links() }}
                </div>   
            @endif

       </x-table>
                   


    </div>

    {{-- {{$titulo}} --}}
</div>
