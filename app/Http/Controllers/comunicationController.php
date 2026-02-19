<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class comunicationController extends Controller
{
  public function realComunication(){
    return view('admin/comunication/realtime_comunication');
   }
}
