<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UlogaModel extends Model
{
    public function DohvatiUloge(){
        return \DB::table('uloga')
            ->get();
    }
}
