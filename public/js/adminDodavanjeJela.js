$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.pagination').addClass('justify-content-center');
    $("#btnPostavljanjeJela").click(function () {

        var obrok = $("#ddlObrok").val();
        var naslov = $("#naslov").val();
        var sastojci = $("#sastojci").val();
        var cena = $("#cena").val();

        var regCena = /^[1-9][0-9]*$/;



        var greske = Array();
        if(!regCena.test(cena))
        {
             document.getElementById("sCena").style.display = "flex";
             greske.push("Greska ime");
        }

        if(obrok == 0)
        {
            document.getElementById("sObrok").style.display = "flex";
            greske.push("Greska ime");
        }

        if(naslov=="")
        {
            document.getElementById("sNaziv").style.display = "flex";
            greske.push("Greska ime");
        }
        if(naslov==" ")
        {
            document.getElementById("sNaziv").style.display = "flex";
            greske.push("Greska ime");
        }
        if(sastojci=="")
        {
            document.getElementById("sSastojci").style.display = "flex";
            greske.push("Greska ime");
        }
        if(sastojci==" ")
        {
            document.getElementById("sSastojci").style.display = "flex";
            greske.push("Greska ime");
        }




        if(greske == 0)
        {
            $.ajax({
                url:'jela',
                type:'POST',
                data:{
                    obrok:obrok,
                    naslov:naslov,
                    sastojci:sastojci,
                    cena:cena
                },
                success:function(data){

                    $("#naslov").val("");
                    $("#sastojci").val("");
                    $("#cena").val("");
                    $("#obrok").val("0");
                    alert("Uspesno ste uneli novo jelo u ponudu");

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
                            alert("Greska na serveru.Trenutno niste u mogucnosti da se postavi jelo");
                            break;
                        case 404:
                            alert("Pogresili ste unos nekog elementa forme");

                            break;
                    }
                }
            });
        }

    });
});
