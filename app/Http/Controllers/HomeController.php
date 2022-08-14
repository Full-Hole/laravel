<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return <<<php
        <h1>Приветствие</h1>
        Some text <br />
        <a href="/">Link to Admin Page</a>
        php;
    }
}
