<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VremeRezervacijeModel extends Model
{
    public function PrikazVreme()
    {
        return \DB::table('vremerezervacije')->get();
    }

}
