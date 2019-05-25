<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class KategorijePostaModel extends Model
{
    public function DohvatiSve()
    {
        return \DB::table('kategorijaposta')->get();
    }

    public function PrikazKategorijaIBroja()
    {
        return \DB::table("kategorijaposta as k")
            ->leftJoin("post as p","p.kategorijaId","=","k.idKategorija")
            ->select(\DB::raw('count(p.kategorijaId) as brojPostova'),"k.naziv","k.idKategorija")
            ->groupBy("k.idKategorija","k.naziv")
            ->get();
    }
    public  $idKat;
    public function BrisanjeKategorije()
    {
        try{
            \DB::transaction(function (){
                \DB::table('post')
                    ->where('kategorijaId',$this->idKat)
                ->delete();

                \DB::table('kategorijaposta')
                    ->where('idKategorija',$this->idKat)
                    ->delete();

            });

        }catch (QueryException $e)
        {
            \Log::info('Greska pri brisanju kategorije. '. $e->getMessage());
        }
    }

    public function AddKategorija($naziv)
    {
        \DB::table('kategorijaposta')
            ->insert(['naziv'=>$naziv]);
    }


}
