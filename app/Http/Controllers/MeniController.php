<?php

namespace App\Http\Controllers;
use App\Http\Requests\AdminAddJela;
use App\Http\Requests\AdminAddPica;
use App\Models\JelovnikModel;
use App\Models\ObrociModel;
use App\Models\PiceModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use \Psy\Util\Json;

class MeniController extends Controller
{
    private $obrociModel;
    private $jelovnikModel;
    private $picaModel;
    public function __construct()
    {
        $this->obrociModel = new ObrociModel();
        $this->jelovnikModel = new JelovnikModel();
        $this->picaModel = new PiceModel();
    }

    public function MeniPrikaz($id=3)
    {
        $piceModel = new PiceModel();
        try{
            $Obroci = $this->obrociModel->SviObroci();
            $jelovnik = $this->jelovnikModel->DohvatiJelovnik($id);

            $pica = $piceModel->Dohvati();


            return view('Pages/meni',['jelovnik'=>$jelovnik, 'pica'=>$pica,'obroci'=>$Obroci]);
        }catch (QueryException $e)
        {
            \Log::info("Neuspelo trazenje jelovnika!". $e->getMessage());
        }


    }
    public function Prikaz(Request $request)
    {
        $id = $request->id;
        try
        {
            $jelovnik = $this->jelovnikModel->DohvatiJelovnik($id);
            return $jelovnik;

        }catch (QueryException $e)
        {
            \Log::info("Neuspelo trazenje jelovnika!". $e->getMessage());
        }

    }
    //Admin panel
    public function AddJelo(AdminAddJela $request)
    {
        $obrok = $request->obrok;
        $naslov = $request->naslov;
        $sastojci = $request->sastojci;
        $cena = $request->cena;

        $jelovnikModel = new JelovnikModel();

        try
        {
            $jelovnikModel->InsertNovogJela($obrok,$naslov,$sastojci,$cena);

            abort(201);

        }catch (QueryException $e)
        {
            \Log::info("Greska pri unosu jela. " . $e->getMessage());
        }


    }
    public function AddPice(AdminAddPica $request)
    {
        $naziv = $request->naziv;
        $cena = $request->cena;
        $sastojci = $request->sastojci;

        try {
            $this->picaModel->DodajPice($naziv, $cena, $sastojci);

            return redirect()->back()->with("uspesno","Uspesno ste dodali pice");

        }catch (QueryException $e)
        {
            \Log::info("Nije uspelo dodavanje Pica u bazu. " . $e->getMessage());
        }


    }
    //Admin Panel
    public function JelovnikPrikaz()
    {
        $jelovnik = $this->jelovnikModel->DohvatiSve();
        $obroci = $this->obrociModel->SviObroci();

        return view("Pages/admin/jelovnik",['jelovnik'=>$jelovnik,'obroci'=>$obroci]);
    }
    public function BrisanjeJela(Request $request)
    {
        $id = $request->id;
        $this->jelovnikModel->BrisanjeJela($id);
        abort(204);

    }
    public function DohvatiPoIDJelo(Request $request)
    {
        $id = $request->id;
        $jelo = $this->jelovnikModel->DohvatiJednoJelo($id);

        return Json::encode($jelo);
    }
    public function UpdateJela(AdminAddJela $request)
    {
        $obrok = $request->obrok;
        $naslov = $request->naslov;
        $sastojci = $request->sastojci;
        $cena = $request->cena;
        $id = $request->input('skrivnoId');


        $this->jelovnikModel->InsertNovogJela($obrok,$naslov,$sastojci,$cena,$id);
        return redirect()->back()->with('uspesno','Uspesno ste izmenili jelo.');

    }

    public function PicaPrikaz()
    {
        $pica = $this->picaModel->DohvatiSve();

        return view("Pages/admin/pica",['pica'=>$pica]);
    }
    public function BrisanjePica(Request $request)
    {
        $id = $request->id;

        $this->picaModel->Brisanje($id);
        abort(204);
    }
    public function UpdatePica(Request $request)
    {
        $id = $request->id;
        $pice = $this->picaModel->PicePoId($id);
        return Json::encode($pice);
    }
    public function IzmenaPica(AdminAddPica $request)
    {
        $naziv = $request->naziv;
        $sastojci= $request->sastojci;
        $cena = $request->cena;
        $idPica = $request->skrivnoId;

        $this->picaModel->UpdatePica($idPica,$naziv,$sastojci,$cena);
        return redirect()->back()->with('uspesno','Uspesno ste izmenili pice');
    }






}
