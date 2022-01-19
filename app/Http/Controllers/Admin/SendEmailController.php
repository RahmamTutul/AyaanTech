<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    function index()
    {
        return view('send_email');
    }
}
