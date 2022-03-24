
function _(el){return document.getElementById(el);}

function change_pic(){
    document.getElementById('pic_div').style.display="block";

}
function remove_pic(){
    document.getElementById('pic_div').style.display="none";

}

function change_pp(){
    _("efile_error").innerHTML="";
    var file = document.getElementById('pp_input').files[0];
    if(file.type == "image/jpeg" || file.type=="image/jpg" || file.type=="image/jpeg" || file.type=="image/gif"){
    document.getElementById('loading').style.display="block";
    var file = _("pp_input").files[0];
    if ( _("pp_input").value != "") {
        var formdata = new FormData();
        formdata.append("pp_input", file)
        formdata.append('_token',document.getElementsByName("_token").item(0).value);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "../change_pp");
        ajax.send(formdata);
    }else {
        _("efile_error").innerHTML="Please select your Song before Upload";

}
function progressHandler(event){
    var percent = (event.loaded / event.total) * 100;

    if(percent == 100){
        _("efile_error").innerHTML ="<span style=\"color:green\">Please wait...<\span>";
    }
}
function completeHandler(event) {
    _("efile_error").innerHTML = event.target.responseText;
    document.getElementById('loading').style.display="none";
   var file= _("pp_input").files[0];
    _("pp").src="../pictures/"+file.name
}
function errorHandler(event){
    _("efile_error").innerHTML = "Upload Failed";
    _("pp_input").value="";
}
function abortHandler(event){
    _("efile_error").innerHTML = "Upload Aborted";
    _("pp_input").value="";
}

    }else{
        document.getElementById('efile_error').innerHTML="We only accept png,jpeg and gif format"
    }
}

function uploadFile(){
    var file = _("pp_input").files[0];
    if ( _("pp_input").value != "") {
        var formdata = new FormData();
        formdata.append("pp_input", file)
        formdata.append('_token',document.getElementsByName("_token").item(0).value);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "../change_pp");
        ajax.send(formdata);
    }else {
        _("efile_error").innerHTML="Please select your Song before Upload";
    }
}
function progressHandler(event){
    var percent = (event.loaded / event.total) * 100;
    if(percent == 100){
        _("efile_error").innerHTML ="please wait...";
    }
}
function completeHandler(event) {
    _("error_file").innerHTML = event.target.responseText;
    document.getElementById('loading').style.display="none";
   var file= _("pp_input").files[0];
    _("pp").src="../pictures/"+file.name
}
function errorHandler(event){
    _("error_file").innerHTML = "Upload Failed";
    _("pp_input").value="";
}
function abortHandler(event){
    _("error_file").innerHTML = "Upload Aborted";
    _("pp_input").value="";
}


function remove_pp(){
    document.getElementById('loading').style.display="block";
    var ajax= new XMLHttpRequest();
    ajax.open('GET','remove_pp',true);
    ajax.setRequestHeader('Content-type','Application/x-www-form-urlencoded');
    ajax.onreadystatechange=function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('loading').style.display="none";
            _("pp").src ="../thumbnails/newuser.gif";
        }
    }
    ajax.send(null);
}

