<?php

namespace App\Http\Controllers\cards;

use App\Models\Suscriptor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardBasic extends Controller
{
  public function index()
  {
    $suscriptors = Suscriptor::with('user')->get();


    return view('content.cards.cards-basic', compact('suscriptors'));
  }
}
