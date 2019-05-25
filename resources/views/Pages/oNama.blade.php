@extends("Layout.index")
@include('Parts.slajderZaOstaleStranice',['naslov'=>'O nama','slika'=>'img/page-top-bg/1.jpg'])
@section("sredina")

    <!-- Intro section -->
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="flaticon-019-rib"></i>
                <h2>O nama</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>Osnovani smo sa ciljem da Vas ugostimo i pruzimo preukusna i razlicita jela iz celog sveta. Kao i raznovrsan asortiman kako stranih tako i domacih vrsta vina.</p>
                </div>

            </div>
        </div>
    </section>
    <!-- Intro section end -->


    <!-- Chefs section -->
    <section class="chefs-section set-bg" data-setbg="img/chefs-bg.jpg">
        <div class="container">
            <div class="section-title text-white">
                <i class="flaticon-006-steak"></i>
                <h2>Autor</h2>
            </div>
            <div class="row chefs">
                <div class="col-md-4 chef">

                </div>
                <div class="col-md-4 chef">
                    <img src="img/autor.jpg" alt="">
                    <h4>Nemanja Ranisavljevic</h4>
                    <p>Zovem se Nemanja Ranisavljević student sam Visoke ICT škole. Rođen sam 27.10.1997. godine u Beogradu živim u Sremskim Mihaljevcima. Završio sam srednju Ekonomsku skolu "Nada Dimić" u Zemunu. Moj broj ideksa je 86/16.</p>
                </div>
                <div class="col-md-4 chef">

                </div>
            </div>
        </div>
    </section>
    <!-- Chefs section end -->

    @endsection

