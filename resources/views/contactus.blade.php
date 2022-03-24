<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon-16x16.png" type="image/x-icon">

    <meta property="og:image:height" content="261">
    <meta property="og:image:width" content="498">
    <meta property="og:title" content="Get your Free card gift now">
    <meta property="og:description" content="Personalize our animated cards and send them as Gif.">
    <meta property="og:image" content="images/og-image.jpg">
    <meta property="og:url" content="www.FreeCardGift.com">
      <!--<meta name="theme-color" content="rgb(58,182,239)">-->
    <meta name="description" content="If you have any queries, feedback, or suggestions please don't
hesitate to contact us.">

    <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
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
    <title>Contactus | FreeCardGift</title>
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
                        <a href="../../../../../" class="navbar-logo">
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

<section class="mbr-section mbr-after-navbar" id="form1-2s" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 120px;">
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2">CONTACT US</h3>
                    <small class="mbr-section-subtitle">Talk to us, if you have suggestions or w/e.</small>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">
                    @if( session()->has('contact-success') )<div class="alert" style="background: #6dc6ef; color: white">
                        <strong>Thanks for contacting us !</strong> We will be in touch with you shortly.
                    </div>@else @endif
                    <form action="../../../../../contactus" method="post" data-form-title="CONTACT FORM">
                        {{ csrf_field() }}
                        <div class="row row-sm-offset">

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-2s-name">Name<span class="form-asterisk">*</span></label>
                                    <input type="text" class="form-control" style="border: 1px solid #6dc6ef;" name="nameza" required="" data-form-field="Name" id="form1-2s-name">
                                    @if($errors->has('nameza'))<p style="color: red">{{$errors->first('nameza')}}</p> @else <br> @endif
                                </div>
                            </div>
                                 <iput type="hidden" name="name" />
                                 
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-2s-email">Email<span class="form-asterisk">*</span></label>
                                    <input type="email" class="form-control" style="border: 1px solid #6dc6ef;" name="email" required="" data-form-field="Email" id="form1-2s-email">
                                    @if($errors->has('email'))<p style="color: red">{{$errors->first('email')}}</p> @else <br> @endif
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="form1-2s-message">Message</label>
                            <textarea class="form-control"   style="border: 1px solid #6dc6ef; max-width: 600px; height: 200px; min-height: 200px; max-height: 200px" name="message" rows="7" data-form-field="Message" id="form1-2s-message"></textarea>
                            @if($errors->has('message'))<p style="color: red">{{$errors->first('message')}}</p> @else <br> @endif
                        </div>
                        <div><button type="submit" class="btn btn-info">SEND <i class="fas fa-paper-plane"></i></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<p align="center"><a style="color:#92d0ec;font-weight: bold;font-size:20px"  href="../../app">Download Our App</a></p>
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