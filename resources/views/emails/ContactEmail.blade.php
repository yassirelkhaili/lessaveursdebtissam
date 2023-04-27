<x-mail::message>
<h2>Vous avez reçue un nouveau message depuis {{$userinput['fname']. " " . $userinput['lname']}}</h2>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
