<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnosPostaRequest;
use App\Http\Requests\UpdatePostaRequest;
use App\Models\PostModel;
use App\Models\KategorijePostaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Psy\Util\Json;

class BlogController extends Controller
{
    private $modelPost;
    private $kategorijeModel;
    public function __construct()
    {
        $this->modelPost = new PostModel();
        $this->kategorijeModel= new KategorijePostaModel();
    }

    public function BlogPrikaz()
    {
        $postovi = $this->modelPost->PrikazPostova();

        $brojKategorija = $this->kategorijeModel->PrikazKategorijaIBroja();

        return view('Pages/blog',["postovi"=>$postovi,"brojkategorija"=>$brojKategorija]);
    }
    public function DodavanjePosta(UnosPostaRequest $request)
    {
        $slika = $request->file('slikaPosta');
        $slikaIme = $slika->getClientOriginalName();
        $slikaIme = time()."_".$slikaIme;
//        $putanjaSlike = "img/".time()."_".$slikaIme;
        public_path("img");

        try{
            $slika->move(public_path("img"),$slikaIme);

            $PostModel = new PostModel();
            $PostModel->slikaIme = $slikaIme;
            $PostModel->korisnikId = session('korisnik')->idKorisnik;
            $PostModel->kategorija = $request->ddlKategorije;
            $PostModel->opis = $request->opis;
            $PostModel->naslov = $request->naslov;
            $PostModel->DodajPost();

            return redirect()->back()->with("uspesno","Uspesno ste postavi post.");


        }catch (QueryException $e)
        {
            \Log::info("Upload slike nije uspeo ".$e->getMessage());
        }
    }

    public function SearchBlog(Request $request)
    {
        $uneto = strtolower($request->input('uneto'));
        $pretrazeno = $this->modelPost->PretragaBloga($uneto);
        $data['pretrazeno']=$pretrazeno;
        return response()->json($data);

    }
    public function SearchPaginacija(Request $request)
    {
        $strana = $request->strana;
        $poStrani = $request->poStrani;
        $offSet = ($strana-1)*$poStrani;
        $uneto = $request->uneto;
        $pretrazenaPaginacija = $this->modelPost->SearchPaginacija($uneto,$poStrani,$offSet);
        $data['pretrazenaPaginacija']=$pretrazenaPaginacija;
        return response()->json($data);
    }

    public function PostoviKategorije(Request $request)
    {
        $idKategorije = $request->idKategorije;
        try
        {
            $postovi = $this->modelPost->PostoviKategorije($idKategorije);

            return $postovi;

        }catch (QueryException $e)
        {
            \Log::info("Nije uspelo dohvatanje postova po kategorijo ". $e->getMessage());
        }

    }

    //AdminPanel
    public function PrikazSvihPostova()
    {
        $kategorije = $this->kategorijeModel->DohvatiSve();
        $postovi = $this->modelPost->PrikazPostova();

        return view('Pages/admin/postovi',['kategorije'=>$kategorije,'postovi'=>$postovi]);
    }
    public function BrisanjePosta(Request $request)
    {
        $id = $request->id;
        $img = $request->img;
        $idPost = $request->idPost;
        $this->modelPost->idPosta = $idPost;
        $this->modelPost->idSlika = $id;
        $bool = $this->modelPost->BrisanjePosta();

        if(empty($bool))
        {
            unlink(public_path('img/').$img);
        }
    }
    public function DohvatiPostPoId(Request $request)
    {
        $id = $request->id;
        $post = $this->modelPost->DohvatiPoId($id);
        return Json::encode($post);
    }
    public function UpdatePosta(UpdatePostaRequest $request)
    {
       $kategorija = $request->ddlKategorije;
       $naslov = $request->naslov;
       $opis = $request->opis;
       $idPosta = $request->SkrivenoID;
       $slika = $request->file('slikaPosta');
       $idSlike = $request->SkrivenoIDS;

       if(empty($slika))
       {
           $this->modelPost->UpdateBezSlike($naslov,$kategorija,$opis,$idPosta);
           return redirect()->back()->with('uspesno','Uspesno ste izmenili post.');
       }else
       {
           $request->validate([
               'slikaPosta'=>'required|file|image|max:2000',
           ]);
           $slikaIme = $slika->getClientOriginalName();
           $slikaIme = time()."_".$slikaIme;
           $slika->move(public_path('img'),$slikaIme);

           $this->modelPost->idPosta = $idPosta;
           $this->modelPost->naslov = $naslov;
           $this->modelPost->kategorija = $kategorija;
           $this->modelPost->slikaIme = $slikaIme;
           $this->modelPost->idSlika= $idSlike;
           $this->modelPost->opis = $opis;

           $this->modelPost->UpdateSaSlikom();
           return redirect()->back()->with('uspesno','Uspesno ste izmenili post.');

       }



    }


}
