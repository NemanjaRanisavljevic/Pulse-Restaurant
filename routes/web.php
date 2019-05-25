<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','IndexController@IndexPrikaz')->name('index');
Route::get('/onama','OnamaController@OnamaPrikaz')->name('onama');
Route::get('/meni','MeniController@MeniPrikaz')->name('meni');
Route::get('/rezervacija','RezervacijaController@RezervacijaPrikaz')->name('rezervacija')->middleware('pristupStranicamaKorisnika');
Route::post('/rezervacija','RezervacijaController@UpisRezervaci');

Route::get('/meni/{id}','MeniController@Prikaz');


Route::get('/blog','BlogController@BlogPrikaz')->name('blog');
Route::get('/search','BlogController@SearchBlog');
Route::get('/searchPaginacija','BlogController@SearchPaginacija');

Route::get('/blog/{id}','BlogController@PostoviKategorije');


Route::get('/registracija','KorisnikController@RegistracijaPrikaz')->name('registracija');
Route::post('/registracija','KorisnikController@RegistracijaUpis');
Route::get('/aktivacija/{token}','KorisnikController@AktivacijaNaloga');

Route::post('/logovanje','KorisnikController@Logovanje')->name('logovanje');
Route::get('/logout','KorisnikController@Logout')->name('logout');

Route::get('/utisak','CitatiController@UtisakPrikaz')->name('utisak')->middleware('pristupStranicamaKorisnika');
Route::post('/utisak','CitatiController@UtisakUpis')->name('utisakU');

Route::post('/kontakt','KontaktController@PosaljiMali');

Route::middleware(['zastitaAdminPanela'])->group(function () {

    Route::get('/admin', 'AdminController@AdminPrika')->name("dodavanjePosta");
    Route::post('/admin', 'BlogController@DodavanjePosta')->name("dodavanjePosta");
    Route::get('/postovi','BlogController@PrikazSvihPostova')->name('postovi');
    Route::post('/postovi','BlogController@BrisanjePosta');
    Route::get('/postovi/{id}','BlogController@DohvatiPostPoId');
    Route::put('/postovi','BlogController@UpdatePosta');

    Route::get('/jela','AdminController@DodavanjeJelaPrikaz')->name("dodavanjeJela");
    Route::post('/jela','MeniController@AddJelo');

    Route::get('/aktivnost','AktivnostController@PrikazAktibnosti')->name('aktivnost');
    Route::post('/obrisiAktivnost','AktivnostController@BrisanjeAktivnosti')->name('aktivnostObrisi');

    Route::get('/dodajPice','AdminController@DodavanjePica')->name('dodavanjePica');
    Route::post('/dodajPice','MeniController@AddPice')->name('dodavanjePica');

    Route::get('/utisci','AdminController@UtisciKorisnika')->name('utisci');
    Route::post('/utisci','CitatiController@BrisanjeUtiska');

    Route::get('/prikazRezervacija','AdminController@RezervacijeKorisnika')->name('rezervacijeAdmim');
    Route::post('/prikazRezervacija','RezervacijaController@BrisanjeRezervaije');

    Route::get('/kategorijePosta','AdminController@KategorijePosta')->name('kategorije');
    Route::post('/kategorijePosta','AdminController@BrisanjeKategorije');
    Route::post('/addKategorija','AdminController@DodajKategoriju')->name('addKategorija');

    Route::get('/jelovnik','MeniController@JelovnikPrikaz')->name('jelovnik');
    Route::post('/jelovnik','MeniController@BrisanjeJela');
    Route::get('/jelovnik/{id}','MeniController@DohvatiPoIDJelo');
    Route::put('/jelovnik','MeniController@UpdateJela');

    Route::get('/korisnici','KorisnikController@PrikazKorisnikaAdmin')->name('korisnici');
    Route::post('/korisnici','KorisnikController@BrisanjeKorisnika');
    Route::get('/korisnici/{id}','KorisnikController@DohvatiKorisnikaPoId');
    Route::put('/korisnici','KorisnikController@UpdateKorisnika');
    Route::get('/addKorisnik','KorisnikController@PrikazFormeZaNovogK')->name('addKorisnik');
    Route::post('/addKorisnik','KorisnikController@InsertNovogKorisnika');

    Route::get('/pica','MeniController@PicaPrikaz')->name('pica');
    Route::post('/pica','MeniController@BrisanjePica');
    Route::get('/pica/{id}','MeniController@UpdatePica');
    Route::put('/pica','MeniController@IzmenaPica');


});
