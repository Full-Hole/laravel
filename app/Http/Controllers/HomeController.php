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
        <a href="/about">About</a>
        <a href="/news">News</a>
        <a href="/categories">Categories</a>
        php;
    }
}
