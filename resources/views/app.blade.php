<?php


if(strstr($_SERVER['HTTP_USER_AGENT'],'Opera Mini') || strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini')){
    header('Location: https://m.freecardgift.com');
    exit();
}


if(preg_match('/(opera mini|Opera Mini|Opera Mobi|opera mobi|android.+opera m(ob|in)i)/i', strtolower($_SERVER['HTTP_USER_AGENT']))){
    header('Location: https://m.freecardgift.com');
    exit();
}

?>

        <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../images/favicon-16x16.png" type="image/x-icon">
    <meta property="og:image:height" content="261">
    <meta property="og:image:width" content="498">
    <meta property="og:title" content="Get your Free card gift now">
    <meta property="og:description" content="Personalize our animated cards and send them as Gif.">
    <meta property="og:image" content="images/og-image.jpg">
    <meta property="og:url" content="www.FreeCardGift.com">
    <meta name="description" content="Welcome to free card gift where you choose an animation or gif,
to personalize and share with your friend. View love animations, morning messages, and more.">
    <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="google" content="sitelinkssearchbox" />
    <meta name="keywords" content="Good morning, i love you, happy valentine, i miss you,
 free card, gift card, welcome animations, gif images, love messages, well wishes, goodnight, happy hoiday" />
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../../assets/theme/css/style.css">
    <link rel="stylesheet" href="../../assets/css/additional.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script type="text/javascript" src="../../js/vue.js"></script>
    <title>App | FreeCardGift</title>
</head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133388717-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-133388717-1');
</script>
<style>
    .btn {
        box-sizing: border-box;
        appearance: none;
        background-color: transparent;
        border: 2px solid #6dc6ef;
        border-radius: 0.6em;
        color: #6dc6ef;
        cursor: pointer;
        display: flex;
        align-self: center;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1;
        margin: 20px;
        padding: 1.2em 2.8em;
        text-decoration: none;
        text-align: center;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;

    }
    .btn :hover, :focus {
        color: #6dc6ef;
        outline: 0;
    }
</style>
<body>

<section id="menu-0" >
    <nav class="navbar navbar-dropdown navbar-fixed-top " style="height: 75px;background: #6dc6ef">
        <div class="container">
            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="" class="navbar-logo">
                            <img src="../images/logoRg.png" style="margin-top: -30px">
                        </a>
                        <a class="navbar-caption" style="margin-top: 10px; font-size: 20px" href="../../../">FreeCardGift<br><br></a>
                    </div>
                </div>
                <div class="mbr-table-cell">
                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>
                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item"><a class="nav-link link" href="../../../"><i class="fas fa-home"></i> HOME</a></li>
                        <li class="nav-item"><a class="nav-link link" href="../../../app"> DOWNLOAD APP</a></li>
                        <li class="nav-item"><a class="nav-link link" href="../../../aboutus"><i class="fas fa-rotate fa-info-circle"></i> ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link link" href="../../../contactus"><i class="fas  faa-horizontal animated animated-hover  fa-envelope"></i> CONTACT US</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</section>

<section class="mbr-section mbr-section__container article mbr-after-navbar" id="header3-2u" style="background-color: rgb(255, 255, 255); padding-top: 105px; padding-bottom: 0px; ">
    <div align="center">
       <!-- <form method="post" action="../../appD.php" >
            {{ csrf_field() }}
            <input type="hidden" name="app_name" value="fcg-app">
           <button ><img src="../images/22234sm.png"></button>
        </form>-->
        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.freecardgift.app"><img src="../images/22234sm.png" width="140px"></a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a target="_blank" href="https://www.amazon.com/dp/B08XQK6GXZ/ref=sr_1_1?dchild=1&keywords=freecardgift&qid=1614670145&sr=8-1"><img src="../images/222234sm.png" width="150px"></a>
    </div>
    <div align="center">
        <small class="mbr-section-subtitle" style="margin-top: 14px">Screenshots of the FreeCardGift App (version 1.0.4)</small>
        </div>
    <div class="mbr-cards-row row" style="width: 100%">
    <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 10px; padding-bottom: 40px;">
        <div class="container">
            <div class="card cart-block">
                <div class="card-img displayImage" align="center"><img src="../images/welcome.png" class="card-img-top" style="width: 100%"></div>
             
            </div>
        </div>
    </div>

    <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 40px; padding-bottom: 40px;">
        <div class="container">
            <div class="card cart-block">
                <div class="card-img displayImage" align="center"><img src="../images/signup.png" style="width: 100%;"></div>
              
            </div>
        </div>
    </div>
        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img displayImage" align="center"><img src="../images/home.png" style="width: 100%" class="card-img-top"><div class="card-img hide-image"></div></div>
                   
                </div>
            </div>
        </div>


    <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img displayImage" align="center"><img src="../images/Edit.png" style="width: 100%" class="card-img-top"><div class="card-img hide-image"></div></div>
                   
                </div>
            </div>
        </div>

    </div>


    <div class="mbr-cards-row row" style="width: 100%">
        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img displayImage" align="center"><img src="../images/sendTo.png" class="card-img-top" style="width: 100%"></div>
                  
                </div>
            </div>
        </div>

        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 40px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img displayImage" align="center"><img src="../images/favorites.png" style="width: 100%; height: 100%"></div>
                   
                </div>
            </div>
        </div>

        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img displayImage" align="center"><img src="../images/view.gif" style="width: 100%" class="card-img-top"><div class="card-img hide-image"></div></div>
                    
                </div>
            </div>
        </div>

        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 10px; padding-bottom: 40px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img displayImage" align="center"><img src="../images/settings.png" style="width: 100%" class="card-img-top"><div class="card-img hide-image"></div></div>
                
                </div>
            </div>
        </div>

    </div>

    <h1 align="center">Minimum requirements</h1>
