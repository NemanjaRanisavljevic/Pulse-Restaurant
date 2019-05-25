<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtisakRequest;
use App\Models\AktivnostModel;
use App\Models\Citat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CitatiController extends Controller
{
    private $modelUtisak;
    private $modelAktivnost;

    public function __construct()
    {
        $this->modelUtisak = new Citat();
        $this->modelAktivnost = new AktivnostModel();
    }

    public function UtisakPrikaz()
    {
        return view("Pages/utisakKorisnika");
    }
    public function UtisakUpis(UtisakRequest $request)
    {
        $utisak = $request->utisak;
        $korisnikId =session()->get('korisnik')->idKorisnik;

        try
        {
            $this->modelUtisak->UtisakInsert($utisak, $korisnikId);
            $this->modelAktivnost->AddAktivnost("Korisnik uneo utisak",$korisnikId);
            return redirect()->route('index');
        }catch (QueryException $e)
        {
            \Log::info("Desila se greska pri unosu utiska" . $e->getMessage());
        }

    }
    public function BrisanjeUtiska(Request $request)
    {
        $this->modelUtisak->BrisanjeUtiska($request->id);
        abort(204);
    }
}
