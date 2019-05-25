<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JelovnikModel extends Model
{
    public function DohvatiJelovnik($id)
    {
        return \DB::table('jelovnik')
            ->where('obrokId',$id)
            ->get();
    }

    public  function InsertNovogJela($obrok,$naslov,$sastojci,$cena)
    {
        \DB::table('jelovnik')
            ->insert([
                'imeJela'=>$naslov,
                'sastojci'=>$sastojci,
                'cena'=>$cena,
                'obrokId'=>$obrok
            ]);
    }

    public function DohvatiSve()
    {
        return \DB::table('jelovnik as j')
            ->join("obrok as o","o.idObrok","=","j.obrokID")
            ->get();
    }
    public function BrisanjeJela($id)
    {
        \DB::table('jelovnik')
            ->where("idJelovnik",$id)
            ->delete();
    }
    public  function DohvatiJednoJelo($id)
    {
        return \DB::table('jelovnik')
            ->where('idJelovnik',$id)
            ->first();
    }
    public function UpdateJela($obrok,$naslov,$sastojci,$cena,$id)
    {
        \DB::table('jelovnik')
            ->where('idJelovnik',$id)
            ->update(['imeJela'=>$naslov,'cena'=>$cena,'sastojci'=>$sastojci,'obrokId'=>$obrok]);
    }


}
