<div>
    

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h1>{{$search}}</h1>

    <div>
        {{$prueba = "Prueba"}}
        <br>
        <input type="text" wire:model='${search}'>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!---Table---->
       <x-table>
            <div class="px-6 py-4">
              {{--  <input type="text" wire:model="search">--}}
                <x-input type="text" wire:model="search" />
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Content
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($post as $post)
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
                                <td class="px-6 py-4  text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr
                    @endforeach
                </tbody>
            </table>
       </x-table>
                   
    </div>

    {{-- {{$titulo}} --}}
</div>