$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btnSearch").click(function () {

        var uneto = $(".searchText").val();

        var regUneto =/^[A-z][A-z\s]+$/;

        if(!regUneto.test(uneto))
        {
            document.getElementById("sSearch").style.display = "flex";
        }else
        {

            $.ajax({
                url:'search',
                method:'GET',
                dataType:'json',
                data:{
                    uneto:uneto
                },
                success:function (data) {
                    var redovi = data.pretrazeno;

                    var brPoStrani = 2;
                    var brojStrana = Math.ceil(redovi.length/brPoStrani);

                    var ispisLinkova ='';
                    for (var i = 0; i<brojStrana;i++)
                    {
                        ispisLinkova +=`<a data-page="${i+1}" data-str="${uneto}" class="page-link" data-perpage="${brPoStrani}">${i+1}</a>`;
                    }
                    $(".site-pagination").html(ispisLinkova);

                    //Pretrazeno

                    var postovi = '';
                    for (var i=0;i<brPoStrani;i++)
                    {
                        var datumNiz = redovi[i].vreme.split(" ");
                        var datumNizDva = datumNiz[0].split("-");
                        var datumPrikaz = datumNizDva[2]+":"+datumNizDva[1]+":"+datumNizDva[0];

                        postovi +=`<div class="blog-item">
                            <a id="single_image" data-fancybox="group" href="img/${redovi[i].putanja}">
                           
                            <img class="SlikaVelicina" src="img/${redovi[i].putanja}" alt="${redovi[i].naslov}"/>
                            
                            </a>
                            <div class="blog-content">
                            <h3>${redovi[i].naslov}</h3>
                            <div class="blog-meta">Kategorija: ${redovi[i].naziv}</div>
                            <div class="blog-meta">By ${redovi[i].ime} ${redovi[i].prezime}</div>
                            <div class="blog-meta">Datum: ${datumPrikaz}</div>
                            <p>${redovi[i].opis}</p>
                            </div>
                            </div>`;
                    }
                    $(".ovdeUtisni").html(postovi);




                },
                error:function (xhr) {
                    console.log(xhr);
                }
            });
        }

    });


});
//Linkovi Paginacija
$(document).on('click','.page-link', function() {
    var strana = $(this).data('page');
    var poStrani = $(this).data('perpage');
    var uneto = $(this).data('str');

    $.ajax({
        url:'searchPaginacija',
        method:'GET',
        data:{
            strana:strana,
            poStrani:poStrani,
            uneto:uneto
        },
        success:function (data) {
            var redovi =data.pretrazenaPaginacija;
            var postovi = '';
            for (var i=0;i<redovi.length;i++)
            {
                var datumNiz = redovi[i].vreme.split(" ");
                var datumNizDva = datumNiz[0].split("-");
                var datumPrikaz = datumNizDva[2]+":"+datumNizDva[1]+":"+datumNizDva[0];

                postovi +=`<div class="blog-item">
                            <a id="single_image" data-fancybox="group" href="img/${redovi[i].putanja}"> 
                            <img class="SlikaVelicina" src="img/${redovi[i].putanja}" alt="${redovi[i].naslov}"/>
                            </a>
                            <div class="blog-content">
                            <h3>${redovi[i].naslov}</h3>
                            <div class="blog-meta">Kategorija: ${redovi[i].naziv}</div>
                            <div class="blog-meta">By ${redovi[i].ime} ${redovi[i].prezime}</div>
                            <div class="blog-meta">Datum: ${datumPrikaz}</div>
                            <p>${redovi[i].opis}</p>
                            </div>
                            </div>`;
            }
            $(".ovdeUtisni").html(postovi);
        },
        error:function (xhr) {
            console.log(xhr);
        }
    });

});




//Listanje proizvoda sa izabranom kategorijom

$(document).on('click','.aKategorija', function() {

    var idKategorije = $(this).data("id");

    $.ajax({
        url:'blog/id',
        method:'GET',
        dataType:'json',
        data: {
            idKategorije: idKategorije
        },
        success:function (data) {
            console.log(data);
            var ispis ='';
            $.each(data,function (index,value) {
                var datumNiz = value.vreme.split(" ");
                var datumNizDva = datumNiz[0].split("-");
                var datumPrikaz = datumNizDva[2]+":"+datumNizDva[1]+":"+datumNizDva[0];

                ispis +=`<div class="blog-item">
                            <a id="single_image" data-fancybox="group" href="img/${value.putanja}">
                            
                            <img class="SlikaVelicina" src="img/${value.putanja}" alt="${value.naslov}"/>
                            
                            </a>
                            <div class="blog-content">
                            <h3>${value.naslov}</h3>
                            <div class="blog-meta">Kategorija: ${value.naziv}</div>
                            <div class="blog-meta">By ${value.ime} ${value.prezime}</div>
                            <div class="blog-meta">Datum: ${datumPrikaz}</div>
                            <p>${value.opis}</p>
                            </div>
                            </div>`;
            });
            $(".ovdeUtisni").html(ispis);

        },
        error:function (xhr) {
            console.log(xhr);
        }
    });


});


