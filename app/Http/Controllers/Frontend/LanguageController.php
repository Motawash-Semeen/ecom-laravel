<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;


class LanguageController extends Controller
{
    // public function bn(){
    //     	session()->get('lang');
    //     	session()->forget('lang');
    //     	session()->put('lang', 'bn');
    //     	return redirect()->back();
    // }

    public function index($locale){
    	
        App::setLocale($locale);
        Session::put('lang', $locale);
        return redirect()->back();
    }
}
