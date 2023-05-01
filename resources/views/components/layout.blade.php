<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href={{asset("css/app.css")}}>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Les Saveurs de Btissam</title>
</head>
<body class="bg-[#FEE7C9]">
    <header>
            <nav class="flex justify-center gap-20 h-[7rem] bg-[#FFC0C0] shadow-nav p-1">
                <a href={{route("home.index")}}><img src={{asset("storage/images/main-logo.png")}} alt="image" class="h-[6.4rem] w-auto"></a>
                <ul class="flex text-[1.75rem] gap-8 text-primary font-primary font-black leading-[7rem]">
                    <li><a href={{route("home.index")}}>Accueil</a></li>
                    <li><a href={{route("gallery")}}>Galerie</a></li>
                    <li><a href={{route("Apropos")}}>ÀPropos</a></li>
                    <li><a href={{route("faq")}}>Faq</a></li>
                    <li><a href={{route("contact")}}>Contact</a></li>
                    <div id="root"></div>
                </ul> 
            </nav>
              </div>
    </header>
    <main>
        {{$slot}}
    </main>
    <footer class="relative bg-secondary mt-5 pt-8 pb-6">
        <div class="container mx-[0rem] px-4">
          <div class="flex flex-wrap text-left md:text-left">
            <div class="w-full md:w-6/12 px-4">
              <h4 class="text-3xl fonat-semibold text-blueGray-700">Let's keep in touch!</h4>
              <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
                Find us on any of these platforms, we respond 1-2 business days.
              </h5>
              <div class="mt-6 md:mb-0 mb-6">
                <button onclick="location.href='https://www.facebook.com'" class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fa-brands fa-whatsapp"></i></button>
                  <button onclick="location.href='https://www.facebook.com'" class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fab fa-facebook-square"></i></button>
                  <button onclick="location.href='https://www.facebook.com'" class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fa-solid fa-phone"></i></button>
                  <button onclick="location.href='https://www.facebook.com'" class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fa-solid fa-envelope"></i></button>
              </div>
            </div>
            <div class="w-full md:w-6/12 px-4">
              <div class="flex flex-wrap items-top mb-6">
                <div class="w-full md:w-4/12 px-4 ml-auto">
                  <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">navigation</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href={{route("home.index")}}>Accueil</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href={{route("gallery")}}>Galerie</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href={{route("Apropos")}}>ÀPropos</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href={{route("faq")}}>Faq</a>
                    </li>
                    <li>
                        <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href={{route("contact")}}>Contact</a>
                      </li>
                  </ul>
                </div>
                <div class="w-full md:w-4/12 px-4">
                  <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Other Resources</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-profile">MIT License</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/terms?ref=njs-profile">Terms &amp; Conditions</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/privacy?ref=njs-profile">Privacy Policy</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/contact-us?ref=njs-profile">Contact Us</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-6 border-blueGray-300">
          <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
              <div class="text-sm text-blueGray-500 font-semibold py-1">
                Copyright © <span id="get-current-year">{{ date('Y') }}</span><span class="text-blueGray-500 hover:text-gray-800" target="_blank"> Les Saveurs de Btissam</span>.
              </div>
            </div>
          </div>
        </div>
      </footer>
    <script>
        window.totalprice = {!! session()->get("totalprice") !!}
        window.cart =  @json(session()->get('cart'))
    </script>
    <script src={{ mix("js/app.js") }}></script>
</body>
</html>