<?php

namespace App\Http\Controllers;

use App\Http\Requests\KontaktRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;


class KontaktController extends Controller
{
    public function PosaljiMali(KontaktRequest $request)
    {
        $ime = session()->get('korisnik')->ime;
        $prezime = session()->get('korisnik')->prezime;
        $email = session()->get('korisnik')->email;
        $naslov = $request->naslov;
        $poruka = $request->poruka;

//        $mail = new PHPMailer(true);
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
            $mail->setFrom('nemanjaranisavljevicsajt@gmail.com', 'Pulse Restoran');
            $mail->addAddress('beka9977@gmail.com');

            // content
            $mail->isHTML(true);
            $mail->Subject = $naslov;

            $mail->Body ='Od korisnika '.$ime. ' '. $prezime .' 
                        '.' '.$email.' '.$poruka;

            $mail->send();

            abort(200);
        }

        catch (QueryException $e)
        {
           \Log::info("Greska pri slanju poruke. " . $e->getMessage());
        }
    }
}
