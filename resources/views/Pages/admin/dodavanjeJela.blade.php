@extends("Layout.admin.index")
@section('sadrzaj')
    <!-- Intro section -->
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-utensils"></i>
                <h2>Dodaj Jelo</h2>
            </div>
            @if(session()->has('uspesno'))
                <div class="alert alert-success">
                    {{session()->get("uspesno")}}
                </div>

            @endif
            <form class="contact-form">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <select class="custom-select" id="ddlObrok" name="ddlObrok">
                            <option selected value="0">Obrok...</option>
                            @foreach($obroci as $obrok)
                                <option value="{{$obrok->idObrok}}">{{$obrok->naziv}}</option>
                            @endforeach

                        </select>
                        <span id="sObrok">Morate izabrati obrok!</span>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="naslov" id="naslov" placeholder="Naziv Jela">
                        <span id="sNaziv">Morate uneti naziv jela.!</span>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="cena" id="cena" placeholder="Cena Jela">
                        <span id="sCena">Morate uneti cenu jela.Ne moze da pocne sa 0!</span>
                    </div>
                    <div class="col-md-12">
                        <textarea id="sastojci" name="sastojci" placeholder="Sastojci..."></textarea>
                        <span id="sSastojci">Morate uneti sastojke posta!</span>
                        <div class="text-center">
                            <button type="button" name="btnPostavljanjeJela" id="btnPostavljanjeJela" class="site-btn">Postavi</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="ispisGresaka">

            </div>

        </div>
    </section>

@endsection

