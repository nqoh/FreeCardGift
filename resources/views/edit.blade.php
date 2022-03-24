<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon-16x16.png" type="image/x-icon">

    <meta property="og:image:height" content="261">
    <meta property="og:image:width" content="498">
    <meta property="og:title" content="Get your Free card gift now">
    <meta property="og:description" content="Personalize our animated cards and send them as Gif.">
    <meta property="og:image" content="images/og-image.jpg">
    <meta property="og:url" content="www.FreeCardGift.com">

    <meta name="description" content="Welcome to free card gift where you choose an animation or gif,
to personalize and share with your friend. View love animations, morning messages, and more.">

     <!--<meta name="theme-color" content="rgb(58,182,239)">-->
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="google" content="sitelinkssearchbox" />

    <meta name="keywords" content="Good morning, i love you, happy valentine, i miss you,
 free card, gift card, welcome animations, gif images, love messages, well wishes, goodnight, happy hoiday" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/css/additional.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script type="text/javascript" src="../js/vue.js"></script>
    <script data-ad-client="ca-pub-2426748318484723" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <title>{{ $ecards->slug }} | FreeCardGift</title>
</head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133388717-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-133388717-1');
</script>

<body>

<section id="menu-0" >
    <nav class="navbar navbar-dropdown navbar-fixed-top " style="height: 75px;background: #6dc6ef">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="../../../../" class="navbar-logo">
                            <img src="images/logoRg.png" style="margin-top: -30px">
                        </a>
                        <a class="navbar-caption" style="margin-top: 10px; font-size: 20px" href="../../../">FreeCardGift<br><br></a>
                    </div>
                </div>
                <div class="mbr-table-cell">
                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>
                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item"><a class="nav-link link" href="../../../"><i class="fas fa-home"></i> HOME</a></li><li class="nav-item"><a class="nav-link link" href="../../../aboutus"><i class="fas fa-rotate fa-info-circle"></i> ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link link" href="../../../app"> DOWNLOAD APP</a></li>
                        <li class="nav-item"><a class="nav-link link" href="../../../contactus"><i class="fas  faa-horizontal animated animated-hover  fa-envelope"></i> CONTACT US</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>
                </div>
            </div>

        </div>
    </nav>
</section>

<section class="mbr-section mbr-section__container article mbr-after-navbar" id="header3-34" style="align:center" align="center">
    <div class="container" >
        <div class="row">
            <div class="col-xs-12">
                <h6 class="mbr-section-title display-2" style="color:#535353;font-size: 4vmin">Edit and send {{ $ecards->slug }} eCard</h6>
                <!--<small class="mbr-section-subtitle">Choose eCard template, color text of your choice and share it via a link or download.</small>-->
            </div>
        </div>
    </div>
</section>

