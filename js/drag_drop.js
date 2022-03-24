function _(x) {return document.getElementById(x)};

function drag_drop(event) {
    event.preventDefault();
    var file_name = event.dataTransfer.files[0].name, file_size = event.dataTransfer.files[0].size,
        file_type = event.dataTransfer.files[0].type;
 
    if (file_type !== "audio/mp3" && file_type !== "audio/x-ms-wma" && file_type !== "audio/wav" ){
        _("zone_status").innerHTML = "<span style=\"color:red\">Your track must be a mp3,wav,wma format</span>";
        _('file_status').innerHTML="";_('error').innerHTML="";return false;}

    if (file_size >= 110000000) {_("zone_status").innerHTML = "<span style=\"color:red\">Your track is too large</span>";
        _('file_status').innerHTML="";_('error').innerHTML="";return false;}

    _("zone_status").innerHTML='<img src="thumbnails/loading.gif" width="30">';
    var ajax = new XMLHttpRequest();
    ajax.open("GET","checking_song/"+file_name, true);
    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function () {
        if(ajax.readyState ==  4 && ajax.status == 200){
            if(ajax.responseText !== "ok"){
                _("zone_status").innerHTML = "<span style=\"color:red\">"+ajax.responseText+"</span>";
                if(ajax.responseText === "That track has already been uploaded"){
                    _('file_status').innerHTML="";
                }
                _("error").innerHTML ="";
            }else {
               _("zone_status").innerHTML = "<span>" + file_name + "</span>";
               _('file_status').innerHTML= file_name;
            }
        }
    }
    ajax.send(null);
}

function file_check(){

  //  _("zone_status").innerHTML = "";_("error").innerHTML ="";
    var file_name = _('file').files[0].name, file_size = _('file').files[0].size,
        file_type = _('file').files[0].type;
    if (file_type !== "audio/mp3" && file_type !== "audio/x-ms-wma" && file_type !== "audio/wav" && file_type !=="audio/mpeg"){
        _("error").innerHTML = "Your track must be a mp3,wav,wma format";
        _('file').value='';
        _("zone_status").innerHTML="<b>Drag your track here</b>";_('file_status').innerHTML="";
        return false;}

    if (file_size > 110000000) {_("error").innerHTML = "Your track is too large";
    _("zone_status").innerHTML="<b>Drag your track here</b>";_('file_status').innerHTML="";_('file').value='';return false;}
    _("error").innerHTML ="";
    _('check').innerHTML="Please Wait..."
    var ajax = new XMLHttpRequest();
    ajax.open("GET","checking_song/"+file_name, true);
    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function () {
        if(ajax.readyState ==  4 && ajax.status == 200){
            if(ajax.responseText !== "ok"){
                if(ajax.responseText === "That track has already been uploaded"){
                    _('file_status').innerHTML="";_("zone_status").innerHTML ="<b>Drag your track here</b>";
                    _('file').value='';
                    _('check').innerHTML=""
                }
                _("error").innerHTML = ajax.responseText;
            }else {
                _("zone_status").innerHTML = "<span>" + file_name + "</span>";
                _('file_status').innerHTML=file_name ;
                _("error").innerHTML ="";
                _('check').innerHTML=""
            }
        }
    }
    ajax.send(null);
}


function drag_over(event) {event.preventDefault();return false}

function uploadFile(){
    var file = _("file").files[0];
    if ( _("file").value != "") {
        document.getElementsByName("upbtn").item(0).style.display="none";
        var formdata = new FormData();
        formdata.append("file", file);
        formdata.append("lyrics", _('textarea').value);
        formdata.append('genree', _('genre').value);
        formdata.append("myname",_('myname').value);
        formdata.append('id',_('id2').value)
        formdata.append('_token',document.getElementsByName("_token").item(0).value);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "uploading");
        ajax.send(formdata);
    }else {
        _("error").innerHTML="Please select your Song before Upload";
    }
}
function progressHandler(event){

    var percent = (event.loaded / event.total) * 100;
    _("statuss").style.display="block";
    _("bar").style.width=Math.round(percent)+"%";
    _("cal").innerHTML=Math.round(percent)+" %"
//    _("statuss").innerHTML ="<span style='color: #b05f3c'>Uploading... "+Math.round(percent)+"%</span>";
    if(percent == 100){
        _("statuss").innerHTML ="<span style='color: #b05f3c;font-size: 16px'>Please wait...</span>";
    }
}
function completeHandler(event) {
   // _("error").innerHTML = event.target.responseText;
    if(event.target.responseText == 'ok') {
        _("statuss").innerHTML = "";
        _("file").value = "";
        window.location = "../track_uploaded";
    }else{
        _("error").innerHTML = event.target.responseText;
        _("statuss").innerHTML = "";
        _("file").value = "";
    }
}
function errorHandler(event){
    _("status").innerHTML = "Upload Failed";
    _("statuss").innerHTML="";
    _("file").value="";
}
function abortHandler(event){
    _("status").innerHTML = "Upload Aborted";
    _("statuss").innerHTML="";
    _("file").value="";
}
