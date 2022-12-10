var clicker = null;
var newisim = null;
var newsoyisim = null;
var newtel = null;
var newpass = null;
var newmail = null;
function yazidegis(degis) {
    document.getElementById("exampleModalLabel").innerHTML = degis;
    var place = document.getElementById("news");
    place.placeholder = degis;
}
function tipdegis(degis) {
    var pass = document.getElementById("news");
    pass.type = degis;
}
function veridegis() {
    if (clicker == "isim") {
        document.getElementById("newname").value = newisim =
            document.getElementById("news").value;
    }
    if (clicker == "tel") {
        document.getElementById("newphone").value = newtel =
            document.getElementById("news").value;
    }
    if (clicker == "soy") {
        document.getElementById("newsurname").value = newsoyisim =
            document.getElementById("news").value;
    }
    if (clicker == "pass") {
        document.getElementById("newpass").value = newpass =
            document.getElementById("news").value;
    }
    if (clicker == "mail") {
        document.getElementById("newemail").value = newmail =
            document.getElementById("news").value;
    }
}
