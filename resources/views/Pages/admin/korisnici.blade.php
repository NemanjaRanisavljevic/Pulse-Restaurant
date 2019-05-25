@extends("Layout.admin.index")
@section('sadrzaj')
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-user"></i>
                <h2>Korisnici</h2>
            </div>
            @if(session()->has('uspesno'))
                <div class="alert alert-success">
                    {{session()->get("uspesno")}}
                </div>
            @endif
            <form method="POST" action="">
                @csrf
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Prezime</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Uloga</th>
                        <th scope="col">Aktivan</th>
                        <th scope="col">Pol</th>
                        <th scope="col">Izmeni</th>
                        <th scope="col">Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($korisnici as $korisnik)
                        <tr>
                            <th scope="row">{{$korisnik->idKorisnik}}</th>
                            <td>{{$korisnik->ime}}</td>
                            <td>{{$korisnik->prezime}}</td>
                            <td>{{$korisnik->email}}</td>
                            <td>{{$korisnik->naziv}}</td>
                            <td>{{$korisnik->aktivan}}</td>
                            <td>{{$korisnik->nazivP}}</td>
                            <td><button type="button" class="btnEditKorisnika" data-id="{{$korisnik->idKorisnik}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            <td><button type="button" class="btnBrisanjeKorisnika" data-id="{{$korisnik->idKorisnik}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
            <div class="col-lg-10 offset-lg-1">
                <div class="contact-form-warp">
                    <div class="section-title">
                        <h2>Izmeni Korisnika</h2>
                    </div>
                    <!-- contact form -->
                    <form class="contact-form" action="{{route('korisnici')}}" method="POST">
                        @csrf
                        @method('PUT')
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
            </div>

        </div>
    </section>
@endsection
