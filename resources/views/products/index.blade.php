<x-layout>
    <div class="flex justify-center mt-5"> 
        <div class="grid grid-cols-4 gap-4">
            @foreach ($products as $product)
            <x-productcard :product="$product"/>
            @endforeach
        </div>
    </div>
</x-layout>