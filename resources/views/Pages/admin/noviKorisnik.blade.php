@extends("Layout.admin.index")
@section('sadrzaj')
    <!-- Intro section -->
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-user"></i>
                <h2>Dodaj Korisnika</h2>
            </div>
            @if(session()->has('uspesno'))
                <div class="alert alert-success">
                    {{session()->get("uspesno")}}
                </div>
            @endif
            <form class="contact-form" action="{{route('addKorisnik')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="ime" id="ime" placeholder="Ime">
                        <input type="text" name="prezime" id="prezime" placeholder="Prezime">
                        <input type="text" name="email" id="email" placeholder="E-mail">
                        <input type="password" name="sifra" id="sifra" placeholder="Sifra">
                        <input type="hidden"  name="skrivnoId" id="skrivnoId">
                        <select class="custom-select" id="ddlAktivan" name="ddlAktivan">
                            <option selected value="0">Nije Aktivan</option>
                            <option value="1">Aktivan</option>
                        </select>
                        <select class="custom-select" id="ddlUloga" name="ddlUloga">
                            <option selected value="0">Izaberi Ulogu</option>
                            @foreach($uloge as $uloga)
                                <option value="{{$uloga->idUloga}}">{{$uloga->naziv}}</option>
                            @endforeach
                        </select>
                        <select class="custom-select" id="ddlPol" name="ddlPol">
                            <option selected value="0">Izaberi Pol</option>
                            @foreach($polovi as $pol)
                                <option value="{{$pol->idPol}}">{{$pol->nazivP}}</option>
                            @endforeach
                        </select>
                        <div class="text-center">
                            <button type="submit" name="btnUpdateJela" id="btnUpdateJela" class="site-btn">Dodaj</button>
                        </div>
                    </div>

                </div>
            </form>
            <div class="ispisGresaka">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>

@endsection
