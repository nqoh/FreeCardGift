function _(x) {return document.getElementById(x)}
function scroll_ups() {
    var time=setTimeout('scroll_ups()',30);
    if(window.pageYOffset == 0){
        clearTimeout(time);
    }else{
        window.scroll(0,window.pageYOffset-40);
    }

}

function buy(){
document.getElementById("overlay").style.display="block";
document.getElementById("buy").style.display="block";
_("close").style.display="block";
}

function fill_form() {
    // document.documentElement.style.overflow="hidden";
    document.getElementById("overlay").style.display="block";
    _("forms").style.display="block"
    _("close").style.display="block";
}

function fill_login() {
    // document.documentElement.style.overflow="hidden";
    document.getElementById("overlay").style.display="block";
    _("login").style.display="block";
    _("close").style.display="block";
}

function views(id) {
    document.getElementById("myd"+id).style.display="block";
    document.getElementById("hover"+id).style.display="block";
}



function hides(id) {
    document.getElementById("myd"+id).style.display="none";
    document.getElementById("hover"+id).style.display="none";
}

function exit_buy() {
    document.getElementById("buy").style.display="none";
    document.documentElement.style.overflow="none";
    document.getElementById("overlay").style.display="none";
}
function cancel_overlay() {
    _("forms").style.display="none";
    _("login").style.display="none";
    _('reset').style.display="none";
    _("close").style.display="none";
    _("confirm").style.display="none";
        document.documentElement.style.overflow="none";
        document.getElementById("overlay").style.display="none";
        var ajax= new XMLHttpRequest();
        ajax.open('POST','index.php',true);
        ajax.setRequestHeader('Content-type','Application/x-www-form-urlencoded');
        ajax.onreadystatechange=function(){
            if(ajax.readyState == 4 && ajax.status==200){
              //  window.location="../login";
            }
        }
        ajax.send("logout=id");
}

function submit_overlay() {
    _("forms").style.dispaly="none";
    document.getElementById("overlay").style.display="none";
    document.documentElement.style.overflow="none";
    _('reset').style.display="none";
    // setTimeout(function () {
    //     document.documentElement.style.overflow="none";
    //     _("forms").style.display="none";
    //     _('reset').style.display="none";
    //     document.getElementById("overlay").style.display="none";
    // },1000);
}