<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObrociModel extends Model
{
    public function SviObroci()
    {
        return \DB::table('obrok')
            ->get();
    }
}
