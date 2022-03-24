function _(x) { return document.getElementById(x)}

window.addEventListener('load', function () {

})

function comment(event) {
     var key = event.keyCode;
     if(key == 13){
         var value=document.getElementById('comment').value;
         var code=_('code').value;
         _('coment').submit;
         if(value !==""){
             var ajax = new XMLHttpRequest();
             ajax.open("GET", "posting/"+value+"/"+code, true);
             ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
             ajax.onreadystatechange = function () {
                 if (ajax.readyState == 4 && ajax.status == 200) {
                      alert(ajax.responseText);
                     _('comments_div').innerHTML="";
                     _('comments_div').innerHTML=value;
                     _('comment').value='';
                 }
             }
             ajax.send(null);


         }
     }else{
     }
}