<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class PostModel extends Model
{
    public $slikaIme;
    public $kategorija;
    public $naslov;
    public $opis;
    public $korisnikId;
    public $idSlika;
    public $idPosta;

    public function DodajPost()
    {
        try{
            \DB::transaction(function(){
                $idSlike = \DB::table("slikaposta")->insertGetId([
                    "putanja" => $this->slikaIme,
                    "alt"=> $this->naslov
                ]);

                \DB::table("post")
                    ->insert([
                        "naslov" => $this->naslov,
                        "opis" => $this->opis,
                        "kategorijaId" => $this->kategorija,
                        "korisnikId" => $this->korisnikId,
                        "slikaId" => $idSlike
                    ]);

            });
        }catch (\Throwable $e)
        {
            \Log::info("Greska pri insertu posta". $e->getMessage());
            echo $e->getMessage();
        }
    }

    public function PrikazPostova()
    {
        return \DB::table('post as p')
            ->join("kategorijaposta as kat","kat.idKategorija","=","p.kategorijaId")
            ->join("korisnik as k","k.idKorisnik","=","p.korisnikId")
            ->join("slikaposta as s","s.idSlika","=","p.slikaId")
            ->paginate(2);
    }

    public function PretragaBloga($uneto){
        return \DB::table("post as p")
            ->join("kategorijaposta as kat","kat.idKategorija","=","p.kategorijaId")
            ->join("korisnik as k","k.idKorisnik","=","p.korisnikId")
            ->join("slikaposta as s","s.idSlika","=","p.slikaId")
            ->where('p.naslov','like','%'.$uneto.'%')
            ->get();
    }
    public function SearchPaginacija($uneto,$poStrani,$offSet)
    {
        return \DB::table("post as p")
            ->join("kategorijaposta as kat","kat.idKategorija","=","p.kategorijaId")
            ->join("korisnik as k","k.idKorisnik","=","p.korisnikId")
            ->join("slikaposta as s","s.idSlika","=","p.slikaId")
            ->where('p.naslov','like','%'.$uneto.'%')
            ->offset($offSet)
            ->limit($poStrani)
            ->get();
    }

    public function PostoviKategorije($idKategorije)
    {
        return \DB::table("post as p")
            ->join("kategorijaposta as kat","kat.idKategorija","=","p.kategorijaId")
            ->join("korisnik as k","k.idKorisnik","=","p.korisnikId")
            ->join("slikaposta as s","s.idSlika","=","p.slikaId")
            ->where('p.kategorijaId',$idKategorije)
            ->get();
    }
    public function BrisanjePosta()
    {
        try{
            return \DB::transaction(function(){
                \DB::table("post")
                    ->where('idPost',$this->idPosta)
                    ->delete();

                 \DB::table("slikaposta")
                    ->where('idSlika',$this->idSlika)
                    ->delete();


            });
        }catch (\Throwable $e)
        {
            \Log::info("Greska pri brisanju posta". $e->getMessage());
        }
    }
    public function DohvatiPoId($id)
    {
        return \DB::table('post')
            ->where('idPost',$id)
            ->first();
    }
    public function UpdateBezSlike($naslov,$kategorija,$opis,$idPosta)
    {
        \DB::table('post')
            ->where('idPost',$idPosta)
            ->update([
                'naslov'=>$naslov,
                'opis'=>$opis,
                'kategorijaId'=>$kategorija
            ]);
    }
    public function UpdateSaSlikom()
    {
        try{
            \DB::transaction(function(){
                $idSlike = \DB::table("slikaposta")
                    ->where('idSlika',$this->idSlika)
                    ->update([
                    "putanja" => $this->slikaIme,
                    "alt"=> $this->naslov
                ]);

                \DB::table("post")
                    ->where('idPost',$this->idPosta)
                    ->update([
                        "naslov" => $this->naslov,
                        "opis" => $this->opis,
                        "kategorijaId" => $this->kategorija,
                    ]);

            });
        }catch (\Throwable $e)
        {
            \Log::info("Greska pri insertu posta". $e->getMessage());
            echo $e->getMessage();
        }
    }




}
