<?php

namespace App\Http\Controllers\Home;

use App\Options;
use App\Pages;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function pages(Pages $slug)
    {
        $options = Options::first();
        $pages = Pages::all();
        return view('home.pages',compact('options','pages','slug'));
    }
}
