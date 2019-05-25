<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddKategorijaRequest;
use App\Models\Citat;
use App\Models\KategorijePostaModel;
use App\Models\ObrociModel;
use App\Models\RezervacijaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $modelKategorije;
    public function __construct()
    {
        $this->modelKategorije = new KategorijePostaModel();
    }

    public function AdminPrika()
    {
        $kategorijeModel = new KategorijePostaModel();
        $sveKategorije = $kategorijeModel->DohvatiSve();

        return view("Pages/admin/pocetna",["kategorije"=>$sveKategorije]);
    }
    public function DodavanjeJelaPrikaz()
    {
        $obrociModel = new ObrociModel();
        $obroci = $obrociModel->SviObroci();
        return view("Pages/admin/dodavanjeJela",["obroci"=>$obroci]);
    }
    public function DodavanjePica()
    {
        return view("Pages/admin/dodajPice");
    }

    public function UtisciKorisnika()
    {
        $citatModel = new Citat();
        $utisci = $citatModel->UtisakPrikazAdmin();

        return view("Pages/admin/citat",['utisci'=>$utisci]);
    }
    public function RezervacijeKorisnika()
    {
        $rezervacijeModel = new RezervacijaModel();
        $rezervacije = $rezervacijeModel->SveRezervacije();

        return view("Pages/admin/rezervacijeKorisnika",['rezervacije'=>$rezervacije]);
    }
    public function KategorijePosta(){


        $kategorije = $this->modelKategorije->PrikazKategorijaIBroja();

        return view("Pages/admin/kategorije",['kategorije'=>$kategorije]);
    }

    public function BrisanjeKategorije(Request $request)
    {

        $id = $this->modelKategorije->idKat = $request->id;
        $this->modelKategorije->BrisanjeKategorije();

    }

    public function DodajKategoriju(AddKategorijaRequest $request)
    {
        $naziv = $request->txtNaziv;
        $this->modelKategorije->AddKategorija($naziv);
        return redirect()->back()->with("uspesno","Uspesno ste uneli novu kategoriju");
    }




}
