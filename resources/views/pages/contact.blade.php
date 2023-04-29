<x-layout>
  <div class="mx-auto flex justify-center mt-10 gap-20">
  <div class="bg-secondary rounded w-1/3 shadow-nav p-5">
      <h1 class="text-primary text-4xl font-extrabold font-primary pb-4">Contactez-nous</h1>
      <p class="text-primary text-[1.2rem] font-semibold font-sans pb-11">Nous serions ravis de recevoir vos commentaires, commandes et messages!</p>      
      <div class="pb-10">
          <i class="fa-solid fa-phone text-black text-[1.7rem]"></i>
          <span>Example Number</span>
          </div>
      <div class="pb-10">
          <i class="fa-solid fa-envelope text-black text-[1.7rem]"></i>
          <span>Example Email</span>
      </div>
      <div>
          <i class="fa-sharp fa-solid fa-location-dot text-black text-[1.7rem]"></i>
          <span>Example Address</span>
      </div>
  </div>
  <div class="bg-secondary p-5 rounded w-1/3 shadow-nav">
      <form action={{route("contact.store")}} method="POST" class="w-full max-w-lg" onsubmit="showSpinner()">
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
                  <button class="bg-blue-500 hover:bg-blue-600 text-sm font-bold uppercase text-white font-primary py-3 px-5 rounded transition duration-300" id="btn" type="submit">Envoyer ce Message</button>
                </div>
            </form>
          </div>
  </div>
</x-layout>