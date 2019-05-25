@extends("Layout.admin.index")
@section('sadrzaj')
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-user"></i>
                <h2>Aktivnosti Korisnika</h2>
            </div>
            @if(session()->has('uspesno'))
                <div class="alert alert-success">
                    {{session()->get("uspesno")}}
                </div>
            @endif
            <form method="POST">
                @csrf
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Aktivnost</th>
                    <th scope="col">Datum</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Obrisi</th>

                </tr>
                </thead>
                <tbody>
                @foreach($aktivnosti as $aktivnost)
                <tr>
                    <?php
                    $vreme = $aktivnost->datum;
                    $datumNiz = explode(" ",$vreme);
                    $datum = explode("-",$datumNiz[0]);
                    $vreme = explode(":",$datumNiz[1]);
                    $timestemp = mktime($vreme[0],$vreme[1],0,$datum[1],$datum[2],$datum[0]);

                    $datumPrikaz = date("H:i - F j, Y",$timestemp);

                    ?>
                    <th scope="row">{{$aktivnost->idAktivnost}}</th>
                    <td>{{$aktivnost->poruka}}</td>
                    <td>{{$datumPrikaz}}</td>
                    <td>{{$aktivnost->ime}}</td>
                    <td>{{$aktivnost->prezime}}</td>
                    <td><button type="button" class="btnBrisanjeA"data-id="{{$aktivnost->idAktivnost}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </form>
            {{ $aktivnosti->links() }}
        </div>
    </section>
    @endsection
