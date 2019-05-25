<?php

namespace App\Http\Controllers;

use App\Models\AktivnostModel;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AktivnostController extends Controller
{
    private $modelAktivnost;
    public function __construct()
    {
        $this->modelAktivnost = new AktivnostModel();
    }

    public function PrikazAktibnosti()
    {
        $aktivnosti = $this->modelAktivnost->PrikazAktivnosti();

        return view("Pages/admin/aktivnost",['aktivnosti'=>$aktivnosti]);
    }

    public function BrisanjeAktivnosti(Request $request)
    {

        $idAktivnosti = $request->id;

        try
        {
            $this->modelAktivnost->BrisanjeAktivnosti($idAktivnosti);
            abort(204);

        }catch (QueryException $e)
        {
            \Log::info("Greska pri brisanju. " . $e->getMessage());
        }


    }
}
