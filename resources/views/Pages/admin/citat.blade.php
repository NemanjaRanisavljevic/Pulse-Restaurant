@extends("Layout.admin.index")
@section('sadrzaj')
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-user"></i>
                <h2>Utisci Korisnika</h2>
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
                        <th scope="col">Utisak</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Prezime</th>
                        <th scope="col">Obrisi</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($utisci as $utisak)
                        <tr>
                            <th scope="row">{{$utisak->idCitat}}</th>
                            <td>{{$utisak->sadrzaj}}</td>
                            <td>{{$utisak->ime}}</td>
                            <td>{{$utisak->prezime}}</td>
                            <td><button type="button" class="btnBrisanjeUtiska"data-id="{{$utisak->idCitat}}">
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
