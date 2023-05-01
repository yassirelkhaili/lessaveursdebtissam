<x-layout>
    <div class="flex justify-center mt-5 gap-20">
        <div class="bg-secondary rounded w-1/3 shadow-nav p-5">
            <h1 class="text-primary text-4xl font-extrabold font-primary pb-4">Commande</h1>
            <ul role="list" className="-my-6 divide-y divide-gray-200">
            @foreach (session()->get("cart") as $product) 
            <li class="flex py-6">
                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                  <img
                    class="h-full w-full object-cover object-center"
                    src={{ "storage/" . $product["picture"] }}
                  />
                </div>
                <div class="ml-4 flex flex-1 flex-col">
                  <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                      <h3>
                        <a>{{$product["product_name"]}}</a>
                      </h3>
                      <p class="ml-4">{{$product["price"]}}</p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">{{$product["description"]}}</p>
                  </div>
                  <div class="flex flex-1 items-end justify-between text-sm">
                    <span class="text-gray-500">Qty {{$product["quantity"]}}</span><span class="text-gray-500">Stock {{$product["stock"]}}</span>
                    <div class="flex">
                        <form action="{{ route('removeFromCartCheckout', $product["id"]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                        type="submit"
                        class="font-medium text-blue-700 hover:text-blue-800"
                      >
                      Remove
                      </button>
                        </form>
                    </div>
                  </div>
                </div>
              </li>
            @endforeach
            </ul>
            <div class="border-t border-gray-200 px-4 py-6">
                <div class="flex justify-between text-base font-medium text-gray-900 mb-3">
                  <p>Total:</p>
                  <p>{{session()->get("totalprice")}}dh</p>
                </div>
                <p class="mt-0.5 text-sm text-[#079C07] font-[500]"><i class="fa-solid fa-truck-fast"></i> Livraison gratuite</p>
                <p class="mt-0.5 text-sm text-[#079C07] font-[500]"><i class="fa-solid fa-money-bill"></i> Payer en cash à la livraison</p>
                <p class="mt-0.5 text-sm text-[#079C07] font-[500]"><i class="fa-solid fa-globe"></i> Livraison tout autour de Marrakech</p>
    </div>
</div>
    <div class="bg-secondary p-5 rounded w-[34rem] shadow-nav">
        <form action={{route("contact.store")}} method="POST" class="w-full max-w-lg">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="fname">
                    Prenom
                  </label>
                  <input pattern='.{3,}' oninvalid="setCustomValidity('Le Prenom doit contenir au moins 3 Caractères');" onInput="setCustomValidity('');" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="fname" name="fname" type="text" placeholder="Prenom" required>
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lname">
                    Nom
                  </label>
                  <input pattern='.{3,}' oninvalid="setCustomValidity('Le Nom doit contenir au moins 3 Caractères');" onInput="setCustomValidity('');" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="lname" name="lname" type="text" placeholder="Nom" required>
                </div>
              </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                      Email
                    </label>
                    <input pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" oninvalid="setCustomValidity('Veuillez entrer un Email Valide');" onInput="setCustomValidity('');" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="email" name="email" type="text" placeholder="Email" required>
                  </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                        Adresse domicile
                      </label>
                      <input pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" oninvalid="setCustomValidity('Veuillez entrer un Email Valide');" onInput="setCustomValidity('');" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="email" name="email" type="text" placeholder="Adresse" required>
                    </div>
                  </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3"> 
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="message">
                        Message
                      </label>
                      <textarea class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="message" name="message" placeholder="Message" maxlength="3000" required></textarea>
                    </div>
                  </div>
                  @if (session('error')) 
                  <div class="uppercase tracking-wide text-red-600 text-xs font-bold flex justify-center mb-5">
                      {{ session('error') }}
                  </div>
                  @endif
                    <div class="flex justify-center mb-6">
                        <div class="g-recaptcha" data-sitekey={{env('GOOGLE_RECAPTCHA_SECRET_KEY_CLIENT')}}></div>
                    </div>
                    <div class="flex justify-center">
                    <button class="bg-blue-700 hover:bg-blue-800 text-sm font-bold uppercase text-white font-primary py-3 px-5 rounded transition duration-300" id="btn" type="submit">Soumettre ma commande</button>
                  </div>
              </form>
            </div>
        </div>
</x-layout>