<div align="center">
        <p>Ram : 512 </p>
        <p>Network : 3G </p>
        <p>App size: 49.9 MB </p>
        <p>Operating System: Android 5.0+</p>
</div>
    <div align="center">
        <div class="mbr-cards-row row" style="margin-top: -70px;">
            <div class="mbr-cards-col col-xs-12 col-lg-3">
        <form method="post" action="../../appD.php" >
            {{ csrf_field() }}
            <input type="hidden" name="app_name" value="fcg-app">
    <p>Full Apk&nbsp;&nbsp;&nbsp;49.9 MB <button class="btn">Download</button></p>
        </form>
            </div>
            <div class="mbr-cards-col col-xs-12 col-lg-3">
        <form method="post" action="../../appD.php" >
            {{ csrf_field() }}
            <input type="hidden" name="app_name" value="x86_64-fcg-app">
    <p>x86_64-apk &nbsp;&nbsp;&nbsp; 50.3 MB  <button class="btn">Download</button></p>
        </form>
            </div>
            <div class="mbr-cards-col col-xs-12 col-lg-3">
        <form method="post" action="../../appD.php" >
          <input type="hidden" name="app_name" value="arm64-v8a-fcg-app">
            {{ csrf_field() }}
    <p>arm64-v8a-apk&nbsp;&nbsp;&nbsp;50.2 MB <button class="btn">Download</button> </p>
        </form></div> <div class="mbr-cards-col col-xs-12 col-lg-3">
        <form method="post" action="../../appD.php" >
            <input type="hidden" name="app_name" value="armeabi-v7a-fcg-app">
            {{ csrf_field() }}
    <p>armeabi-v7a-apk&nbsp;&nbsp;&nbsp; 49.9 MB <button class="btn">Download</button></p>
        </form></div>
        </div>
    </div>
  
</section>
<!-- <p align="center"><a style="color:#92d0ec;font-weight: bold;font-size:20px" target="_blank" href="https://www.amazon.com/dp/B08XQK6GXZ/ref=sr_1_1?dchild=1&keywords=freecardgift&qid=1614670145&sr=8-1">Download From Amazon AppStore</a></p>-->
{{--<div align="center"><small class="mbr-section-subtitle" style="margin-top: 14px" >PlayStore link : Pending...</small></div>--}}

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-8" style="background: #6dc6ef; padding-top: 1.75rem; padding-bottom: 1.75rem;">
    <div class="container">
        <p class="text-xs-center">Copyright (c) 2019 freecardgift <strong>&nbsp;<a href="../../../terms">TERMS OF USE</a></strong></p>
        <p class="text-xs-center">Follow us on:&nbsp; &nbsp; <a href="https://twitter.com/free_card_gift" id="twiteer"><i class="fab fa-twitter-square fa-2x"></i></a>&nbsp; &nbsp;<a href="https://www.facebook.com/Freecardgift-352453348687377" id="fb"><i class="fab fa-facebook fa-2x"></i></a></p>
        <p class="text-xs-center" >All rights reserved, Trademarks are properties of their respective owners.</p>
    </div>
</footer>

</body>

</html>