<div id="app">

    <div class="container">
        <div class="row">

            <div class="mbr-table-md-up">
                <div  class="mbr-table-cell col-md-5 text-xs-center text-md-right content-size">

        <div class="mbr-table-cell mbr-left-padding-md-up mbr-valign-top col-md-7 image-size" align="center" style=" margin: 0px auto">
         
           <!--<small class=""  style="text-align: left"><h5 style="margin-left:10%"><b>Enter Reciever name, Your name and click on message.</b></h5></small>-->
         
           <!-- <small class=""  style="text-align: left"><h4 style="margin-left:10%"><b>Click {{ $usercard->reciever_name }}, Message and {{ $usercard->name }} to edit.</b></h4></small>-->
            <div  class="mbr-figure" id="card-container">

                        <p class="mbr-figure  RNameDisplay" title="Click to edit" @click="changeBackRname()" v-if="rname" id="{{$card_name}}">@{{ reciever_name }}@{{ receverName.charAt(0).toUpperCase() + receverName.substring(1,receverName.length).toLowerCase() }} </p>

                        <span  class="mbr-figure" id="spna-edit-rname"  v-else="!rname">
                            <input type="text"  style="border: 1px solid #6dc6ef;" class="form-control"   @blur="changeRname()" @keyup="rnameCheckLength()" v-model="receverName" id="edit-rname" ref="editrname" placeholder="Receiver name">
                        </span>
                            <input type="hidden" value="{{ $usercard->reciever_name }}" ref="recever_name">
                            <input type="hidden" value="{{ $usercard->message }}" ref="default_msg">
                            <input type="hidden" value="{{ $usercard->name }}" ref="user_name">

                       <p class="mbr-figure messageDisplay"  :style="textColor"  title="Click to edit" @click='WriteMessage()'   v-if="!msg" >
                             <i>@{{ message }}</i>
                        </p>

                        <span class="mbr-figure textAreaSpan" v-else="msg">
                           <textarea  style="border: 1px solid #6dc6ef;"  @blur="doneMessage()" @keyup="checkMsgLength()"  ref='mssg' id='textMessage' v-model="message"  placeholder="Your message" class="form-control textArea" style="opacity: 2;" >@{{ message }}</textarea>
                        </span>

                        <p class="mbr-figure editorName" @click='editName()' v-if="editor">@{{ user_name  }} @{{ editorName.charAt(0).toUpperCase() + editorName.substring(1,editorName.length).toLowerCase() }} </p>

                        <span class="mbr-figure txtEditorName" v-else="!editor" >
                            <input type="text" style="border: 1px solid #6dc6ef;" value="nqawakhe" @keyup='writernameLength()' id='editName' class="form-control editortxt" v-model="editorName" @blur="saveName()" ref='writeName' placeholder="Your name">
                        </span>

                               {{ csrf_field() }}
                               
                               


                          <div style="z-index: 5"><img :src="image_name" id="loading_image"> <div class="edit_image_cover">
        
                  <div class="lds-roller" ref="spinner" id="spinner"  style="display:none"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                              
                          </div></div>
                                <input type="hidden" value="{{ $ecards->ecard_name }}"  id="ecard_name" ref="ecard_name">
                        </div>
                       

            <div class="mbr-figure messageColor" align="center">
            <select class="form-control" ref='msgColor' @change='changeColor()' style="  float: left; margin-right: 2%  ">
                <option value="Black">Change message color</option>
                <option value="Pink">Pink</option>
                <option value="Black">Black</option>
                <option value="Red">Red</option>
                <option value="Purple">Purple</option>
                <option value="Violet">Violet</option>
                <option value="Grey">Grey</option>
                <option value="Blue">Blue</option>

            </select>

                <div class="mbr-figure image-contain" style="height: auto;width:100%">
                    <input type="hidden" ref="selected_card_id"  value="{{$selected_card_id->id}}">
                    @foreach($images as $image)
                    <div  id="{{ $image->image }}" @click="changeBgImage('{{ $image->image }}','{{ $image->id }}')">
                        <img   src="images/{{ $image->IconImage }}"></div>
                    @endforeach
                </div> <br> <br> <br> <br> <br> <br><br><br>

                <button  ref="submitBtn" id="saveBtn" @click="SubmitData()" style="outline: none; margin-top:1%" class="btn btn-info"  disabled >Done <i class="fas fa-check"></i></button>
            <p align="center"><a style="color:#92d0ec;font-weight: bold;font-size:20px"  href="../../app">Download Our App</a></p>

                <div  style="clear: both; " v-if="getLink">
                   
                    <form method="post" action="../../download.php"> 
                    <button   id="saveBtn" style=" outline: none; margin-top:1%;  margin-left:-15%;" class="btn btn-info" >Download <i class="fas fa-download"></i></button>
                    <input type="hidden" name="image_name" :value="linkDisplay">
                      {{ csrf_field() }}
                    </form>
                    
                    <div>
                    <p style="color: rgb(161,198,217); float: left"><b>Copy and paste this link to @{{ receverName.charAt(0).toUpperCase() + receverName.substring(1,receverName.length).toLowerCase() }} contact</b></p>

                        <div style=" clear: both; height: auto">
                         <input type="text" ref="Dlink"  value='' id="linkDisplay2" style="float: left; outline: none; width: 80%"  >
                         <button class="btn"  @click="copyLink()" style="padding: 5px; outline: none; cursor: pointer">Copy</button>
                        </div>
                       
                        <p style="color: rgb(161,198,217); float: left; "><b>Or Share on :</b></p>
                            <a :href="url"><img  style="width: 100px; float: left; margin-left: 2%" src="images/download.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>

                    </div>

                    </div>
                   <br>

                <p style="margin-left:10%">Having difficulties editing your eCard? Try our <a href="https://m.freecardgift.com">lite mobile version</a></p>
                <p style="margin-left:10%">Also see - <a href="{{ $link1->ecard_name }}">{{ $link1->slug }}</a> - <a href="{{ $link2->ecard_name }}">{{ $link2->slug }}</a> - <a href="{{ $link3->ecard_name }}">{{ $link3->slug }}</a>  </p>
                
                <p style="margin-left:10%"><b>Tips:</b></p>
                <p style="margin-left:10%">To edit your eCard you first need to click on the name of the Receiver, and add the name of the
                  person you’re sending to, as well as click on the name of the Sender to add your name, you can
                    change/edit the message or leave it as is.</p>
                    <p style="margin-left:10%">Press done when you finish, a link will be generated to copy and share anywhere, any social media. A
download link will be available to download your completed eCard as a .gif (Graphics Interchange
Format).</p><p style="margin-left:10%">Receivers name and Senders name are 15 characters long</p>
<p style="margin-left:10%">Message should not exceed 150 characters.</p>
<p style="margin-left:10%">To report errors <a href="../../../contactus">contact us</a></p>
                </div>

 
            </div>
        </div>
<p align="center"><a style="color:#92d0ec;font-weight: bold;font-size:20px"  href="../../app">Download Our App</a></p>
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-8" style="background: #6dc6ef; padding-top: 1.75rem; padding-bottom: 1.75rem;">
    <div class="container">
        <p class="text-xs-center">Copyright (c) <?php echo date('Y') ?> freecardgift <strong>&nbsp;<a href="../../terms">TERMS OF USE</a></strong></p>
        <p class="text-xs-center">Follow us on:&nbsp; &nbsp; <a href="https://twitter.com/free_card_gift" id="twiteer"><i class="fab fa-twitter-square fa-2x"></i></a>&nbsp; &nbsp;<a href="https://www.facebook.com/Freecardgift-352453348687377" id="fb"><i class="fab fa-facebook fa-2x"></i></a></p>
        <p class="text-xs-center" >All rights reserved, Trademarks are properties of their respective owners.</p>
         <p class="text-xs-center" >Made with love at&nbsp;<a href="https://shawod.co.za"><strong>Shawod.</strong></a></p>
    </div>
</footer>


<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
<script src="assets/theme/js/script.js"></script>
<script type="text/javascript" src="../js/appjs.js"></script>

</body>
</html>