<?php

namespace App\Http\Controllers;
use App\Mail\EnviarMensaje;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class Mensaje extends Controller
{
    public function index()
    {
        

      return view('content.emails.mensaje');
    }
}
