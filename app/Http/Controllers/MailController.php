<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function handleSubmit (Request $request) {
    $userInput = $request->all(); 
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $secret_key = env('GOOGLE_RECAPTCHA_SECRET_KEY_SERVER');
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response");
    $response = json_decode($response); 
    if ($response->success) {
        Mail::to("btissamanag@gmail.com")->send(((new ContactEmail($userInput))));
        return redirect()->route('contact.success'); 
    } else {
        session()->flash('error', 'Veuillez remplir le captcha et réessayer'); 
        return back();  
    }
    }
}
