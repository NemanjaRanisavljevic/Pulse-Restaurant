@extends("Layout.admin.index")
@section('sadrzaj')
    <!-- Intro section -->
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-cookie-bite"></i>
                <h2>Dodaj Post</h2>
            </div>
            @if(session()->has('uspesno'))
                <div class="alert alert-success">
                    {{session()->get("uspesno")}}
                </div>

            @endif
            <form class="contact-form" action="{{route("dodavanjePosta")}}" method="POST" onsubmit="return ProveraPosta()" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <select class="custom-select" id="ddlKategorije" name="ddlKategorije">
                            <option selected value="0">Kategorije...</option>
                            @foreach($kategorije as $kategorija)
                                <option value="{{$kategorija->idKategorija}}">{{$kategorija->naziv}}</option>
                                @endforeach
                        </select>
                        <span id="sKategorije">Morate izabrati kategoriju!</span>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="naslov" id="naslov" placeholder="Naslov">
                        <span id="sNaslov">Morate uneti naslov. Minimalan broj karaktera je 10!</span>
                    </div>
                    <div class="col-md-12">

                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="slikaPosta" class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Izaberi sliku</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                            </div>
                        </div>
                        <span id="sSlika">Morate izabrati sliku!</span>

                    </div>

                    <div class="col-md-12">
                        <textarea id="opis" name="opis" placeholder="Opis..."></textarea>
                        <span id="sOpis">Morate uneti opis posta!</span>
                        <div class="text-center">
                            <button type="submit" name="btnPostavljanjePosta" id="btnPostavljanjePosta" class="site-btn">Postavi</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="ispisGresaka">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>

@endsection
