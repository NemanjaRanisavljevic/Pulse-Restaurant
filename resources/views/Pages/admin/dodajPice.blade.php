@extends("Layout.admin.index")
@section('sadrzaj')
    <!-- Intro section -->
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-cocktail"></i>
                <h2>Dodaj Pice</h2>
            </div>
            @if(session()->has('uspesno'))
                <div class="alert alert-success">
                    {{session()->get("uspesno")}}
                </div>

            @endif
            <form class="contact-form" action="{{route("dodavanjePica")}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="naziv" id="naziv" placeholder="Naziv Pica">

                    </div>
                    <div class="col-md-12">
                        <input type="text" name="cena" id="cena" placeholder="Cena Pica">

                    </div>
                    <div class="col-md-12">
                        <textarea id="sastojci" name="sastojci" placeholder="Sastojci..."></textarea>

                        <div class="text-center">
                            <button type="submit" name="btnDodajPice" id="btnDodajPice" class="site-btn">Postavi
                        </div>
                    </div>
                </div>
            </form>

            @if ($errors->any())
                <div class="ispisGresaka">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </section>

@endsection

