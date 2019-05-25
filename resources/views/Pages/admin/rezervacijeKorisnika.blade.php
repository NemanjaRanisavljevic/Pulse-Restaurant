@extends("Layout.admin.index")
@section('sadrzaj')
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-book-reader"></i>
                <h2>Rezervacije Korisnika</h2>
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
                        <th scope="col">Broj Osoba</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Vreme</th>
                        <th scope="col">Obrisi</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rezervacije as $r)
                        <?php
                        $datum = $r->datum_rezervacije;
                        $datumNiz = explode("-",$datum);
                        $timestemp = mktime(0,0,0,$datumNiz[1],$datumNiz[2],$datumNiz[0]);
                        $prikaz = date("F j, Y",$timestemp);
                        ?>
                        <tr>
                            <th scope="row">{{$r->idRezervacija}}</th>
                            <td>{{$r->ime}}</td>
                            <td>{{$r->prezime}}</td>
                            <td>{{$r->brojOsoba}}</td>
                            <td>{{$prikaz}}</td>
                            <td>{{$r->vreme}}</td>
                            <td><button type="button" class="btnBrisanjeRezervacije" data-id="{{$r->idRezervacija}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>

        </div>
    </section>
@endsection
