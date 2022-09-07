<div class="w-full" style="
    display: flex;">




    <div class="bg-white ml-4 mt-32">
        <h1>Categores</h1>
        @foreach($category as $cat)
        <div class="mb-4">
            <div class="flex items-center mb-4">
                <input id="default-checkbox" value="{{ $cat }}" wire:click="onchange($event.target.checked, $event.target.value)" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $cat }}</label>
            </div>

        </div>
        @endforeach
    </div>



    <div class="bg-white">
        <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Products</h2>
            <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @if(count($selectedField) == 0 )

                @foreach( $products as $product)

                @if(array_search($product, $products) < $productlimit * 8 ) <a href="#" class="group border-solid border-2 border-sky-500">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                        <img src="{{ $product['image'] }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">{{ $product['title'] }}</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">{{ $product['price'] }}</p>
                    </a>

                    @else
                    @if(array_search($product, $displayProduct) < $productlimit * 8 ) <a href="#" class="group border-solid border-2 border-sky-500">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                            <img src="{{ $product['image'] }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">{{ $product['title'] }}</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">{{ $product['price'] }}</p>
                        </a>
                        @endif
                        @endif
                        @endforeach

                        @else

                        @foreach( $displayProduct as $product)

                        @if(array_search($product, $displayProduct) < $productlimit * 8 ) <a href="#" class="group border-solid border-2 border-sky-500">
                            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                <img src="{{ $product['image'] }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">{{ $product['title'] }}</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">{{ $product['price'] }}</p>
                            </a>



                            @else
                            @if(array_search($product, $displayProduct) < $productlimit * 8 ) <a href="#" class="group border-solid border-2 border-sky-500">
                                <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                    <img src="{{ $product['image'] }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                                <h3 class="mt-4 text-sm text-gray-700">{{ $product['title'] }}</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">{{ $product['price'] }}</p>
                                </a>
                                @endif
                                @endif
                                @endforeach

                                @endif

                                <!-- More products... -->
            </div>
        </div>
        <div class="w-48 m-auto ">

            <button type="button" wire:click="Productlimit()" class="bg-blue-500 m-auto w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="{{ $productlimit }}"> load more</button>
        </div>


    </div>

</div>