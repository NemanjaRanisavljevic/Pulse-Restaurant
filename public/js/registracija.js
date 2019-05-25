$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //fancybox
    /* This is basic - uses default settings */

    $("a#single_image").fancybox();

    /* Using custom settings */

    $("a#inline").fancybox({
        'hideOnContentClick': true
    });

    /* Apply fancybox to multiple items */

    $("a.group").fancybox({
        'transitionIn'	:	'elastic',
        'transitionOut'	:	'elastic',
        'speedIn'		:	600,
        'speedOut'		:	200,
        'overlayShow'	:	false
    });




    $('.pagination').addClass('justify-content-center');

$(".linkZaJelovnik").click(function () {
    var idObroka = $(this).attr('data-id');

    $.ajax({
        url:'meni/id',
        type:'GET',
        data:{
            id:idObroka
        },
        dataType: "json",
        success:function (data) {
              var ispis="";
              $.each(data,function(index,value) {

                ispis +='<div class="menu-item">' +
                    ' <h5>'+value.imeJela+'</h5>' +
                    ' <div class="mi-meta">' +
                    ' <p>'+value.sastojci+'</p>' +
                    ' <div class="menu-price">'+value.cena+'.00 din</div>' +
                    ' </div>' +
                    ' </div>'
             });
              $('.aUcitajJelovnik').html(ispis);
        },
        error(xhr)
        {
            var status=xhr.status;
            switch(status)
            {
                case 500:
                    alert("Greska na serveru.");
                    break;
                case 404:
                    alert("Nije pronadjena stranica");
                    break;
            }

        }
    });

});

    //registracija
    $("#btnRegistracija").click(function(){
        var ime = $("#ime").val();
        var prezime = $("#prezime").val();
        var sifra = $("#sifra").val();
        var email = $("#email").val();
        var pol = $("#ddlPol").val();




        var regIme =/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,10}$/;
        var regPrezime =/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,15}$/;
        var regSifra =/^[A-Z][\w\d]{5,}$/;
        var regEmail=/^[\w]+[\.\_\-\w\d]*\@gmail\.com$/;

        var greske = Array();
        if(!regIme.test(ime))
        {
            document.getElementById("sIme").style.display = "flex";
            greske.push("Greska ime");
        }
        if(!regPrezime.test(prezime))
        {
            document.getElementById("sPrezime").style.display = "flex";
            greske.push("Greska Prezime");
        }
        if(!regSifra.test(sifra))
        {
            document.getElementById("sSifra").style.display = "flex";
            greske.push("Greska sifra");
        }
        if(!regEmail.test(email))
        {
            document.getElementById("sEmail").style.display = "flex";
            greske.push("Greska email");
        }

        if(pol==0)
        {
            document.getElementById("sPol").style.display="flex";
            greske.push("Greska pol");
        }

        if(greske == 0)
        {
            $.ajax({
                url:'registracija',
                type:'POST',
                data:{
                    ime:ime,
                    prezime:prezime,
                    sifra:sifra,
                    email:email,
                    pol:pol
                },
                success:function(data){

                    $("#ime").val("");
                    $("#prezime").val("");
                    $("#sifra").val("");
                    $("#email").val("");
                    $("#ddlPol").val("0");
                    alert("Uspesno ste se registrovali. Posetite vas email radi aktivacije naloga.");

                },
                error:function(xhr,statusTxt,errors)
                {
                    var status=xhr.status;
                    var greske = xhr.responseJSON.errors;

                    var ispis="<ul>";
                    $.each(greske,function (greska, value) {
                        ispis +="<li>"+ value +"</li>";

                    });
                    ispis +="</ul>";
                    $('.ispisGresaka').html(ispis);

                    switch(status)
                    {
                        case 500:
                            alert("Greska na serveru.Trenutno niste u mogucnosti da se registrujete");
                            break;
                        case 404:
                            alert("Pogresili ste unos nekog elementa forme");

                            break;
                    }
                }
            });
        }

    });

    //REZERVACIJA STOLA
    $("#btnRezervacija").click(function(){
        var datum = $("#datum").val();
        var brojOsoba = $("#brojOsoba").val();
        var vreme = $("#ddlVreme").val();

        var regBrojOsoba =/^[1-9][0-9]{0,2}$/;


        var greske = Array();
         if(!regBrojOsoba.test(brojOsoba))
         {
             document.getElementById("sBrojOsoba").style.display = "flex";
             greske.push("Greska ime");
         }
        if(vreme==0)
        {
            document.getElementById("sVreme").style.display="flex";
            greske.push("Greska pol");
        }
        if(datum=="")
        {
            document.getElementById("sDatum").style.display="flex";
            greske.push("Greska pol");
        }


        if(greske == 0)
        {
            $.ajax({
                url:'rezervacija',
                type:'POST',
                data:{
                    datum:datum,
                    brojOsoba:brojOsoba,
                    vreme:vreme

                },
                dataType:'json',
                success:function(data){

                    $("#datum").val("");
                    $("#brojOsoba").val("");
                    $("#ddlPol").val("0");
                    alert("Uspesno ste rezervisali sto.");

                },
                error:function(xhr,statusTxt,errors)
                {
                    var status=xhr.status;
                    var greske = xhr.responseJSON.errors;

                    var ispis="<ul>";
                    $.each(greske,function (greska, value) {
                        ispis +="<li>"+ value +"</li>";

                    });
                    ispis +="</ul>";
                    $('.ispisGresaka').html(ispis);

                    switch(status)
                    {
                        case 500:
                            alert("Greska na serveru.Trenutno niste u mogucnosti da se registrujete");
                            break;
                        case 404:
                            alert("Pogresili ste unos nekog elementa forme");

                            break;
                    }
                }
            });
        }

    });

    //Slanje poruke
    $('#btnPoruka').click(function () {
        var naslov = $("#txtNaslov").val();
        var poruka = $("#poruka").val();

        var greske = Array();
        if(poruka=="")
        {
            document.getElementById("sPoruka").style.display = "flex";
            greske.push("Greska poruka");
        }
        if(poruka==" ")
        {
            document.getElementById("sPoruka").style.display = "flex";
            greske.push("Greska poruka");
        }
        if(naslov=="")
        {
            document.getElementById("sNaslovPoruke").style.display = "flex";
            greske.push("Greska poruka");
        }
        if(naslov==" ")
        {
            document.getElementById("sNaslovPoruke").style.display = "flex";
            greske.push("Greska poruka");
        }
        if(greske==0)
        {
           $.ajax({
               url:'kontakt',
               method:'POST',
               dataType:'json',
               data:{
                   naslov:naslov,
                   poruka:poruka
               },
               success:function (data) {
                   $("#txtNaslov").val("");
                   $("#poruka").val("");

               },
               error:function (xhr) {
                   var greske = xhr.responseJSON.errors;

                   var ispis="<ul>";
                   $.each(greske,function (greska, value) {
                       ispis +="<li>"+ value +"</li>";

                   });
                   ispis +="</ul>";
                   $('.ispisGresaka').html(ispis);

               }
           });
        }
    });

});
