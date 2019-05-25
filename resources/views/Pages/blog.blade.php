@extends("Layout.index")
@include("Parts.slajderZaOstaleStranice",["naslov"=>"Blog","slika"=>"img/page-top-bg/3.jpg"])
@section("sredina")
    <!-- Blog section -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 ovdeUtisni" id="pozicioniraj">
                    @foreach($postovi as $post)
                        <?php
                        $vreme = $post->vreme;

                        $datumNiz = explode(" ",$vreme);
                        $datum = explode("-",$datumNiz[0]);
                        $timestemp = mktime(0,0,0,$datum[1],$datum[2],$datum[0]);
                        $datumPrikaz = date("F j, Y",$timestemp);

                        ?>
                    <div class="blog-item">
                        <a id="single_image" data-fancybox="group" alt="{{$post->alt}}" href="{{asset("img/"."$post->putanja")}}">
                            <div class="blog-thumb set-bg" data-setbg="{{asset("img/"."$post->putanja")}}">
                            <div class="blog-date">{{$datumPrikaz}}</div>
                        </div>
                        </a>
                        <div class="blog-content">
                            <h3>{{$post->naslov}}</h3>
                            <div class="blog-meta">Kategorija: {{$post->naziv}}</div>
                            <div class="blog-meta">{{" By ".$post->ime ." ".$post->prezime}}</div>
                            <p>{{$post->opis}}</p>
                        </div>
                    </div>
                    @endforeach
                        {{$postovi->links()}}

                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 sidebar">
                    <div class="sb-widget">
                        <form class="sb-search">
                            <input type="text" class="searchText" placeholder="Search">
                            <button type="button" class="btnSearch"><i class="fa fa-search"></i></button>
                            <span id="sSearch">Moguce je uneti samo slova.</span>
                        </form>
                    </div>
                    <div class="sb-widget">
                        <h5 class="sbw-title">Kategorije</h5>
                        <ul>
                            @foreach($brojkategorija as $k)
                                    <li><a class="aKategorija" data-id="{{$k->idKategorija}}" href="#pozicioniraj">{{$k->naziv }}<span>{{$k->brojPostova}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="site-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section end -->


@endsection
