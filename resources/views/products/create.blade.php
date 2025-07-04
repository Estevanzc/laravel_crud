<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Products &raquo; Criar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="price" :value="__('price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" step="0.1" :value="old('price')" required autofocus autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="description" :value="__('description')" />
                            <x-text-area id="description" class="block mt-1 w-full" name="description   " required autofocus autocomplete="description">{{old('description')}}</x-text-area>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="photo" :value="__('photo')" />
                            <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" required autofocus autocomplete="photo" />
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>
                        <x-primary-button type="submit">Adicionar</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
