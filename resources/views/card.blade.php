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

   <!-- <meta name="theme-color" content="rgb(58,182,239)">-->
    
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex,nofollow" />
    <meta name="google" content="sitelinkssearchbox" />

    <meta name="keywords" content="Good morning, i love you, happy valentine, i miss you,
 free card, gift card, welcome animations, gif images, love messages, well wishes, goodnight, happy hoiday" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/css/additional.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <script data-ad-client="ca-pub-2426748318484723" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php $card_container ='card_container';$style='style="padding-top: 30px; padding-bottom: 0px;"'?>
    @if($ecard_name->ecard_name ==='Christmas')
        <?php $card_container ='' ; $style='style="padding-top: 0px; padding-bottom: 0px;"'?>
            <link rel="stylesheet" href="../css/style.css">
    @endif

    @if($ecard_name->ecard_name ==='NewYear')
        <?php $card_container =''; $style='style="padding-top: 30px; padding-bottom: 0px;"'?>
            <link rel="stylesheet" href="../css/style2.css">
    @endif

    @if($ecard_name->ecard_name ==='Birthday')
        <?php $card_container =''; $style='style="padding-top: 0px; padding-bottom: 0px;"'?>
        <link rel="stylesheet" href="../css/style3.css">
    @endif
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script type="text/javascript" src="../js/vue.js"></script>
    <title>{{ $ecard_name->name }} | FreeCardGift</title>
 
</head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133388717-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-133388717-1');
</script>
<body >
{{--<span style="color:white">{{$ecard_name->ecard_name}} {{ $ecard_name-> ecard_code }}</span>--}}
@if($ecard_name->ecard_name === 'NewYear' || $ecard_name->ecard_name ==='Christmas')
<canvas id="canvas" style="position: absolute"></canvas>
@endif
@if($sound != '')
<div style="width: 40px; margin: 0px auto;position:relative;z-index:100" align="center" id="player">
    <i class="fa fa-play-circle" style="font-size:30px; color: #6dc6ef; cursor: pointer" onclick="music()"></i>
</div>
@endif
@if($ecard_name->ecard_name ==='Birthday')
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<bokeh></bokeh>
<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>
@endif
<section id="unicorn" class="mbr-section <?php echo $card_container ?>"  <?php echo $style; ?>  >

    @if($ecard_name->ecard_name ==='Christmas')
    <div class="message" > Merry Christmas {{ $ecard_name->receiver_name }}</div>
    @endif
    @if($ecard_name->ecard_name ==='NewYear')
       <div class="message" > Happy New Year {{ $ecard_name->receiver_name }}</div>
    @endif
    @if($ecard_name->ecard_name ==='Birthday')
      <div class="message" > {{ $ecard_name->receiver_name }}'s Birthday </div>
   @endif
    <div class="container">
         <p align="center">
             <a  target="_blank" href="https://play.google.com/store/apps/details?id=com.freecardgift.app"><img src="../images/playstore-badge.png" width="140px"></a>
             </p>
        <div class="row">
            <div class="mbr-table-md-up">
                <div  class="mbr-table-cell col-md-5 text-xs-center text-md-right content-size" >
                    <div class="mbr-table-cell mbr-left-padding-md-up mbr-valign-top col-md-7 image-size" align="center" style=" margin: 0px auto;">
                        <div  class="mbr-figure " align="center" style="border:none;margin: 0 auto; max-height: 450px; max-width: 600px;z-index: 100; ">
                            <div style="border: 1px solid #6dc6ef;"><img src="saved_images/{{ $ecard_name-> ecard_code }}.gif" class="shake" style=""><div  class="edit_image_cover"></div></div>
                        </div>
                        </div>
                     <br>
                </div>
            </div>

        </div>
    </div>
        @if($ecard_name->ecard_name !== 'NewYear' && $ecard_name->ecard_name !=='Christmas' )
    <div align="center" style="margin: 0px auto;">
        <p style="text-align: center;">Reply with <a href="../../../ThankYou"><b>Thank you</b></a> or <a href="../../../"><b>Choose</b></a> yours now.</p>
    </div>
        @else
            <div align="center" style="margin: 0px auto; font-style: normal;position:relative;z-index:100">
                <p style="text-align: center; font-style: normal;" ><span style="color: #6dc6ef">Reply with</span>  <a href="../../../ThankYou"><b>Thank you</b></a><span style="color: #6dc6ef"> or </span><a href="../../../"><b>Choose</b></a><span style="color: #6dc6ef"> yours now.</span></p>
            </div>
        @endif

    <br>
    <div class="container">
        <div class="row" style="position:relative;z-index:100">
            <div class="col-xs-12">

                <div class="text-xs-center" >{{--<a  class="btn btn-info" href="../../">HOME</a>--}} <a class="btn btn-info" href="../../{{ $ecard_name->ecard_name }}">EDIT AND SEND</a>
                
                 <form method="post" action="../../download.php"> 
                    <button   class="btn btn-info" >Download</button>
                    <input type="hidden" name="image_name" value="{{ $ecard_name-> ecard_code }}">
                      {{ csrf_field() }}
                    </form>
                </div>

            </div>
        </div>
    </div>
    <br>

    {{--<section class="mbr-section mbr-section__container article" id="header3-3b" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="container" align="center" style="width: 95%; margin: 0px auto"  >
            <div class="row">
                <div class="col-xs-12">
                    <a target="_blank" href="http://{{$ads1->url}}"><img  style=" width:75%;margin: 0px auto" align="center" src="images/{{$ads1->image}}"></a>
                </div>
            </div>
        </div>
    </section>--}}

</section>
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-8" style="background: #6dc6ef; padding-top: 1.75rem; padding-bottom: 1.75rem;">
    <div class="container">
        <p class="text-xs-center">Copyright (c) <?php echo date('Y') ?> freecardgift <strong>&nbsp;<a href="../../terms">TERMS OF USE</a></strong></p>
        <p class="text-xs-center">Follow us on:&nbsp; &nbsp; <a href="https://twitter.com/free_card_gift" id="twiteer"><i class="fab fa-twitter-square fa-2x"></i></a>&nbsp; &nbsp;<a href="https://www.facebook.com/Freecardgift-352453348687377" id="fb"><i class="fab fa-facebook fa-2x"></i></a></p>
        <p class="text-xs-center" >All rights reserved, Trademarks are properties of their respective owners.</p>
         <p class="text-xs-center" >Made with love at&nbsp;<a href="https://shawod.co.za"><strong>Shawod.</strong></a></p>
    </div>
</footer>
<script>
    var audio = new Audio()
    var track = '<?php if($sound != ''){echo  $sound->sound; }?>'
    audio.src = "../sounds/" + track;
    audio.loop = true
    audio.autoplay = true
    function music() {
        if(audio.paused) {
            player.innerHTML = '<i class="fa fa-pause-circle" onclick="music()" style="font-size:30px; color: #6dc6ef; cursor: pointer"></i>'
            audio.play();
        }else{
            player.innerHTML = '<i class="fa fa-play-circle" onclick="music()" style="font-size:30px; color: #6dc6ef; cursor: pointer"></i>'
            audio.pause();
        }
    }
    window.addEventListener('touchstart', function(){
        music();
    })
    
    window.addEventListener('click', function(){
        music();
    })
</script>



<script src="../assets/web/assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/dropdown/js/script.min.js"></script>


    @if($ecard_name->ecard_name ==='Christmas')
    <script  src="../../js/script.js"></script>
     @endif
    @if($ecard_name->ecard_name ==='NewYear')
    <script  src="../../js/script2.js"></script>
     @endif


</body>
</html>