<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{

    public function hello(string $nome)
    {
        return view('home/hello', ['user' => $nome]);
    }
}
