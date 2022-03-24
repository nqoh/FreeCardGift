function _(x) { return document.getElementById(x)}


function forgot_password(){
    document.getElementById("overlay").style.display="block";
   _('reset').style.marginTop=10+"px";
   _('login').style.display="block";
}

function reset() {
    var mail=_('recover_email').value;
    if(mail !== "") {
        if(mail.indexOf('.') > -1  && mail.lastIndexOf('@') > -1 ) {
          _("check_email").innerHTML="Please wait...";
          _('mail_error').innerHTML="";
            var ajax= new XMLHttpRequest();
            ajax.open('GET','../../../../za/account_confirm/'+mail,true);
            ajax.setRequestHeader('Content-type','Application/x-www-form-urlencoded');
            ajax.onreadystatechange=function(){
                if(ajax.readyState == 4 && ajax.status ==200){
                    if(ajax.responseText !== "fail" && ajax.responseText  !== "You account is blocked") {
                        _('mail_error').innerHTML='';
                        _("check_email").innerHTML="";
                        _('reset').style.marginTop=-450+"px";
                        _('confirm').style.marginTop=10+"px";
                        var data= ajax.responseText.split('|');
                        _('img').src= data[3];
                        _('fname').innerHTML=data[0];
                        _('lname').innerHTML=data[1];
                        _("uname").value=data[0];
                        _("id").value=data[2];
                        _("mail").value=mail;

                    }else if(ajax.responseText === "You account is blocked"){
                        _("check_email").innerHTML="";
                        _('mail_error').innerHTML = "Your account is blocked";
                    }else{
                        _('mail_error').innerHTML ="No account registered with that email address";
                        _("check_email").innerHTML="";
                    }
                }
            }
            ajax.send(null);
       }else{
          _('mail_error').innerHTML = "Invalid email address";
        }
    }else{
         _('mail_error').innerHTML = "Enter your email address before click reset";
    }
// _('check_email').innerHTML="Please waite...";


}


function logins(){
    _('l_error').innerHTML="";
    var username=_("s_names").value,password=_('password').value;
   if(username !== "" && password !== ""){
       var ajax= new XMLHttpRequest();
       ajax.open('GET','../../../../za/logins/'+username+'/'+password,true);
       ajax.setRequestHeader('Content-type','Application/x-www-form-urlencoded');
       ajax.onreadystatechange=function(){
           if(ajax.readyState == 4 && ajax.status ==200){
               if(ajax.responseText === "ok") {
                   cancel_overlay();
                   window.location = "../../../za/timeline";
               }else{
                   _('l_error').innerHTML=ajax.responseText;
               }
           }
       }
       ajax.send(null);
   }else{
       _('l_error').innerHTML="Username and password fields required";return false;
   }
}


function confirming() {
    // alert(_('mail').value +"|"+ _('uname').value +"|"+ _("id").value);
    var ajax= new XMLHttpRequest();
    ajax.open('GET','../../../za/account_confirmed/'+_('mail').value+'/'+_('uname').value+'/'+_("id").value,true);
    ajax.setRequestHeader('Content-type','Application/x-www-form-urlencoded');
    ajax.onreadystatechange=function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            _("confirm").innerHTML="<br><br><span style=\"margin-left: 10px ;font-size: 26px;color:#954b4b; margin-top: 10px\">" +
                "Please check your email account</span>";
              setInterval('cancel_overlay()',2000);
              location.reload();
        }
    }
    ajax.send(null);

}

function login_sub(event) {var key = event.keyCode;if(key == 13) {logins();}}
function reset_sub(event) {var key = event.keyCode;if(key == 13) {reset();}}