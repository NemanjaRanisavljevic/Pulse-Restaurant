<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RezervacijaModel extends Model
{
    public function UpisiRezervaciju($datum,$brojOsoba,$korisnik,$vreme)
    {
        return \DB::table('rezervacija')
            ->insert(['datum_rezervacije'=>$datum,
                'brojOsoba'=>$brojOsoba,
                'korisnikId'=>$korisnik,
                'vremeId'=>$vreme]);
    }
    public function SveRezervacije()
    {
        return \DB::table('rezervacija as r')
            ->join('korisnik as k','k.idKorisnik','=','r.korisnikId')
            ->join('vremerezervacije as v','v.idVreme','=','r.vremeId')
            ->get();
    }
    public function BrisanjeRez($id){
        \DB::table('rezervacija')
            ->where('idRezervacija',$id)
            ->delete();
    }
}
