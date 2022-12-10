var btn = document.querySelector("#degis_button");
var res = document.querySelector("#hareket_resim");
function degis() {
    if (res.style.margin == "calc(-40.2% + 4px) 0px 0px auto") {
        res.style.margin = "calc(-40.2% + 4px) 0px 0px 0px";
        res.style.borderRadius = "50px 0px 0px 50px";
        btn.value = "GİRİŞ YAP";
    } else {
        btn.value = "KAYIT OL";
        res.style.margin = "calc(-40.2% + 4px) 0px 0px auto";
        res.style.borderRadius = "0px 50px 50px 0px";
    }
}
