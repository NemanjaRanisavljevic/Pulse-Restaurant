function proveraLogovanja()
{
    var email = $("#lEmail").val();
    var sifra = $("#lSifra").val();

    var regSifra =/^[A-Z][\w\d]{5,}$/;
    var regEmail=/^[\w]+[\.\_\-\w\d]*\@gmail\.com$/;



    var greske = Array();

    if(!regSifra.test(sifra))
    {
        document.getElementById("sifraS").style.display = "flex";
        greske.push("Greska sifra");
    }
    if(!regEmail.test(email))
    {
        document.getElementById("emailS").style.display = "flex";
        greske.push("Greska email");
    }

    if(greske.length !=0)
    {
        return false;
    }else
    {

        return true;

    }
}

function ProveraUtiska() {

    var utisak = $("#utisak").val();
    var greske = Array();


    if(utisak == "")
    {
        document.getElementById("sUtisak").style.display = "flex";
        greske.push("Greska");
    }
    if(utisak == " ")
    {
        document.getElementById("sUtisak").style.display = "flex";
        greske.push("Greska");
    }
    if(greske.length !=0)
    {
        return false;
    }else
    {

        return true;

    }
}
function ProveraPosta()
{
    var kategorije = $("#ddlKategorije").val();
    var naslov = $("#naslov").val();
    var slika = $("#slikaPosta").val();
    var opis = $("#opis").val();

    var greske = Array();

    var regNaslov =/^[A-ZČĆŽŠĐ][\sA-zčćžšđ]{10,}$/;


    if(!regNaslov.test(naslov))
    {
        document.getElementById("sNaslov").style.display = "flex";
        greske.push("Greska naslov");
    }
    if(opis=="")
    {
        document.getElementById("sOpis").style.display = "flex";
        greske.push("Greska opis");

    }
    if(kategorije =="0")
    {
        document.getElementById("sKategorije").style.display = "flex";
        greske.push("Greska igrica");

    }

    if(greske.length !=0)
    {
        return false;
    }else
    {

        return true;

    }

}

