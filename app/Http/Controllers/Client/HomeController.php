<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;

class HomeController extends BaseClientController
{
    public function index()
    {
        return view('welcome');
    }
}
