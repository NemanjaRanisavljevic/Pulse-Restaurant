<?php

namespace App\Http\Controllers;

use App\Models\Citat;
use App\Models\ObrociModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function IndexPrikaz()
    {
        $citatModel = new Citat();
        $utisci = $citatModel->UtisakPrikaz();


        $obrociModel = new ObrociModel();
        $obroci = $obrociModel->SviObroci();

        $data['utisci'] =$obroci;

        return view('Pages/pocetna',['utisci' => $utisci,
            'obroci'=>$obroci]);
    }
}
