<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class FrontendController extends Controller
{
    //
    public function home() {
        $homepageContent = array();
        $homepageContent['news'] = Page::where('category', 'news')->first();

        return view('home', ['home' => $homepageContent]);
    }
}
