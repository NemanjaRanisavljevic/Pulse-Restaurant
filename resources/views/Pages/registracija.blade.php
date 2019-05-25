@extends("Layout.index")
@include('Parts.slajderZaOstaleStranice',['naslov'=>'Registracija','slika'=>'img/page-top-bg/1.jpg'])
@section("sredina")

    <!-- Intro section -->
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="far fa-address-card"></i>
                <h2>Registracija</h2>
            </div>
            @if(session()->has('uspesno'))
                <div class="alert alert-success">
                    {{session()->get("uspesno")}}
                </div>
            @endif
            <form class="contact-form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="ime" id="ime" placeholder="Ime">
                        <span id="sIme">Morate uneti ime! Prvo veliko slovo.</span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="prezime" id="prezime" placeholder="Prezime">
                        <span id="sPrezime">Morate uneti prezime! Prvo veliko slovo.</span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="email" id="email" placeholder="E-mail">
                        <span id="sEmail">Morate uneti email! Mora da bude gmail.com</span>
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="sifra" id="sifra" placeholder="Sifra">
                        <span id="sSifra">Morate uneti sifru! Mora poceti velikim slovom i imati 6 karaktera.</span>
                    </div>
                    <div class="col-md-12">
                        <select class="custom-select" id="ddlPol" name="ddlPol">
                            <option selected value="0">Pol...</option>
                            @foreach($pol as $p)
                            <option value="{{$p->idPol}}">{{$p->nazivP}}</option>
                            @endforeach
                        </select>
                        <span id="sPol">Morate izabrati pol!</span>
                        <div class="text-center">
                            <button type="button" name="btnRegistracija" id="btnRegistracija" class="site-btn">Posalji</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="ispisGresaka">
            </div>

        </div>
    </section>
    <!-- Intro section end -->



@endsection

