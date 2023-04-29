<!DOCTYPE html>
<html lang="en">
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
    <title>lessaveursdebtissam</title>
</head>
<body>
    <header>
            <nav class="flex justify-center gap-20 h-[7rem] bg-[#FFC0C0] shadow-nav p-1">
                <img src={{asset("storage/images/main-logo.png")}} alt="image" class="h-[6.4rem] w-auto">
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
    <footer>
    </footer>
    <script src={{ mix("js/app.js") }}></script>
</body>
</html>