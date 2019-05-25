@extends("Layout.admin.index")
@section('sadrzaj')
    <section class="inter-section spad">
        <div class="container">
            <div class="section-title">
                <i class="fas fa-cookie-bite"></i>
                <h2>Postovi</h2>
            </div>
            @if(session()->has('uspesno'))
                <div class="alert alert-success">
                    {{session()->get("uspesno")}}
                </div>
            @endif
            <form method="POST" action="">
                @csrf
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Naslov</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Slika</th>
                        <th scope="col">Kategorija</th>
                        <th scope="col">Izmeni</th>
                        <th scope="col">Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($postovi as $post)
                        <tr>
                            <th scope="row">{{$post->idPost}}</th>
                            <td>{{$post->naslov}}</td>
                            <td>{{$post->opis}}</td>
                            <td><img src="{{asset("img/"."$post->putanja")}}" alt="{{$post->naslov}}"></td>
                            <td>{{$post->naziv}}</td>
                            <td><button type="button" class="btnEditPosta" data-id="{{$post->idPost}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            <td><button type="button" class="btnBrisanjePosta" data-id="{{$post->slikaId}}" data-img="{{$post->putanja}}" data-post="{{$post->idPost}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$postovi->links()}}
            </form>
            <div class="col-lg-10 offset-lg-1">
                <div class="contact-form-warp">
                    <div class="section-title">
                        <h2>Izmeni Post</h2>
                    </div>
                    <!-- contact form -->
                    <form class="contact-form" action="{{route("postovi")}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
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
                                <input type="hidden" name="SkrivenoID" id="SkrivenoID" value="">
                                <input type="hidden" name="SkrivenoIDS" id="SkrivenoIDS" value="">
                                <span id="sOpis">Morate uneti opis posta!</span>
                                <div class="text-center">
                                    <button type="submit" name="btnPostavljanjePosta" id="btnPostavljanjePosta" class="site-btn">Izmeni</button>
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
            </div>

        </div>
    </section>
@endsection
