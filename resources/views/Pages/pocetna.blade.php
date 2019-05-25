@extends("Layout.index")
@include("Parts.slajder")
@section("sredina")

    <!-- Intro section -->
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="flaticon-019-rib"></i>
                <h2>Dobrodosli</h2>
            </div>
            <div class="row">
                <div class="col-md-4 intro-item">
                    <h3></h3>
                    <p> </p>
                </div>
                <div class="col-md-4 intro-item">
                    <h3>2019</h3>
                    <p>Osnovani smo sa ciljem da Vas ugostimo i pruzimo preukusna i razlicita jela iz celog sveta.</p>
                </div>
                <div class="col-md-4 intro-item">
                    <h3></h3>
                    <p></p>
                </div>
            </div>
            <div class="text-center">
                <img src="img/sign.png" alt="">
            </div>
        </div>
    </section>

    <!-- Intro section end -->

    <!-- Testimonials section -->
    <section class="testimonials-section spad pb-0 set-bg" data-setbg="img/review-bg.jpg">
        <div class="container">
            <div class="section-title text-white">
                <i class="flaticon-020-ice-cream"></i>
                <h2>Utisci Korisnika</h2>
            </div>
            <div class="testimonials-slider owl-carousel">
                @foreach($utisci as $utisak)
                <div class="ts-item text-white">
                    <div class="quota">“</div>
                    <p>{{$utisak->sadrzaj}}</p>
                    <h6><span>{{$utisak->ime . " " . $utisak->prezime}}</span></h6>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Testimonials section end -->



    <!-- Services section -->
    <section class="services-section spad">
        <div class="container">
            <div class="section-title">
                <i class="flaticon-022-tray"></i>
                <h2>Nase Usluge</h2>
            </div>
            <div class="row services">
                @foreach($obroci as $obrok)
                <div class="col-lg-3 col-md-6 service-item">
                    <i class="{{$obrok->ikonica}}"></i>
                    <h3>{{$obrok->naziv}}</h3>
                    <p>{{$obrok->opis}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services section end -->

@endsection
