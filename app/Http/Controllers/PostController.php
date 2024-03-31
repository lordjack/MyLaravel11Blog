<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index(): Response
    {
        return response('Hello, World!');
    }
}
