<?php

namespace App\Http\Controllers;
use App\Http\Requests\RezervacijaRequest;
use App\Models\RezervacijaModel;
use App\Models\VremeRezervacijeModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RezervacijaController extends Controller
{
    public function RezervacijaPrikaz()
    {
        $vremeModel = new VremeRezervacijeModel();
        $vreme = $vremeModel->PrikazVreme();
        return view("Pages/rezervacijaStola",['vreme'=>$vreme]);
    }
    public function UpisRezervaci(RezervacijaRequest $request)
    {
        $rezervacijaModel = new RezervacijaModel();
        $datum = $request->datum;
        $brojOsoba = $request->brojOsoba;
        $vreme = $request->vreme;
        $idKorisnika = session()->get('korisnik')->idKorisnik;


        try
        {
           $bool = $rezervacijaModel->UpisiRezervaciju($datum,$brojOsoba,$idKorisnika,$vreme);
           if ($bool)
           {
              return abort(201);
           }


        }catch (QueryException $e)
        {
            \Log::info("Neuspela rezervacija!". $e->getMessage());
        }
    }
    public function BrisanjeRezervaije(Request $request)
    {
        $id = $request->id;
        $rezervacijaModel = new RezervacijaModel();

        try
        {
            $rezervacijaModel->BrisanjeRez($id);
            return redirect()->back()->with("uspesno","Uspesno ste obrisali rezervaciju");

        }catch (QueryException $e)
        {
            \Log::info("Greska pri birsanju rezervacije. ".$e->getMessage());
        }


    }


}
