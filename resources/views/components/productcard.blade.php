@props(['product'])
<div class="w-full max-w-[16rem] border border-gray-200 rounded-lg shadow bg-secondary overflow-hidden">
    <a href="#">
        <img class="p-2 hover:scale-[1.09] transition duration-300 rounded-2xl" src="storage/{{$product->picture}}" alt="product image" />
    </a>
    <div class="px-2 pb-2">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 pb-2 text-primary">{{ $product->name }}</h5>
        </a>
        <div class="flex items-center justify-between">
            <span class="text-2xl text-gray-900 font-primary font-bold">{{ $product->price }}dh</span>
            <a href={{route('addToCart', $product->id)}} class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ajouter au panier</a>
        </div>
    </div>
</div>
