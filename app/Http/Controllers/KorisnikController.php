<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNovogKorisnikaRequest;
use App\Http\Requests\AdminUpdateKorisnika;
use App\Http\Requests\ValidacijaLogovanje;
use App\Http\Requests\ValidacijaRegistracije;
use App\Models\AktivnostModel;
use App\Models\Korisnik;
use App\Models\UlogaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Pol;
use PHPMailer\PHPMailer\PHPMailer;
use PhpOption\Tests\PhpOptionRepo;
use Psy\Util\Json;

class KorisnikController extends Controller
{
    private  $modelKorisnik;
    private  $modelAktivnost;
    private  $modelPol;
    private  $modelUloga;
    public function __construct(){
        $this -> modelKorisnik = new Korisnik();
        $this->modelAktivnost = new AktivnostModel();
        $this->modelPol = new Pol();
        $this->modelUloga = new UlogaModel();

    }

    public function RegistracijaPrikaz()
    {
        $pol = new Pol();
        $polovi = $pol->DohvatiPol();
        $data['pol']= $polovi;
        return view("Pages/registracija",$data);
    }

    public  function RegistracijaUpis(ValidacijaRegistracije $request)
    {
        $ime = $request -> ime;
        $prezime = $request -> prezime;
        $sifra = $request -> sifra;
        $email = $request -> email;
        $pol = $request ->pol;
        $token = md5($email);


        try
        {
            $idKorisnik = $this -> modelKorisnik -> Registracija($ime, $prezime, $email, md5($sifra), $pol,$token);

            $mail = new PHPMailer(true);
            try
            {
                $mail->SMTPDebug = 0;
                $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false,'allow_self_signed' => true));

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // backup
                $mail->SMTPAuth = true;
                $mail->Username = 'nemanjaranisavljevicsajt@gmail.com';
                $mail->Password = 'beka123456';
                $mail->SMTPSecure = 'tls'; // tls enkripcija (moze i ssl)
                $mail->Port = 587;
                $mail->setFrom('nemanjaranisavljevicsajt@gmail.com', 'Pulse Restoran Registracija');
                $mail->addAddress($email);

                // content
                $mail->isHTML(true);
                $mail->Subject = 'Aktivirajte Vas nalog!';

                $mail->Body = 'Za aktivaciju vaseg naloga, kliknite na sledeci link: ' . "http://localhost/sajtLaravel/public/aktivacija/" . $token;
                //PROMENJENO NA SERVERU POTANJA

                $mail->send();


            }
            catch (QueryException $e)
            {

                \Log::info("Mail za Aktivaciju nije poslat!". $e->getMessage());
            }
            $this->modelAktivnost->AddAktivnost("Registracija",$idKorisnik);

        }catch (QueryException $e)
        {
            echo  $e->getMessage();
        }
    }

    public function Logovanje(ValidacijaLogovanje $request)
    {
        $email = $request->lEmail;
        $sifra = $request->lSifra;

        try
        {
            $korisnik = $this->modelKorisnik->Logovanje($email,md5($sifra));


            if(empty($korisnik))
            {
                \Log::critical("Korisnik je pokusao da se uloguje, a ne postoji u bazi sa ip adresom -> " . $request->ip());
                return redirect()->route('registracija');

            }else
            {
                $idKorisnik = $korisnik->idKorisnik;
                $this->modelAktivnost->AddAktivnost("Logovanje",$idKorisnik);
                $request ->session()->put('korisnik',$korisnik);
                return redirect()->route('index');

            }
        }catch (QueryException $e)
        {
            \Log::info("Neuspela registracija!". $e->getMessage());
        }

    }

    public function Logout(Request $request)
    {
        $idKorisnik = $request->session()->get('korisnik')->idKorisnik;
        $this->modelAktivnost->AddAktivnost("Logout",$idKorisnik);
        $request->session()->forget('korisnik');
        return redirect()->route('index');
    }

    public function AktivacijaNaloga($token)
    {
        $this->modelKorisnik->token = $token;
        $this->modelKorisnik->Aktivacija();
        return redirect()->route('registracija')->with('uspesno','Uspesno ste aktivirali vas nalog. Hvala Vam!');

    }

    //Admin panel
    public function PrikazKorisnikaAdmin()
    {
        $korisnici = $this->modelKorisnik->PrikazKorisnikaAdmin();
        $pol = $this->modelPol->DohvatiPol();
        $uloge = $this->modelUloga->DohvatiUloge();
        return view('Pages/admin/korisnici',['korisnici'=>$korisnici,'polovi'=>$pol,'uloge'=>$uloge]);
    }
    public function BrisanjeKorisnika(Request $request)
    {
        $id = $request->id;
        $this->modelKorisnik->id = $id;
        $this->modelKorisnik->BrisanjeKorisnika();
        abort(204);
    }
    public function DohvatiKorisnikaPoId(Request $request)
    {
        $id = $request->id;
        $korisni = $this->modelKorisnik->DohvatiKorisnikaPoId($id);

        return Json::encode($korisni);
    }
    public function UpdateKorisnika(AdminUpdateKorisnika $request){
        $ime = $request->ime;
        $prezime = $request->prezime;
        $email = $request->email;
        $sifra = $request->sifra;
        $pol = $request->ddlPol;
        $uloga = $request->ddlUloga;
        $aktivan = $request->ddlAktivan;
        $aktivan = intval($aktivan);


        $idKorisnika =$request->skrivnoId;


        if(empty($sifra))
        {
            $this->modelKorisnik->UpdateKorisnika($ime,$prezime,$email,$pol,$uloga,$aktivan,$idKorisnika);
            return redirect()->back()->with('uspesno','Uspesno ste izmenili korisnika.');
        }else
        {
            $request->validate([
                'sifra' => 'required|regex:/^[A-Z][\w\d]{5,}$/'
            ]);
            $this->modelKorisnik->UpdateKorisnikaSaSifrom($ime,$prezime,$email,$pol,$uloga,$aktivan,$idKorisnika,md5($sifra));
            return redirect()->back()->with('uspesno','Uspesno ste izmenili korisnika.');
        }
    }

    public function PrikazFormeZaNovogK()
    {
        $pol = $this->modelPol->DohvatiPol();
        $uloge = $this->modelUloga->DohvatiUloge();
        return view('Pages/admin/noviKorisnik',['polovi'=>$pol,'uloge'=>$uloge]);
    }
    public function InsertNovogKorisnika(AddNovogKorisnikaRequest $request)
    {
        $ime = $request->ime;
        $prezime = $request->prezime;
        $email = $request->email;
        $sifra = $request->sifra;
        $pol = $request->ddlPol;
        $uloga = $request->ddlUloga;
        $aktivan = $request->ddlAktivan;
        $aktivan = intval($aktivan);

        try{
            $this->modelKorisnik->InsertNovogKorisnika($ime,$prezime,$email,$pol,$uloga,$aktivan,$sifra);
            return redirect()->back()->with('uspesno','Uspesno ste dodali novog korisnika.');


        }catch (QueryException $e){
            \Log::info("Greska pri unosu novog korisnika.".$e->getMessage());
        }


    }


}
