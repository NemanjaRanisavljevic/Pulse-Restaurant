@extends("Layout.index")
@include('Parts.slajderZaOstaleStranice',['naslov'=>'Rezervacija Stola','slika'=>'img/page-top-bg/3.jpg'])
@section("sredina")

    <!-- Intro section -->
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-book-reader"></i>
                <h2>Rezervacija</h2>
            </div>
            <form class="contact-form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" name="datum" id="datum">
                        <span id="sDatum">Morate uneti datum!</span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="brojOsoba" id="brojOsoba" placeholder="Broj osoba">
                        <span id="sBrojOsoba">Morate uneti broj osoba.Maksimalan broj je 99!</span>
                    </div>

                    <div class="col-md-12">
                        <select class="custom-select" id="ddlVreme" name="ddlVreme">
                            <option selected value="0">Vreme...</option>
                                @foreach($vreme as $v)
                                <option value="{{$v->idVreme}}">{{$v->vreme}}</option>
                                    @endforeach
                        </select>
                        <span id="sVreme">Morate izabrati vreme!</span>
                        <div class="text-center">
                            <button type="button" name="btnRezervacija" id="btnRezervacija" class="site-btn">Rezervisi</button>
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

