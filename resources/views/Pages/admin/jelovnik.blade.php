@extends("Layout.admin.index")
@section('sadrzaj')
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-utensils"></i>
                <h2>Jelovnik</h2>
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
                        <th scope="col">Naziv</th>
                        <th scope="col">Sastojci</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Obrok</th>
                        <th scope="col">Izmeni</th>
                        <th scope="col">Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jelovnik as $jelo)
                        <tr>
                            <th scope="row">{{$jelo->idJelovnik}}</th>
                            <td>{{$jelo->imeJela}}</td>
                            <td>{{$jelo->sastojci}}</td>
                            <td>{{$jelo->cena}} din</td>
                            <td>{{$jelo->naziv}}</td>
                            <td><button type="button" class="btnEditJela" data-id="{{$jelo->idJelovnik}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            <td><button type="button" class="btnBrisanjeJela" data-id="{{$jelo->idJelovnik}}">
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
                        <h2>Promeni Jelo</h2>
                    </div>
                    <!-- contact form -->
                    <form class="contact-form" action="{{route('jelovnik')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="naslov" id="txtNaziv" placeholder="Naziv">
                                <input type="text" name="sastojci" id="txtSastojci" placeholder="Sastojci">
                                <input type="text" name="cena" id="txtCena" placeholder="Cena">
                                <input type="hidden"  name="skrivnoId" id="skrivnoId">
                                <select class="custom-select" id="ddlObrok" name="obrok">
                                    <option selected value="0">Obrok...</option>
                                    @foreach($obroci as $obrok)
                                        <option value="{{$obrok->idObrok}}">{{$obrok->naziv}}</option>
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
