<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PiceModel extends Model
{
    public function Dohvati()
    {
        return \DB::table('pice')
            ->paginate(5);
    }
    public function DodajPice($naziv,$cena,$sastojci)
    {
        \DB::table('pice')
            ->insert(['nazivPica'=>$naziv,
                'cena'=>$cena,
                'sastojci'=>$sastojci]);
    }
    public function DohvatiSve()
    {
        return \DB::table('pice')
            ->get();
    }
    public function Brisanje($id)
    {
        \DB::table('pice')
            ->where('idPice',$id)
            ->delete();
    }
    public function PicePoId($id)
    {
        return \DB::table('pice')
            ->where('idPice',$id)
            ->first();
    }
    public function UpdatePica($id,$naziv,$sastojci,$cena)
    {
        \DB::table('pice')
            ->where('idPice',$id)
            ->update(['nazivPica'=>$naziv,
                'cena'=>$cena,
                'sastojci'=>$sastojci]);
    }

}
