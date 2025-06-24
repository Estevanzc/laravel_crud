<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center items-start flex-col gap-y-2">
                    <x-link-button href='{{ route("products.index") }}'>Adicionar Products</x-link-button>
                    <div class="w-full grid grid-cols-4 gap-x-2 gap-y-2">
                        @if ($cart)
                            @foreach ($cart as $product)
                                <div class="flex justify-center items-center flex-col bg-[rgba(255,255,255,0.1)] rounded-lg transition-all cursor-pointer hover:bg-[rgba(255,255,255,0.2)]">
                                    <div class="w-full h-[400px] flex justify-center items-start p-3">
                                        <div class="w-full h-full rounded-lg bg-center bg-cover bg-norepeat" style="background-image: url({{ asset("storage") ."/". (isset($product["photo"]) ? $product["photo"] : "products/default_product.jpg") }})"></div>
                                    </div>
                                    <div class="w-full flex justify-center items-start flex-col px-4">
                                        <p>{{$product["name"]}}</p>
                                        <p>{{$product["price"]}}</p>
                                    </div>
                                    <div class="w-full flex justify-center items-center pt-2 pb-3">
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
