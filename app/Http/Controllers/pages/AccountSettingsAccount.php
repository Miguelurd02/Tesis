<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 

use App\Models\Suscriptor;

class AccountSettingsAccount extends Controller
{
  public function index()
  {
    return view('content.pages.pages-account-settings-account');
  }

 
}
