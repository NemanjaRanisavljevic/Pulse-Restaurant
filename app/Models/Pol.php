<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pol extends Model
{
    public function DohvatiPol(){
        return \DB::table('pol')
            ->get();
    }
}
