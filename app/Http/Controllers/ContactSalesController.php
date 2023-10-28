<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactSalesController extends Controller
{
    public function index()
    {
        return view('contact.index',);
    }
}
