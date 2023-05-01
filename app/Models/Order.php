<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = "orders"; 
    protected $fillable = [
        "order_id", 
        "nom_client", 
        "prenom_client", 
        "message", 
        "adresse_client", 
        "email_client", 
        "contact_client", 
        "order"
    ];
}
