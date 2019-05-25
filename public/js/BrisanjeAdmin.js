$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //brisanjeAktivnosti
    $(".btnBrisanjeA").click(function () {
        var id = $(this).data('id');

        $.ajax({
            url:'obrisiAktivnost',
            method:'POST',
            data:{
                id:id
            },
            success:function (data) {
                alert("Uspesno ste obrisali aktivnost.");
            }

        });
    });

    //Brisanje utiska korisnika
    $(".btnBrisanjeUtiska").click(function () {
        var id = $(this).data('id');

        $.ajax({
            url:'utisci',
            method:'POST',
            data:{
                id:id
            },
            success:function (data) {
                alert("Uspesno ste obrisali utisak korisnika.");
            }

        });
    });

    //Brisanje rezervacije
    $(".btnBrisanjeRezervacije").click(function () {
        var id = $(this).data('id');

        $.ajax({
            url:'prikazRezervacija',
            method:'POST',
            data:{
                id:id
            },
            success:function (data) {
                alert("Uspesno ste obrisali rezervaciju korisnika.");
            }

        });
    });

    //brisanje kategorije
    $(".btnBrisanjeKategorije").click(function () {
        var id = $(this).data('id');

        $.ajax({
            url:'kategorijePosta',
            method:'POST',
            data:{
                id:id
            },
            success:function (data) {
                alert("Uspesno ste obrisali kategoriju.");
            }

        });
    });

    //brisanje jela
    $(".btnBrisanjeJela").click(function () {
        var id = $(this).data('id');

        $.ajax({
            url:'jelovnik',
            method:'POST',
            data:{
                id:id
            },
            success:function (data) {
                alert("Uspesno ste obrisali jelo.");
            }

        });
    });

    //brisanje korisnika
    $(".btnBrisanjeKorisnika").click(function () {
        var id = $(this).data('id');

        $.ajax({
            url:'korisnici',
            method:'POST',
            data:{
                id:id
            },
            success:function (data) {
                alert("Uspesno ste obrisali korisnika.");
            }

        });
    });

    //brisanje pica
    $(".btnBrisanjePica").click(function () {
        var id = $(this).data('id');

        $.ajax({
            url:'pica',
            method:'POST',
            data:{
                id:id
            },
            success:function (data) {
                alert("Uspesno ste obrisali pice.");
            }

        });
    });

    //brisanje posta
    $(".btnBrisanjePosta").click(function () {
        var id = $(this).data('id');
        var img = $(this).data('img');
        var idPost = $(this).data('post');
        $.ajax({
            url:'postovi',
            method:'POST',
            data:{
                id:id,
                img:img,
                idPost:idPost
            },
            success:function (data) {
                alert("Uspesno ste obrisali post i sliku.");
            }

        });
    });


});
