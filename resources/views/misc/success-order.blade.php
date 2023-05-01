<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href={{asset("css/app.css")}}>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Les Saveurs de Btissam</title>
</head>
<body>
<div class="flex justify-center flex-col gap-5 items-center bg-secondary h-screen w-screen">
<h1 class="text-primary text-3xl font-bold font-primary">Merci pour choisir Les Saveurs de Btissam!</h1>
<p class="text-primary text-xl font-bold font-sans pb-2">Nous vous appellerons sous peu pour confirmer votre commande et discuter les détails de livraison</p>
<a href={{ route('home.index') }} class="bg-blue-500 hover:bg-blue-600 text-sm font-bold uppercase text-white font-primary py-3 px-5 rounded transition duration-300">Retour à la page d'accueil</a>
</div>
</body>
</html>