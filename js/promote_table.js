function _(x){return document.getElementsByClassName(x)}
localStorage.setItem("num",1);
var num = parseInt(localStorage.getItem('num'))
function add_to_table(){
    document.getElementById('error').innerHTML="";
    var table= document.getElementById('table');
    var tr=document.getElementById('tr');
    if( _('mytable').item(0).value !== "none") {
        if (num === 1) {
            table.innerHTML += "<tr id='th'><th>Id</th><th>Country</th><th>Remove</th></tr><tr  id=" + num + "><td>" + num + "</td><td>" + _('mytable').item(0).value + "</td><td><button id='btn1' style='margin-left: -10px; margin-top:-15px' onclick='removes(" + num + ")'>X</button></td></tr>"
        } else if (num <= 5) {
            table.innerHTML += "<tr id=" + num + "><td>" + num + "</td><td>" + _('mytable').item(0).value + "</td><td><button id='btn1' style='margin-left: -10px; margin-top:-15px'  onclick='removes(" + num + ")'>X</button></td></tr>"
        } else {
            document.getElementById('error').innerHTML = "You have been exit the limit of countries";
            return false
        }
        num++;
    }else{
        document.getElementById('error').innerHTML = "Invalid country you select";
        return false;
    }
}

function removes(id){
    num--;
    document.getElementById(id).style.display="none";
    document.getElementById('error').innerHTML="";
    if(num <= 1 ){
        document.getElementById('table').innerHTML=""
    }
}

