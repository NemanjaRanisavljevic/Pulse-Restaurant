@extends("Layout.index")
@include("Parts.slajderZaOstaleStranice",["naslov"=>"Utisak o Nama","slika"=>"img/page-top-bg/2.jpg"])
@section("sredina")

    <!-- Intro section -->
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="flaticon-020-ice-cream"></i>
                <h2>Vas Utisak</h2>
            </div>
            <form action="{{route('utisakU')}}" method="post" class="contact-form" onsubmit="return ProveraUtiska()">
            @csrf
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="utisak" id="utisak" placeholder="Utisak"></textarea>
                        <span id="sUtisak">Morate unteti Vas utisak o nama!</span>
                        <div class="text-center">
                            <button type="submit" name="btnUtisak" id="btnUtisak" class="site-btn">Posalji</button>
                        </div>
                    </div>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert ispisGresaka">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </section>
    <!-- Intro section end -->



@endsection

