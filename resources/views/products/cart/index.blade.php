<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href='{{ route("products.index") }}'>Adicionar Products</x-link-button>
                    <div class="w-full grid grid-cols-4 gap-x-2 gap-y-2">
                        @if ($cart)
                            @foreach ($cart as $product)
                                <div class="flex justify-center items-center flex-col">
                                    <div class="w-full h-[300px] bg-center bg-cover bg-norepeat" style="background-image: url({{ asset("storage") ."/". (isset($product["photo"]) ? $product["photo"] : "products/default_product.jpg") }})"></div>
                                    <div class="w-full h-1/2">
                                        <p>Name: {{$product["name"]}}</p>
                                        <p>Price: {{$product["price"]}}</p>
                                    </div>
                                    <div class="w-full h-1/2">
                                        <x-link-button href='{{ route("cart.destroy", $product->id) }}'>Remover do carrinho</x-link-button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                                Your cart is empty.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
