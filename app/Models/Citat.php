<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citat extends Model
{
    public function UtisakInsert($utisak,$korisnikId)
    {
        \DB::table('citat')
            ->insert(['sadrzaj' => $utisak,
                'korisnikId' => $korisnikId]);
    }
    public function UtisakPrikaz()
    {
        return \DB::table('citat as c')
            ->join('korisnik as k','k.idKorisnik','=','c.korisnikId')
            ->orderBy('idCitat','desc')
            ->limit(3)
            ->get();
    }
    public function UtisakPrikazAdmin()
    {
        return \DB::table('citat as c')
        ->join('korisnik as k','k.idKorisnik','=','c.korisnikId')
        ->get();
    }

    public function BrisanjeUtiska($id)
    {
        \DB::table('citat')
            ->where('idCitat',$id)
            ->delete();
    }

}
