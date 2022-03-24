
function _(x){return document.getElementById(x)};


    function username_validate() {
        var uname = _('uname').value;
    // validation of username and check to database is exists or not
    var re = /^\w+$/;
        if(!re.test(uname)){
            _('uname').value="";
            _('um').innerHTML = "Username must contains letters,numbers and underscores";
            _('uname').style.border = "1px solid red";
            save_data();
            return false;
        }else {
        if (uname.length >= 3 && uname.length <= 15) {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "../../../za/check_username/"+uname, true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = function () {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    if (ajax.responseText === "ok") {
                        _('um').innerHTML = "";
                        _('uname').style.border = "none";
                        save_data();
                    } else {
                        _('uname').value="";
                        _('um').innerHTML = "Username already taken";
                        _('uname').style.border = "1px solid red";
                        save_data();
                        return false;
                    }
                }
            }
            ajax.send(null);

        } else {
            _('um').innerHTML = "Username must contain 3 to 15 characters";
            _('uname').style.border = "1px solid red";
            save_data();
            return false
          }
        }
    }
    function  mail_validate() {
        var em = _("email").value;
    // validation of email and check to database is exists or not
        if(em.trim() !== "") {
            if (em.indexOf('@') > -1 && em.indexOf('.') > -1) {
                var ajax = new XMLHttpRequest();
                ajax.open("GET", "check_email/" + em, true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        if (ajax.responseText === "ok") {
                            _('eml').innerHTML = "";
                            _('email').style.border = "none";
                            save_data();
                        } else if(ajax.responseText === "You account is blocked due to missuse or unethical behave") {
                            _("email").value="";
                            _('eml').innerHTML = " Your account is blocked";
                        }else {
                            _("email").value="";
                            _('eml').innerHTML = "Email already taken";
                            _('email').style.border = "1px solid red";
                            save_data();
                            return false
                        }
                    }
                }
                ajax.send(null);
                _('eml').innerHTML = "";
                _('email').style.border = "none";
                save_data();
            } else {
                _('eml').innerHTML = "Invalid email";
                  _('email').value="";
                _('email').style.border = "1px solid red";
                save_data();
                return false
            }
        }

    }

    function password_validate() {
       var pas1 = _('passwords').value;
       if(pas1.trim() !== ""){
           if(pas1.length >= 6){
               _('ps').innerHTML="";
               _('passwords').style.border="none";
               save_data();
           }else{
               _('ps').innerHTML="Password must be 6 of length";
               _('passwords').style.border="1px solid red";
               save_data();
               return false
           }
       }
    }

    function pass_re_validate() {
        var pas2 = _("r_password").value;var pas1 = _('passwords').value;
        if(pas2.trim() !== ""){
            if(pas2 === pas1){
                _('rps').innerHTML="";
                _('r_password').style.border="none";
                save_data();
            }else{
                _("r_password").value="";
                _('rps').innerHTML="Password do not match";
                _('r_password').style.border="1px solid red";
                save_data();
                return false
            }
        }
    }

    function a_type() {
        setTimeout('save_data()',100);
    }

    function save_data(){
        
        var uname=_("uname").value,em=_("email").value,pas1=_("passwords").value,pas2=_("r_password").value;
        if (uname !== "" && em !== "" && pas1 !== "" && pas2 !== "") {
            if (_('type1').checked == true || _('type2').checked == true) {
                _('btn').style.opacity="1";
                _("btn").removeAttribute('disabled');
                }else {
                
                document.getElementById("btn").setAttribute('disabled','disabled');
             
              }
        }else {
               document.getElementById("btn").setAttribute('disabled','disabled');
        }

}

function hide_me(){
    _("forms").style.marginTop=-600+"px";
    _("close").style.marginTop=-550+"px";
    var uname=_("uname").value,em=_("email").value,pas1=_("passwords").value,pas2=_("r_password").value;
    if (uname !== "" && em !== "" && pas1 !== "" && pas2 !== "") {
        if (_('type1').checked == true || _('type2').checked == true) {
        _('forms').submit();
        }else {
            _('type').innerHTML="Choose your account type";
            document.getElementById("btn").setAttribute('disabled','disabled');
        }
    }else {
        document.getElementById("btn").setAttribute('disabled','disabled');
    }
}


function deactivate() {
    var pass = document.getElementById("mypassword").value;
    var myid = _("myid").value;
    _('error').innerHTML = "";
    if(pass != "") {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "../../../za/deactivate/" + pass + "/" + myid, true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                if (ajax.responseText === "ok") {
                    _('confirm').style.marginTop = "80px";
                    _('overlay').style.display = "block";
                    setInterval('remove_div()', 2000);
                } else {
                    _("error").innerHTML = "Invalid password";
                }
            }
        }
        ajax.send(null);
    }else{
        _('error').innerHTML="Password required"
    }
}
function remove_div() {
    _('confirm').style.marginTop = "-180px";
    window.location="https://olovamp3.com/za";
}


function searchs(id) {
    _(id);
}