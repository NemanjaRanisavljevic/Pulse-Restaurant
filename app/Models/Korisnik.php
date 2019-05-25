<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Korisnik extends Model
{
    public $token;
    public $id;
    public function Registracija($ime,$prezime,$email,$sifra,$pol,$token)
    {
        return \DB::table('korisnik')
            ->insertGetId(['ime' => $ime,
                'prezime' => $prezime,
                'email' => $email,
                'sifra' => $sifra,
                'polId' => $pol,
                'ulogaId' => 1,
                'token'=>$token]);
        
    }

    public function  Logovanje($email,$sifra)
    {
        return \DB::table('korisnik as k')
            ->join('uloga as u','u.idUloga','=','k.ulogaId')
            ->where([
                ['email',$email],
                ['sifra',$sifra],
                ['aktivan',1]
            ])
            ->first();
    }

    public function Aktivacija()
    {
        try{
            \DB::transaction(function (){
                \DB::table('korisnik')
                    ->where("token",$this->token)
                    ->first();

                \DB::table('korisnik')
                    ->where("token",$this->token)
                    ->update(['aktivan'=>1]);
            });

        }catch (QueryException $e)
        {
            \Log::info("Nije uspela aktivacija kod upita. ".$e->getMessage());
        }
    }
    public function PrikazKorisnikaAdmin()
    {
        return \DB::table('korisnik as k')
            ->join('uloga as u','u.idUloga','=','k.ulogaId')
            ->join('pol as p','p.idPol','=','k.polId')
            ->get();
    }
    public function BrisanjeKorisnika()
    {
        try{
            \DB::transaction(function (){
                \DB::table('citat')
                    ->where("korisnikId",$this->id)
                    ->delete();

                \DB::table('aktivnost')
                    ->where("korisnikId",$this->id)
                    ->delete();

                \DB::table('rezervacija')
                    ->where("korisnikId",$this->id)
                    ->delete();

                \DB::table('post')
                    ->where("korisnikId",$this->id)
                    ->delete();

                \DB::table('korisnik')
                    ->where("idKorisnik",$this->id)
                    ->delete();

            });

        }catch (QueryException $e)
        {
            \Log::info("Nije uspela brisanja korisnika . ".$e->getMessage());
        }

    }
    public function DohvatiKorisnikaPoId($id)
    {
        return \DB::table("korisnik")
            ->where('idKorisnik',$id)
            ->first();
    }
    public  function UpdateKorisnika($ime,$prezime,$email,$pol,$uloga,$aktivan,$idKorisnika)
    {
        \DB::table('korisnik')
            ->where('idKorisnik',$idKorisnika)
            ->update(['ime'=>$ime,
                'prezime'=>$prezime,
                'email'=>$email,
                'polId'=>$pol,
                'ulogaId'=>$uloga,
                'aktivan'=>$aktivan]);
    }
    public  function UpdateKorisnikaSaSifrom($ime,$prezime,$email,$pol,$uloga,$aktivan,$idKorisnika,$sifra)
    {
        \DB::table('korisnik')
            ->where('idKorisnik',$idKorisnika)
            ->update(['ime'=>$ime,
                'prezime'=>$prezime,
                'email'=>$email,
                'polId'=>$pol,
                'ulogaId'=>$uloga,
                'aktivan'=>$aktivan,
                'sifra'=>$sifra]);
    }
    public function InsertNovogKorisnika($ime,$prezime,$email,$pol,$uloga,$aktivan,$sifra)
    {
        \DB::table('korisnik')
            ->insert(['ime'=>$ime,
                'prezime'=>$prezime,
                'email'=>$email,
                'polId'=>$pol,
                'ulogaId'=>$uloga,
                'aktivan'=>$aktivan,
                'sifra'=>$sifra]);
    }


}
