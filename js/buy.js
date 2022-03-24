function buy(){
    document.getElementById("pay_txt").style.display="block";
    document.getElementById("btn_buy").style.display="none";
    document.getElementById("error").innerHTML = "";
}
function cancel_buy(){
    document.getElementById("pay_txt").style.display="none";
    document.getElementById("btn_buy").style.display="block";
    document.getElementById("error").innerHTML = "";
}
function contineu_buying() {
    var phone = document.getElementById("phone").value;
    var lounge_id = document.getElementById("lounge_id").value,track_id=document.getElementById('track_id').value,price=document.getElementById('price').value;
    if (phone.trim() !== "") {
        if (phone.trim().length === 10) {
            var contact = phone.split('');
            for (var i = 0; i < contact.length; i++) {
                if (contact[i] == '0' || contact[i] == '1' || contact[i] == '2' || contact[i] == '3' || contact[i] == '4' || contact[i] == '5' ||
                    contact[i] == '6' || contact[i] == '7' || contact[i] == '8' || contact[i] == '9') {
                    document.getElementById("error").innerHTML = "";
                    document.getElementById("error").style.color="green";
                    document.getElementById("error").innerHTML = "Please wait... "+"<img style='width: 12px'  src='../../thumbnails/loading.gif'>";
                    var ajax = new XMLHttpRequest();
                    ajax.open("GET","../../../../za/song_payment/"+phone+"/"+lounge_id+"/"+track_id+"/"+price,true);
                    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    ajax.onreadystatechange=function () {
                        if(ajax.readyState == 4 && ajax.status==200){
                            
                            if(ajax.responseText == "ok"){
                                window.location="../../../../za/proceed_to_payment_music";
                            }else{
                                document.getElementById("error").style.color="red";
                                document.getElementById("error").innerHTML="Something went wrong";
                            }
                        }
                    }
                    ajax.send("phone="+phone+"&lounge_id="+lounge_id+"&track_id="+track_id+"&price="+price);

                } else {
                    document.getElementById("error").style.color="red";
                    document.getElementById("error").innerHTML = "Invalid phone number";
                    break
                    return false
                }
            }
        } else {
            document.getElementById("error").style.color="red";
            document.getElementById("error").innerHTML = "Invalid phone number"
        }
    }else{
        document.getElementById("error").style.color="red";
        document.getElementById("error").innerHTML = "Enter phone number";
    }
}
