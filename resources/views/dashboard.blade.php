<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 text-gray-900 dark:text-gray-100">
                <h1>animaisinhos</h1>

                    @foreach(Auth::user()->animais as $animal)

                    <div class="flex justify-between border-b mb-2 gap-4
                    hover:bg-gray-300 "
                    x-data="{showDelete : false , showEdit : false}">
                            
                            <div class="flex justify-between flex-grow gap-6">
                                <div>Nome: {{$animal->nome}}</div>
                                <div>Especie: {{$animal->especie}}</div>
                                <div>Idade: {{$animal->idade}}</div>
                                <div>Peso: {{$animal->peso}}</div>
                                <div>Vacinado? {{$animal->vacina}}</div>
                    
                            </div>
                  

                            <div class="flex gap-2">
                                <div>
                                    <span class=" cursor-pointer px-2 bg-red-500 text-white" @click="showDelete = true "> Apagar </span>
                                </div>
                                <div>
                                    <span class=" cursor-pointer px-2 bg-blue-500 text-white" @click=" showEdit = true ">Editar</span>
                                </div>
                            </div>
                            
                            <template x-if="showEdit">
                                <div class="absolute top-0 bottom-0 left-0 rigth-0 bg-gray-800 bg-opacity-20 z-0">
                                    <div class="w-96 bg-white p-4 absolute left-1/4 rigth-1/4 top-1/4 botton-1/4 z-10">
                                                <form class="my-4" action="{{ route('animal.update', $animal) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-text-input name="nome" placeholder="nome" value="{{$animal->nome}}"/>
                                                    <x-text-input name="especie" placeholder="especie" value="{{$animal->especie}}"/>
                                                    <x-text-input name="idade" placeholder="idade" value="{{$animal->idade}}"/>
                                                    <x-text-input name="peso" placeholder="peso" value="{{$animal->peso}}"/>
                                                    <label name="vacina">Tomou Vacina?</label>
                                                        <select name="vacina">
                                                          <option>Sim</option>
                                                          <option>Não</option>
                                                         </select>
                                                   
                                                    <x-primary-button class="w-full text-center mt-2"> Salvar </x-primary-button>
                                                </form>
                                            <x-danger-button @click=" showEdit = false " class="w-full bg-gray bg-opacity-50">Cancelar</x-danger-botton>
                                        
                                    </div>
                                </div>
                            </template>

                            <template x-if="showDelete">
                                <div class="absolute top-0 bottom-0 left-0 rigth-0 bg-gray-800 bg-opacity-20 z-0">
                                    <div class="w-96 bg-white p-4 absolute left-1/4 rigth-1/4 top-1/4 botton-1/4 z-10">
                                        <h2 class="text-xl font-bold text-center">tem certeza?</h2>
                                        <div class="flex justify-between mt-4">
                                                <form action="{{ route('animal.destroy', $animal) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button>sim,desejo apagar </x-danger-button>
                                                </form>
                                            <x-primary-button @click="showDelete = false">Cancelar</x-primary-botton>
                                        </div>
                                        
                                    </div>
                                </div>
                            </template>
                            
                            </div>
                        





                        @endforeach

                        <form action="{{ route('animal.store') }}" method="POST">
                        @csrf
                        <x-text-input name="nome" placeholder="nome"/>
                        <x-text-input name="especie" placeholder="especie"/>
                        <x-text-input name="idade" placeholder="idade"/>
                        <x-text-input name="peso" placeholder="peso"/>
                        <label name="vacina">Tomou Vacina?</label>
                        <select name="vacina">
                            <option>Sim</option>
                            <option>Não</option>
                        </select>
                        <x-primary-button>Salvar</x-primary-button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>