@extends("Layout.admin.index")
@section('sadrzaj')
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-folder"></i>
                <h2>Kategorije</h2>
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
                        <th scope="col">Broj Postova</th>
                        <th scope="col">Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($kategorije as $kategorija)
                        <tr>
                            <th scope="row">{{$kategorija->idKategorija}}</th>
                            <td>{{$kategorija->naziv}}</td>
                            <td>{{$kategorija->brojPostova}}</td>
                            <td><button type="button" class="btnBrisanjeKategorije" data-id="{{$kategorija->idKategorija}}">
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
                        <i class="fas fa-folder"></i>
                        <h2>Dodaj Novu Kategoriju</h2>
                    </div>

                    <!-- contact form -->
                    <form class="contact-form" action="{{route('addKategorija')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="txtNaziv" id="txtNaziv" placeholder="Naziv">
                                <div class="text-center">
                                    <button type="submit" name="btnAddKa" id="btnAddKa" class="site-btn">Dodaj</button>
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
