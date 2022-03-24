<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon-16x16.png" type="image/x-icon">
    <meta property="og:image:height" content="261">
    <meta property="og:image:width" content="498">
    <meta property="og:title" content="Get your Free card gift now">
    
    <meta property="og:description" content="Personalize our animated greeting cards for free and shre via whatsapp or any other social media.">
    
    <meta property="og:image" content="https://www.freecardgift.com/images/og-image.jpg">
    <meta property="og:url" content="https://www.freecardgift.com">
    
    <meta name="description" content="Welcome to FreeCardGift Personalize our animated greetings cards and share with your friends.View birday card , love eCard,and more.">
    
    <!-- <meta name="theme-color" content="rgb(58,182,239)">-->
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="google" content="sitelinkssearchbox" />
    <meta name="keywords" content="Good morning, i love you, happy valentine, i miss you, greeting cards,free ecards,birthday cards,happy friendship day card,free birthday cards
 free card, gift card, welcome animations, gif images, love messages, well wishes, goodnight, happy hoiday" />
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/theme/css/style.css">
    <link rel="stylesheet" href="../assets/css/additional.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script data-ad-client="ca-pub-2426748318484723" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <title>Home | FreeCardGift</title>
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
                        <a href="" class="navbar-logo">
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


<section class="mbr-section mbr-section__container article mbr-after-navbar" id="header3-2u" style="background-color: rgb(255, 255, 255); padding-top: 105px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                 <h3 class="glow mbr-section-title display-2">FreeCardGift</h3><br>
                <small class="mbr-section-subtitle" style="margin-top: 14px">Welcome to FreeCardGift, send your loved ones an animated greeting cards for free via whatsapp or any other social media.<br>choose your template below and customize it.</small>
            </div>
        </div>
    </div>
</section>

<section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-3" style="background-color: rgb(255, 255, 255);">
    <?php  $i = 0;  $section1=''; $section2=''; ?>
        @foreach($ecards as $ecard)
           @if($i < 4)
              <?php
              $section1 .='<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 10px; padding-bottom: 40px;">
                <div class="container">
                    <div class="card cart-block">
                        <div class="card-img displayImage" ><a href="'.$ecard->ecard_name.'"><img src="images/'.$ecard->image.'" class="card-img-top"><div class="card-img hide-image"></div></a></div>
                        <div class="card-block">
                            <h4 class="card-title"><span style="color: #535353; font-size: 1.25rem; line-height: 1.2825;">'.$ecard->title.'</span><br></h4>

                            <p class="card-text" style="color: darkgray">'.$ecard->description.'</p>
                            <div class="card-btn"><a href="'.$ecard->ecard_name.'" class="btn btn-info">EDIT ME <i class="fas fa-pencil-alt"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>';
              $i++;
              ?>
            @else
                 <?php
                 $section2 .='<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 40px; padding-bottom: 40px;">
                       <div class="container">
                           <div class="card cart-block">
                               <div class="card-img displayImage" style="border: 1px solid #92d0ec ;"><a  href="'.$ecard->ecard_name.'" ><img  src="images/'.$ecard->image.'" class="card-img-top" ><div class="card-img hide-image"></div></a></div>
                               <div class="card-block">
                                   <h4 class="card-title"><span style="color: #535353;; font-size: 1.25rem; line-height: 1.2825;">'.$ecard->title.'</span><br></h4>

                                   <p class="card-text" style="color: darkgray">'. $ecard->description  .'</p>
                                   <div class="card-btn"><a href="'.$ecard->ecard_name.'" class="btn btn-info">EDIT ME <i class="fas fa-pencil-alt"></i></a></div>
                               </div>
                           </div>
                       </div>
                   </div>';
                     $i++;
                    ?>
             @endif

        @endforeach
            <div class="mbr-cards-row row">
                <?php echo $section1;  ?>
             </div>
            <div class="mbr-cards-row row">
                <?php echo $section2;  ?>
            </div>
</section>
<p align="center"><a style="color:#92d0ec;font-weight: bold;font-size:20px"  href="../../app">Download Our App</a></p>
<section class="mbr-section mbr-section__container" id="buttons1-1s" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-xs-center">
                    @if($ecards !=='')
                        @if($ecards->lastPage() != 1)
                            <br>
                            @if($ecards->currentPage() > 1)
                                <a class="btn btn-black" style="background: white;color:black" href="{{$ecards->previousPageUrl()}}">
                                    <span class="mbri-arrow-prev mbr-iconfont mbr-iconfont-btn"></span>PREVIOUS</a>
                            @endif
                            @if($ecards->currentPage()!== $ecards->lastPage())
                                <a class="btn btn-black" style="background: white;color:black"  href="{{$ecards->nextPageUrl()}}">
                                    NEXT <span class="mbri-arrow-next mbr-iconfont mbr-iconfont-btn"></span></a>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-8" style="background: #6dc6ef; padding-top: 1.75rem; padding-bottom: 1.75rem;">
    <div class="container">
        <p class="text-xs-center">Copyright (c) <?php echo date('Y') ?> freecardgift <strong>&nbsp;<a href="../../terms">TERMS OF USE</a></strong></p>
        <p class="text-xs-center">Follow us on:&nbsp; &nbsp; <a href="https://twitter.com/free_card_gift" id="twiteer"><i class="fab fa-twitter-square fa-2x"></i></a>&nbsp; &nbsp;<a href="https://www.facebook.com/Freecardgift-352453348687377" id="fb"><i class="fab fa-facebook fa-2x"></i></a></p>
        <p class="text-xs-center" >All rights reserved, Trademarks are properties of their respective owners.</p>
         <p class="text-xs-center" >Made with love at&nbsp;<a href="https://shawod.co.za"><strong>Shawod.</strong></a></p>
    </div>
</footer>

<script src="../assets/web/assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/dropdown/js/script.min.js"></script>
</body>
</html>