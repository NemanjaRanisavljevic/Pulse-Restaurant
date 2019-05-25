@extends("Layout.index")
@include("Parts.slajderZaOstaleStranice",["naslov"=>"Meni","slika"=>"img/page-top-bg/2.jpg"])
@section("sredina")

    <!-- Menu section -->
    <section class="mp-menu-section spad">
        <div class="container">
            <div class="section-title">
                <i class="flaticon-022-tray"></i>
                <h2>Nas Meni</h2>
            </div>
            <ul class="mp-menu-tab-nav nav nav-tabs" role="tablist">
                @foreach($obroci as $obrok)
                <li class="nav-item">
                    <a class="nav-link linkZaJelovnik" data-id="{{$obrok->idObrok}}" href="" role="tab">
                        <i class="{{$obrok->ikonica}}"></i>
                        <div class="mpm-text">
                            <h5>{{$obrok->naziv}}</h5>
                            <p>{{$obrok->pocetak ."h - ". $obrok->kraj ."h"}}</p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content menu-tab-content">
                <!-- single tab content -->
                <div class="tab-pane fade show active">
                    <div class="row menu-dark">
                        <div class="col-lg-12 aUcitajJelovnik">


                            <!-- menu item -->
                            @foreach($jelovnik as $jelo)
                            <div class="menu-item">
                                <h5>{{$jelo->imeJela}}</h5>
                                <div class="mi-meta">
                                    <p>{{$jelo->sastojci}}</p>
                                    <div class="menu-price">${{$jelo->cena}}.00</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Menu section end -->


    <!-- Menu section -->
    <section class="menu-section spad set-bg" data-setbg="img/menu-bg.jpg">
        <div class="container">
            <div class="section-title text-white">
                <i class="flaticon-001-wine"></i>
                <h2>Karta Pica</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- menu item -->

                    @foreach($pica as $pice)
                    <div class="menu-item">

                        <h5>{{$pice->nazivPica}}</h5>
                        <div class="mi-meta">
                            <p>{{$pice->sastojci}}</p>
                            <div class="menu-price">{{$pice->cena}} din</div>
                        </div>
                    </div>
                    @endforeach


                    {{$pica->links()}}
                </div>

            </div>

        </div>
    </section>
    <!-- Menu section end -->




@endsection
