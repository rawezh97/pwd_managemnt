<?php

namespace App\Http\Controllers;


class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function start()
    {
        return view('main.main');
    }


}
