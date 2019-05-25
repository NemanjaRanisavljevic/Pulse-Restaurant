<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnamaController extends Controller
{
    public function OnamaPrikaz()
    {
        return view('Pages/oNama');
    }
}
