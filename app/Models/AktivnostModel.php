<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivnostModel extends Model
{
    public function AddAktivnost($poruka,$idKorisnika)
    {
        \DB::table('aktivnost')
            ->insert([
                'poruka'=>$poruka,
                'korisnikId'=>$idKorisnika
            ]);
    }
    public function PrikazAktivnosti()
    {
        return \DB::table('aktivnost as a')
            ->join('korisnik as k','k.idKorisnik','=','a.korisnikId')
            ->paginate(5);
    }

    public function BrisanjeAktivnosti($id)
    {
        \DB::table('aktivnost')
            ->where('idAktivnost',$id)
            ->delete();

    }
}
