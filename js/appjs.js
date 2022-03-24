var vueInstance = new Vue({
    el: "#app",
    data: {
        rname: false,
        receverName: '',
         linkDisplay:'',
        reciever_name:'',
        default_msg:'',
        user_name:'',

        msg: false,
        message: '',
        textColor: '',
        
        url:'',
        
        editor: false,
        editorName: '',

         
        getLink: false,
        selected_ecard:'',
        image_name: '',

        iconName:'',

        colors: ['Black', 'Blue', 'Pink', 'Red', 'Purple', 'Violet', 'Grey','Blue']
    },
    methods: {
        copyLink(){
            document.getElementById('linkDisplay2').select();
            document.execCommand('copy');
        },
        changeRname() {
             
            if (this.$refs.editrname.value.trim() !== "" && this.$refs.editrname.value.length >= 3) {
                this.rname = true;
              
                this.reciever_name= '';
                this.Submitt();
            } else {
                this.$refs.editrname.value = '';
                this.Submitt();
            }
        },

        changeBackRname(){
            this.rname = false
            setTimeout(function () {
                document.getElementById('edit-rname').focus();
            }, 200)
        },

        rnameCheckLength(){
            //  var letters = /^[A-Za-z]+$/;
            if (this.$refs.editrname.value.length > 15){
                this.$refs.editrname.value = this.$refs.editrname.value.substring(0, 15)
            }else{
                this.Submitt();
            }
        },

        doneMessage(){
            if (this.$refs.mssg.value.trim() !== "" && this.$refs.mssg.value.length <= 150) {
                this.msg = false;
                this.message.value = this.$refs.mssg.value;
                this.default_msg = ''
                this.Submitt();
            } else {
                this.$refs.mssg.value = ''
                this.Submitt();
            }
        },

        checkMsgLength(){
            if (this.$refs.mssg.value.length >= 150)
                this.$refs.mssg.value = this.$refs.mssg.value.substring(0, 150)
        },

        WriteMessage(){
            this.msg = true
            setTimeout(function () {
                document.getElementById('textMessage').focus();
            }, 200)
        },

        changeColor(){
            if (this.$refs.msgColor.value !== "")
                this.textColor = 'color:' + this.$refs.msgColor.value
            else
                this.textColor = 'color:black'
        },
        saveName(){
            if (this.$refs.writeName.value.trim() !== "" && this.$refs.writeName.value.length >= 3) {
                this.editor = true;
                this.user_name = '';
                this.Submitt();
            } else {
                this.$refs.writeName.value = ''
                this.Submitt();
            }
        },
        writernameLength(){
            if (this.$refs.writeName.value.length > 15) {
                this.$refs.writeName.value = this.$refs.writeName.value.substring(0, 15)
            }else{
                this.Submitt();
            }
        },
        editName(){

            this.editor = false
            setTimeout(function () {
                document.getElementById('editName').focus();
            }, 200)
        },

        Submitt(){
            if (this.receverName.length >= 3  && this.editorName.length >= 3) {
                this.$refs.submitBtn.disabled = false
            }else {
                this.$refs.submitBtn.disabled = true;
            }
        },



        SubmitData(){
       
            this.$refs.submitBtn.disabled = true;
            this.$refs.submitBtn.innerHTML = '<img style="width: 20px; " src="assets/pic/loader.gif">';
            var thiss=this;
            var ajax = new XMLHttpRequest();
            var formdata = new FormData();
            formdata.append('receiver_name', this.receverName);
            formdata.append('message', this.message);
            formdata.append('name', this.editorName); 
            formdata.append('id',this.selected_ecard);
            formdata.append('color', this.$refs.msgColor.value);
            formdata.append('ecard_name', this.$refs.ecard_name.value);
            formdata.append('_token', document.getElementsByName('_token').item(0).value);
            ajax.addEventListener("load", function (event) {
                thiss.url = 'whatsapp://send?text=😊 '+ thiss.editorName +' made a card gift for you! %0A %0A *Click here to view it*.⤵ %0A https://freecardgift.com/' + event.target.responseText
                thiss.getLink = true;
                document.getElementById("saveBtn").innerHTML = "Done";
                thiss.linkDisplay = event.target.responseText;
                setTimeout(function(){thiss.$refs.Dlink.value = "freecardgift.com/" + event.target.responseText},100);
                document.getElementById('linkDisplay2').value = "freecardgift.com/" + event.target.responseText;
                
                
                
            }, false);
            ajax.open("POST", "../../submitCard", true);
            ajax.send(formdata);
        },
        
        updatelink(){
            alert('done');
        },

        changeBgImage(imageName,id){
     
            this.$refs.spinner.style.display="block";
            this.selected_ecard =  id
            this.image_name =  "images/"+ imageName
            if(this.iconName !== imageName)
                document.getElementById(imageName).style.border = "2px solid #92d0ec"
                document.getElementById(this.iconName).style.border = "1px solid silver"
                this.iconName = imageName
                
                        var thiss= this
                       var img = document.querySelector('#loading_image').addEventListener('load', function(){
                           thiss.$refs.spinner.style.display= "none";
                       })


      }

        
       
    },
    mounted(){
        this.reciever_name = this.$refs.recever_name.value;
        this.default_msg =  this.$refs.default_msg.value;
        this.user_name =  this.$refs.user_name.value;
        /*this.reciever_name =this.$refs.recever_name.value;*/
        this.message =   this.$refs.default_msg.value;
        this.selected_ecard =  this.$refs.selected_card_id.value
        var ajax = new XMLHttpRequest();
         ajax.open("GET", '../../GetFirstImage/' + this.$refs.ecard_name.value);
         ajax.setRequestHeader("Content-type", "Application-x-www-form-urlencoded");
         ajax.onreadystatechange = function () {
         if (ajax.status === 200 && ajax.readyState === 4) {
             vueInstance.image_name = "images/"+ajax.responseText;
             vueInstance.iconName = ajax.responseText;
             document.getElementById(vueInstance.iconName).style.border = "2px solid #92d0ec"
         }
         }
         ajax.send(null)

    },
    
     updated:{
            image_name:function(val){
               // this.$refs.spinner.style.display="none";
              // alert(val)
            }
        }
});
document.getElementById('edit-rname').focus();

