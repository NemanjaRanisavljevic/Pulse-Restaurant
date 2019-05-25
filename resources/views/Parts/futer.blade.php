<!-- Footer section -->
<footer class="footer-section">
    <!-- map -->
    <div class="map-warp set-bg" id="map-canvas"  data-setbg="img/review-bg.jpg"></div>
    <div class="footer-bg-area set-bg" data-setbg="img/footer-bg.jpg">
        @if(session()->has('korisnik'))
            <div class="contact-form-area">
                <div class="container">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="contact-form-warp">
                            <div class="section-title">
                                <i class="fas fa-envelope"></i>
                                <h2>Kontakt</h2>
                            </div>

                            <!-- contact form -->
                            <form class="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="txtNaslov" id="txtNaslov" placeholder="Naslov">
                                        <span id="sNaslovPoruke">Polje za naslov je obavezno.</span>
                                    </div>

                                    <div class="col-md-12">
                                        <textarea name="poruka" id="poruka" placeholder="Poruka"></textarea>
                                        <span id="sPoruka">Polje za poruku je obavezno.</span>
                                        <div class="text-center">
                                            <button type="button" name="btnPoruka" id="btnPoruka" class="site-btn">Posalji Poruku</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="ispisGresaka"></div>
                        </div>
                    </div>
                </div>
            @else
                    <div class="contact-form-area">
                        <div class="container">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="contact-form-warp">
                                    <div class="section-title">
                                        <i class="far fa-address-card"></i>
                                        <h2>Logovanje</h2>
                                    </div>
                                    <!-- contact form -->
                                    <form action="{{route('logovanje')}}" method="post" class="contact-form" onsubmit="return proveraLogovanja()">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" id="lEmail" name="lEmail" placeholder="E-mail">
                                                <span id="emailS">Morate uneti email! Mora da bude gmail.com</span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" id="lSifra" name="lSifra" placeholder="Sifra">
                                                <span id="sifraS">Morate uneti sifru! Mora poceti velikim slovom i imati 6 karaktera.</span>
                                            </div>
                                            <div class="col-md-12">

                                                <div class="text-center">

                                                    <button type="submit" id="btnLogovanje" name="btnLogovanje" class="site-btn">Prijava</button>
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
                            </div>
                        </div>
        @endif
        </div>
        <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </div>
</footer>
<!-- Footer section end -->



<!--====== Javascripts & Jquery ======-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/circle-progress.min.js"></script>
<script src="js/main.js"></script>

<script type="text/javascript" src="js/fancybox/dist/jquery.fancybox.min.js"></script>


<script src="js/registracija.js"></script>
<script src="js/logovanje.js"></script>
<script src="js/search.js"></script>



<!-- load for map -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>--}}
{{--<script src="js/map.js"></script>--}}

</body>
</html>
