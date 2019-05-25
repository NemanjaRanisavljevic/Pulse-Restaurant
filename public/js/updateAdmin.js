$(document).ready(function () {
   //Izmena Jela
    $(".btnEditJela").click(function () {

        var id = $(this).data('id');

        $.ajax({
            url:'jelovnik/id',
            type:'GET',
            data:{
                id:id

            },
            dataType:'json',
            success:function(data){

                $("#txtNaziv").val(data.imeJela);
                $("#txtSastojci").val(data.sastojci);
                $("#txtCena").val(data.cena);
                $("#skrivnoId").val(data.idJelovnik);
                $("#ddlObrok").val(data.obrokId);


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

            }
        });


    });


    //Izmena Korisnika
    $(".btnEditKorisnika").click(function () {

        var id = $(this).data('id');

        $.ajax({
            url:'korisnici/id',
            type:'GET',
            data:{
                id:id
            },
            dataType:'json',
            success:function(data){

                $("#ime").val(data.ime);
                $("#prezime").val(data.prezime);
                $("#email").val(data.email);
                $("#skrivnoId").val(data.idKorisnik);
                $("#ddlAktivan").val(data.aktivan);
                $("#ddlUloga").val(data.ulogaId);
                $("#ddlPol").val(data.polId);

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

            }
        });

    });

    //izmena Pica
    $(".btnEditPica").click(function () {

        var id = $(this).data('id');

        $.ajax({
            url:'pica/id',
            type:'GET',
            data:{
                id:id
            },
            dataType:'json',
            success:function(data){

                $("#txtNaziv").val(data.nazivPica);
                $("#txtSastojci").val(data.sastojci);
                $("#txtCena").val(data.cena);
                $("#skrivnoId").val(data.idPice);


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

            }
        });
    });
    //izmena Posta
    $(".btnEditPosta").click(function () {

        var id = $(this).data('id');

        $.ajax({
            url:'postovi/id',
            type:'GET',
            data:{
                id:id
            },
            dataType:'json',
            success:function(data){
                console.log(data);
                $("#ddlKategorije").val(data.kategorijaId);
                $("#naslov").val(data.naslov);
                $("#opis").val(data.opis);
                $("#SkrivenoID").val(data.idPost)
                $("#SkrivenoIDS").val(data.slikaId)

            },
            error:function(xhr,statusTxt,errors)
            {

            }
        });
    });
});
