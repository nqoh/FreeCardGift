<?php
$tablet_browser = 0;
$mobile_browser = 0;
$device='';
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
}

if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
}

if(strstr($_SERVER['HTTP_USER_AGENT'],'Opera Mini') || strstr($_SERVER['HTTP_USER_AGENT'],'Mobile')){
    $mobile_browser++;
}

if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
}

$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');

if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}

if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
        $tablet_browser++;
    }
}

if ($tablet_browser > 0) {
    // do something for tablet devices

    header('Location: https://mobi.olovamp3.com');
    exit();
}
else if ($mobile_browser > 0) {
    // do something for mobile devices

    header('Location: https://m.olovamp3.com');
    exit();
    //  header('location :http://m.olovamp3.com');
}
else {

    // do something for everything else

}

?>

        <!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Music | Olovamp3 </title>
    <meta name="og:description" content="Upload your Music Online for Free with OlovaMp3 and
	Share it with your friends on social networks, Music From all over">
    <meta property="og:image" content="thumbnails/logonje.jpg" />

    <meta name="description" content="Upload your Music Online for Free with OlovaMp3 and
	Share it with your friends on social networks, Music From all over">

    <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="google" content="sitelinkssearchbox" />
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <meta name="keywords" content="allovemp3, Mp3olova, Mp3allover, olovamp3, olova mp3, mp3 all over, Download, free, Mzansi, Umculo, Hip hop, underground, post music,
	Maskandi, Gospel, africa,mp3 olova, kwaito, SA, South Africa, latest, new, recent, house, igqomu, music,
	share music, upload, 2015, 2016, 2017" />

    <link rel="stylesheet" href="css/large.css" type="text/css">
    <script type="text/javascript" src="js/overlay.js"></script>
    <script type="text/javascript" src="js/drag_drop.js"></script>
    <script type="text/javascript" src="js/form_validation.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <link rel="shortcut icon"  href="{!! asset('thumbnails/favicon (4).ico')!!}">

    <link rel="stylesheet" href="css/awesomplete.css" />
    <script src="js/awesomplete.js"></script>

    <?php
    $conn=mysqli_connect("localhost","olovamp3_ngobese","Iamspam777") or die("fail");
    mysqli_select_db($conn,"olovamp3_nqoh") or die("database not found");
    ?>
</head>
@extends('footer.index')
<body bgcolor="#d19275">
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53925410-1', 'auto');
    ga('send', 'pageview');

</script>
<div  id="overlay" onclick="cancel_overlay()"></div>

<form action="register" method="POST" id="forms" style="height: 460px; ">
    <div id="close"  style="margin-left: 380px" onclick="cancel_overlay()"><b>X</b></div>
    {{csrf_field()}}
    <div>

        <div  style="margin-left: 140px;font-size: 28px;margin-bottom: 2px;color:#954b4b;"><b>Sign up</b></div>
        <label>Username :&nbsp;<span style="color: red">*</span></label>&nbsp;&nbsp;&nbsp;<span id="um" style="color: red"></span><br>
        <input type="text"  class="txt" placeholder="Username" name="username"   id="uname" onblur="username_validate()"  ><br>

        <label>Your email address :&nbsp;<span style="color: red">*</span></label><span id="eml" style="color: red"></span><br>
        <input type="text"  class="txt" placeholder="Email" name="Email"  id="email" onblur="mail_validate()"  ><br>

        <label>Password :&nbsp;<span style="color: red">*</span></label><span id="ps" style="color: red"></span><br>
        <input type="password" id="passwords" onblur="password_validate()" name="password"   class="txt" placeholder="Password" ><br>

        <label>Re-type password :&nbsp;<span style="color: red">*</span></label><span id="rps" style="color: red"></span><br>
        <input type="password" id="r_password" name="password_confirmation"  class="txt" placeholder="Re-type password" onblur="pass_re_validate()"  ><br>

        <label>Account type :&nbsp;<span style="color: red">*</span></label>
        <input type="radio" id="type1" name="account_type" onclick="a_type()" value="artist">Artist&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" id="type2" name="account_type" onclick="a_type()" value="fan">Fan<br>
        <span id="type" style="color: red"></span>
        <input type="button" id="btn" onclick="hide_me()" value="Submit"  disabled="disabled" >
        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red" id="f_error"></span>
    </div>
</form>
<div  id="login">
    <div id="close"  style="margin-left: 380px; margin-top: 0px" onclick="cancel_overlay()"><b>X</b></div>
    <div>
        <div  style="margin-left: 150px;font-size: 28px;color:#954b4b;"><b>Login</b></div>
        <span style="color: red" id="l_error"></span><br style="line-height:1">
        <label>Username :&nbsp;<span style="color: red">*</span></label>&nbsp;&nbsp;&nbsp;<br>
        <input type="text"  class="txt"  placeholder="Username" name="username" value="{{ old('username') }}"  id="s_names"  ><br>
        <label>Password :&nbsp;<span style="color: red">*</span></label><br>
        <input type="password" id="password" onkeydown="login_sub(event)" class="txt" name="password" placeholder="Password"  ><br>
        <button id="btn" onclick="logins()">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" value="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember me &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="font-size: 15px; color:rgb(149,75,75); cursor:pointer" onclick="forgot_password()">Forgot password</span>
    </div>
</div>
<div  id="reset">
    <div id="close"  style="margin-left: 380px; margin-top: 0px" onclick="cancel_overlay()"><b>X</b></div>
    <div>
        <div  style="margin-left: 75px;font-size: 28px;color:#954b4b;"><b>Reset password</b></div>
        <br style="line-height: .2">
        <label>Email :&nbsp;<span style="color: red">*</span></label>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red" id="mail_error"></span>
        <span style="color: green" id="check_email"></span><br>
        {{csrf_field()}}
        <input type="text"  class="txt" onkeydown="reset_sub(event)"   placeholder="Enter registered email address" id="recover_email"    ><br>
        <button id="btn" onclick="reset()">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>

<div  id="confirm">
    <div id="close"  style="margin-left: 380px; margin-top: 0px" onclick="cancel_overlay()"><b>X</b></div>
    <div>
        <div  style="margin-left: 45px;font-size: 28px;color:#954b4b;"><b>Account confirmation</b></div>
        <br style="line-height: .2">
        <img src="" id="img" style="float: left;width: 90px; margin-left: 10px; height: 90px">
        <span style="float: left; margin-left: 5px" id="fname"></span><span style="margin-left: 5px" id="lname"></span><br>
        <input type="radio" checked="checked">Reset vai email<br>
        <input type="hidden" id="mail">
        <input type="hidden" id="uname">
        <input type="hidden" id="id">
        &nbsp;&nbsp; <button id="btn" onclick="confirming()">Continue</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

</div>
<?php
include "connect.php";$search='';
$query1=mysqli_query($conn,"SELECT * FROM  register  WHERE 1 ");
while($row1=mysqli_fetch_assoc($query1)){
    $search.= $row1['name'].',';
}
///  $search.= $row['name'];

?>
<?php //require 'search.php'  ?>
<div id="main">
    <div id="header" align="center"><a  href="{{url('/')}}" >
            <img src="thumbnails/new%20logo.png" style="margin:0px auto">
        </a></div>

    @if(session()->get('username') && session()->get('password'))
    <div class="links_bar">
        <form style="float: left" action="searching" method="post">
            {{csrf_field()}}
            <div style="float: left"><input type="text"  name="search" id="text-field"    placeholder="Search..." class="awesomplete"
                                            data-list="<?php echo $search; ?>" ></div>
            <input type="submit" value=""  class="at" >
        </form>
        <ul><?php  if(session()->get('username')){$username =session()->get('username');}else{$username='';}  ?>
            <?php  include "connect.php";
            $myid=session()->get('id');
            $qry=mysqli_query($conn,"SELECT * FROM notification WHERE user_id=$myid AND status=1");
            $qr=mysqli_query($conn,"SELECT * FROM message WHERE to_key=$myid AND status=1");
            $input = number_format(mysqli_num_rows($qr));

            $myusername=session()->get('username');
            $query=mysqli_query($conn,"SELECT * FROM  register  WHERE username='$myusername'");
            $row= mysqli_fetch_assoc($query);
            $username=$row['name'];

            if(mysqli_num_rows($qry) >= 1 || $input >= 1 ){

            echo '<li> <a href="../timeline"><span style="color:lime">'.$username.'</span></a>|</li>';
            }else{


            echo '<li> <a href="../timeline">'.$username.'</a>&nbsp;<b style="font-size: 18px">|</b></li>';
            }
            $username=session()->get('username');
            ?>
            <li>&nbsp;<a href="../logout">Log out</a> </li>
        </ul>
    </div> @else
        <div class="links_bar">
            <form style="float: left" action="../searching" method="post">
                {{csrf_field()}}

                <div style="float: left"><input type="text"  name="search" id="text-field"    placeholder="Search..." class="awesomplete"
                                                data-list="<?php echo $search; ?>" ></div>
                <input type="submit" value=""  class="at">
            </form>
            <ul>
                <li> <a href="#signup" onclick="fill_form()">Sign up</a> | </li>
                <li>&nbsp;<a href="#login" onclick="fill_login()">Log in</a></li>
            </ul>
        </div>
    @endif
    <hr >
    <div class="chart">
        <h1 style="margin-left:450px;">OlovaMp3 Charts</h1>
    </div>
    <hr >
    <script>
        window.onload=storges;
        function storges(){
            localStorage.setItem("num",1);
        }</script>
    <div id="sidebar" style="margin-bottom: 0px; width: 1200px; " >
        <div class="header_comment" style="float: left;width: 790px; z-index: 5;border-bottom:1px solid silver; border-right:1px solid silver; box-shadow: 0px 0px 0px 0px ">
            <span>Most Downloaded Tracks</span>
        </div>

        <div class="header_comment" style="float:right;width: 384px; border-left:1px solid silver; margin-left: 805px; z-index: 5;border-bottom:1px solid silver; box-shadow: 0px 0px 0px 0px">

            <span>Featured</span>

        </div>

        <?php
        $query=mysqli_query($conn,"SELECT * FROM register where `artist_fan`='artist' ");
        $array[]='';$x=0;
        while($row1=mysqli_fetch_assoc($query)){
        $array[]+=$row1['id'];
        }
        ?>
        <div style="width: 1190px;  height: 900px; margin-bottom: -10px; " >
            @if($track->count())
                @foreach($track as $key=>$file)


                    <br><br>
                    <?php
                    $key++;
                    if($track->currentPage() >= 2){
                    if($key < 10){
                    $num = $track->currentPage()-1 .''.$key;
                    }else{
                    $num = $track->currentPage() .''. 0;
                    }
                    }else{
                    $num = $key;
                    }
                    $top5='';
                    if(strlen($file->file_name) > 30){
                    $trac_name=substr($file->file_name,0,30).'.mp3';
                    }else{
                    $trac_name=$file->file_name;
                    }
                    if($file->artist==='unknown'){
                    $artist=ucfirst($file->artist);
                    } else{
                    $query=mysqli_query($conn,"SELECT * FROM  register  WHERE id='$file->f_key'");
                    $row= mysqli_fetch_assoc($query);
                    $name=$row['name'];
                    $artist="<a href=\"".ucfirst($file->artist)."\" style=\"color: rgb(149,75,75)\">".ucfirst($name)."</a>";
                    }

                    if(file_exists('album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg')){
                    $img ='album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg';
                    }else{
                    $img ='thumbnails/olova logo.jpg';
                    }

                    if($x %= 2){
                    echo "
                    <div style=\"float: left; margin-top:-55px; width: 400px;\">
        <div style=\"float: left;color:#954b4b;\"><b style=\"font-size:19px\">$num .</b>&nbsp;</div><img  src=\"$img\" style=\"float: left; width: 90px; height: 90px\">
                <div class=\"icon\"></div>&nbsp;<div style=\"margin:-5px; font-size: 12px\">
                $trac_name
                </div>
                <br style=\"line-height: .2\">&nbsp;<div class=\"size\"></div>
                <div class=\"min\">&nbsp;".number_format($file->file_size / 1000000, "2")." Mb | $file->duration  Min</div><br style=\"line-height: .2\">&nbsp;
                <div class=\"by\" ></div>
                <div class=\"byy\" style=\"margin-bottom:10px\" >&nbsp;<b>By :</b>
                    $artist
                </div><a style=\"color: rgb(149,75,75); font-weight:bold;font-size:16px; margin-left: 27px\" href=\"$file->download_code\">Download</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".number_format($file->count)."</b>&nbsp;&nbsp;Downloads&nbsp;&nbsp;&nbsp;<a style=\"color: rgb(149,75,75);font-weight:bold;font-size:16px;\" href=\"lyrics/$file->download_code\">Lyrics
                </a>
    </div> ";
                    }else{
                    echo "
                   <div style=\"float: left; width: 400px; margin-top:25px\">

        <div style=\"float: left; color:#954b4b\"><b  style=\"font-size:19px\">$num .</b>&nbsp;</div><img  src=\"$img\" style=\"float: left; width: 90px; height: 90px\">
                <div class=\"icon\"></div>&nbsp;<div style=\"margin:-5px; font-size: 12px\">
                 $trac_name
                </div>
                <br style=\"line-height: .2\">&nbsp;<div class=\"size\"></div>
                <div class=\"min\">&nbsp;".number_format($file->file_size / 1000000, "2")." Mb | $file->duration  Min</div><br style=\"line-height: .2\">&nbsp;
                <div class=\"by\" ></div>
                <div class=\"byy\" style=\"margin-bottom:10px\" >&nbsp;<b>By :</b>
                    $artist
                </div><a style=\"color: rgb(149,75,75);font-weight:bold;font-size:16px; margin-left: 27px\" href=\"$file->download_code\">Download</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".number_format($file->count)."</b>&nbsp;&nbsp;Downloads&nbsp;&nbsp;&nbsp;<a style=\"color: rgb(149,75,75);font-weight:bold;font-size:16px;\" href=\"lyrics/$file->download_code\">Lyrics
                </a>
    </div> <hr style=\"width:350px; margin-left:-400px;\">";
                    }
                    $x++;
                    ?>



                @endforeach
            @endif

        </div >

        <div style="float: right; width: 380px;margin-right: 0px; margin-top: -800px; height: 100px;">

            <div style="margin-top: 10px; margin-left: 5px">
                @if($trading2 !=="")
                    @foreach($trading2 as $trading)
                        @if($trading->image ==="none")
                            <div class="image"><a href="../{{$trading->username}}"><img src="../thumbnails/newuser.gif" ></a></div>
                        @else
                            <div class="image"><a href="../{{$trading->username}}" ><img src="../pictures/{{$trading->image}}"></a></div>
                        @endif
                        <?php      $key=$trading->username;
                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE username='$key'"));
                        $name=$row['name'];

                        ?>
                        <a href="/{{$trading->username}}" style=";font-size: 18px; color: rgb(149,75,75)"><b>{{ucfirst($name)}}</b></a>
                        @if(strlen($trading->boi) > 75)
                            <p style="margin-top: 2px">{{substr($trading->boi,0,75).'...'}}</p>
                        @else
                            <p style="margin-top: 2px">{{$trading->boi}}</p>
                        @endif

                        <?php include 'connect.php';
                        $query=mysqli_query($conn,"SELECT * FROM follow WHERE following=$trading->id");
                        $follow= mysqli_num_rows($query)?>
                        <p style="margin-top: -12px"><b>{{$follow}}</b> Followers </p>
                        <p style="margin-top: -12px; float: left; width: 75%;">
                            @if($trading->artist_fan == "fan")
                                Fan <span class="featured" >Featured</span></p>
                        @else
                            <b>
                                <?php include 'connect.php';
                                $query=mysqli_query($conn,"SELECT * FROM music WHERE f_key=$trading->id");
                                echo mysqli_num_rows($query)?>
                            </b> Songs uploaded <span class="featured">Featured</span></p>
                        @endif
                        <br>
                    @endforeach
                @endif

                @if($trading_track2 !=="")

                    @if($trading_track2->count())
                        @foreach($trading_track2 as $key=>$file)
                            <?php
                            if(file_exists('../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg')){
                            $img ='../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg';
                            }else{
                            $img ='../thumbnails/olova logo.jpg';
                            }
                            ?>

                            <div style="margin-top: -15px;"><div style="float: left; font-weight: bold"></div> <div class="image"><img  src="
                   {{$img}}

                                            " style="width: 85px;height: 85px" ></div>
                                <div class="icon"></div>&nbsp;<div style="margin:-5px; font-size: 12px">

                                    @if(strlen($file->file_name) > 40)
                                        {{substr($file->file_name,0,40).'.mp3'}}
                                    @else
                                        {{$file->file_name}}
                                    @endif

                                </div>
                                <br style="line-height: .2" >&nbsp;<div class="size" ></div>
                                <div class="min">&nbsp;{{number_format($file->file_size / 1000000, "2")}} Mb | {{$file->duration}}  Min</div><br style="line-height: .2" >
                                <div class="by"></div><br style="line-height: .2" >
                                <div class="byy" style="margin-bottom:5px">&nbsp;<b>By :</b>
                                    @if($file->artist==='unknown')
                                        {{ucfirst($file->artist)}}
                                    @else
                                        <?php
                                        $key=$file->f_key;
                                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE id='$key'"));
                                        $name=$row['name'];
                                        ?>
                                        <a href="{{$file->artist}}" style="color: rgb(149,75,75)">{{ucfirst($name)}}</a>
                                    @endif
                                </div>
                                &nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="{{$file->download_code}}">Download</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($file->count)}}&nbsp;Downloads&nbsp;&nbsp;&nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="lyrics/{{$file->download_code}}">Lyrics
                                </a><span class="featured"  >Featured</span></div>

                        @endforeach

                    @endif


                @endif

            </div>

        </div>
        <div style="float: right; width: 380px;margin-right: 0px; margin-top: -650px; height: 100px;">
            <div style="margin-top: 10px; margin-left: 5px">
                @if($trading3 !=="")
                    @foreach($trading3 as $trading)
                        @if($trading->image ==="none")
                            <div class="image"><a href="../{{$trading->username}}"><img src="../thumbnails/newuser.gif" ></a></div>
                        @else
                            <div class="image"><a href="../{{$trading->username}}" ><img src="../pictures/{{$trading->image}}"></a></div>
                        @endif
                        <?php      $key=$trading->username;
                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE username='$key'"));
                        $name=$row['name'];

                        ?>
                        <a href="/{{$trading->username}}" style=";font-size: 18px; color: rgb(149,75,75)"><b>{{ucfirst($name)}}</b></a>
                        @if(strlen($trading->boi) > 75)
                            <p style="margin-top: 2px">{{substr($trading->boi,0,75).'...'}}</p>
                        @else
                            <p style="margin-top: 2px">{{$trading->boi}}</p>
                        @endif

                        <?php include 'connect.php';
                        $query=mysqli_query($conn,"SELECT * FROM follow WHERE following=$trading->id");
                        $follow= mysqli_num_rows($query)?>
                        <p style="margin-top: -12px"><b>{{$follow}}</b> Followers </p>
                        <p style="margin-top: -12px; float: left; width: 75%;">
                            @if($trading->artist_fan == "fan")
                                Fan <span class="featured" >Featured</span></p>
                        @else
                            <b>
                                <?php include 'connect.php';
                                $query=mysqli_query($conn,"SELECT * FROM music WHERE f_key=$trading->id");
                                echo mysqli_num_rows($query)?>
                            </b> Songs uploaded <span class="featured">Featured</span></p>
                        @endif
                        <br>
                    @endforeach
                @endif

                @if($trading_track3 !=="")

                    @if($trading_track3->count())
                        @foreach($trading_track3 as $key=>$file)
                            <?php
                            if(file_exists('../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg')){
                            $img ='../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg';
                            }else{
                            $img ='../thumbnails/olova logo.jpg';
                            }
                            ?>

                            <div style="margin-top: -15px;"><div style="float: left; font-weight: bold"></div> <div class="image"><img  src="
                   {{$img}}

                                            " style="width: 85px;height: 85px" ></div>
                                <div class="icon"></div>&nbsp;<div style="margin:-5px; font-size: 12px">

                                    @if(strlen($file->file_name) > 40)
                                        {{substr($file->file_name,0,40).'.mp3'}}
                                    @else
                                        {{$file->file_name}}
                                    @endif

                                </div>
                                <br style="line-height: .2" >&nbsp;<div class="size" ></div>
                                <div class="min">&nbsp;{{number_format($file->file_size / 1000000, "2")}} Mb | {{$file->duration}}  Min</div><br style="line-height: .2" >
                                <div class="by"></div><br style="line-height: .2" >
                                <div class="byy" style="margin-bottom:5px">&nbsp;<b>By :</b>
                                    @if($file->artist==='unknown')
                                        {{ucfirst($file->artist)}}
                                    @else
                                        <?php
                                        $key=$file->f_key;
                                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE id='$key'"));
                                        $name=$row['name'];
                                        ?>
                                        <a href="{{$file->artist}}" style="color: rgb(149,75,75)">{{ucfirst($name)}}</a>
                                    @endif
                                </div>
                                &nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="{{$file->download_code}}">Download</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($file->count)}}&nbsp;Downloads&nbsp;&nbsp;&nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="lyrics/{{$file->download_code}}">Lyrics
                                </a><span class="featured"  >Featured</span></div>

                        @endforeach

                    @endif


                @endif

            </div>

        </div>
        <div style="float: right; width: 380px;margin-right: 0px; margin-top: -500px; height: 100px;">
            <div style="margin-top: 10px; margin-left: 5px">
                @if($trading4 !=="")
                    @foreach($trading4 as $trading)
                        @if($trading->image ==="none")
                            <div class="image"><a href="../{{$trading->username}}"><img src="../thumbnails/newuser.gif" ></a></div>
                        @else
                            <div class="image"><a href="../{{$trading->username}}" ><img src="../pictures/{{$trading->image}}"></a></div>
                        @endif
                        <?php      $key=$trading->username;
                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE username='$key'"));
                        $name=$row['name'];

                        ?>
                        <a href="/{{$trading->username}}" style=";font-size: 18px; color: rgb(149,75,75)"><b>{{ucfirst($name)}}</b></a>
                        @if(strlen($trading->boi) > 75)
                            <p style="margin-top: 2px">{{substr($trading->boi,0,75).'...'}}</p>
                        @else
                            <p style="margin-top: 2px">{{$trading->boi}}</p>
                        @endif

                        <?php include 'connect.php';
                        $query=mysqli_query($conn,"SELECT * FROM follow WHERE following=$trading->id");
                        $follow= mysqli_num_rows($query)?>
                        <p style="margin-top: -12px"><b>{{$follow}}</b> Followers </p>
                        <p style="margin-top: -12px; float: left; width: 75%;">
                            @if($trading->artist_fan == "fan")
                                Fan <span class="featured" >Featured</span></p>
                        @else
                            <b>
                                <?php include 'connect.php';
                                $query=mysqli_query($conn,"SELECT * FROM music WHERE f_key=$trading->id");
                                echo mysqli_num_rows($query)?>
                            </b> Songs uploaded <span class="featured">Featured</span></p>
                        @endif
                        <br>
                    @endforeach
                @endif

                @if($trading_track4 !=="")

                    @if($trading_track4->count())
                        @foreach($trading_track4 as $key=>$file)
                            <?php
                            if(file_exists('../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg')){
                            $img ='../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg';
                            }else{
                            $img ='../thumbnails/olova logo.jpg';
                            }
                            ?>

                            <div style="margin-top: -15px;"><div style="float: left; font-weight: bold"></div> <div class="image"><img  src="
                   {{$img}}

                                            " style="width: 85px;height: 85px" ></div>
                                <div class="icon"></div>&nbsp;<div style="margin:-5px; font-size: 12px">

                                    @if(strlen($file->file_name) > 40)
                                        {{substr($file->file_name,0,40).'.mp3'}}
                                    @else
                                        {{$file->file_name}}
                                    @endif

                                </div>
                                <br style="line-height: .2" >&nbsp;<div class="size" ></div>
                                <div class="min">&nbsp;{{number_format($file->file_size / 1000000, "2")}} Mb | {{$file->duration}}  Min</div><br style="line-height: .2" >
                                <div class="by"></div><br style="line-height: .2" >
                                <div class="byy" style="margin-bottom:5px">&nbsp;<b>By :</b>
                                    @if($file->artist==='unknown')
                                        {{ucfirst($file->artist)}}
                                    @else
                                        <?php
                                        $key=$file->f_key;
                                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE id='$key'"));
                                        $name=$row['name'];
                                        ?>
                                        <a href="{{$file->artist}}" style="color: rgb(149,75,75)">{{ucfirst($name)}}</a>
                                    @endif
                                </div>
                                &nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="{{$file->download_code}}">Download</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($file->count)}}&nbsp;Downloads&nbsp;&nbsp;&nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="lyrics/{{$file->download_code}}">Lyrics
                                </a><span class="featured"  >Featured</span></div>

                        @endforeach

                    @endif


                @endif

            </div>

        </div>
        <div style="float: right; width: 380px;margin-right: 0px; margin-top: -345px; height: 100px;">
            <div style="margin-top: 10px; margin-left: 5px">
                @if($trading5 !=="")
                    @foreach($trading5 as $trading)
                        @if($trading->image ==="none")
                            <div class="image"><a href="../{{$trading->username}}"><img src="../thumbnails/newuser.gif" ></a></div>
                        @else
                            <div class="image"><a href="../{{$trading->username}}" ><img src="../pictures/{{$trading->image}}"></a></div>
                        @endif
                        <?php      $key=$trading->username;
                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE username='$key'"));
                        $name=$row['name'];

                        ?>
                        <a href="/{{$trading->username}}" style=";font-size: 18px; color: rgb(149,75,75)"><b>{{ucfirst($name)}}</b></a>
                        @if(strlen($trading->boi) > 75)
                            <p style="margin-top: 2px">{{substr($trading->boi,0,75).'...'}}</p>
                        @else
                            <p style="margin-top: 2px">{{$trading->boi}}</p>
                        @endif

                        <?php include 'connect.php';
                        $query=mysqli_query($conn,"SELECT * FROM follow WHERE following=$trading->id");
                        $follow= mysqli_num_rows($query)?>
                        <p style="margin-top: -12px"><b>{{$follow}}</b> Followers </p>
                        <p style="margin-top: -12px; float: left; width: 75%;">
                            @if($trading->artist_fan == "fan")
                                Fan <span class="featured" >Featured</span></p>
                        @else
                            <b>
                                <?php include 'connect.php';
                                $query=mysqli_query($conn,"SELECT * FROM music WHERE f_key=$trading->id");
                                echo mysqli_num_rows($query)?>
                            </b> Songs uploaded <span class="featured">Featured</span></p>
                        @endif
                        <br>
                    @endforeach
                @endif

                @if($trading_track5 !=="")

                    @if($trading_track5->count())
                        @foreach($trading_track5 as $key=>$file)
                            <?php
                            if(file_exists('../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg')){
                            $img ='../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg';
                            }else{
                            $img ='../thumbnails/olova logo.jpg';
                            }
                            ?>

                            <div style="margin-top: -15px;"><div style="float: left; font-weight: bold"></div> <div class="image"><img  src="
                   {{$img}}

                                            " style="width: 85px;height: 85px" ></div>
                                <div class="icon"></div>&nbsp;<div style="margin:-5px; font-size: 12px">

                                    @if(strlen($file->file_name) > 40)
                                        {{substr($file->file_name,0,40).'.mp3'}}
                                    @else
                                        {{$file->file_name}}
                                    @endif

                                </div>
                                <br style="line-height: .2" >&nbsp;<div class="size" ></div>
                                <div class="min">&nbsp;{{number_format($file->file_size / 1000000, "2")}} Mb | {{$file->duration}}  Min</div><br style="line-height: .2" >
                                <div class="by"></div><br style="line-height: .2" >
                                <div class="byy" style="margin-bottom:5px">&nbsp;<b>By :</b>
                                    @if($file->artist==='unknown')
                                        {{ucfirst($file->artist)}}
                                    @else
                                        <?php
                                        $key=$file->f_key;
                                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE id='$key'"));
                                        $name=$row['name'];
                                        ?>
                                        <a href="{{$file->artist}}" style="color: rgb(149,75,75)">{{ucfirst($name)}}</a>
                                    @endif
                                </div>
                                &nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="{{$file->download_code}}">Download</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($file->count)}}&nbsp;Downloads&nbsp;&nbsp;&nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="lyrics/{{$file->download_code}}">Lyrics
                                </a><span class="featured"  >Featured</span></div>

                        @endforeach

                    @endif


                @endif

            </div>

        </div>
        <div style="float: right; width: 380px;margin-right: 0px; margin-top: -205px; height: 100px;">
            <div style="margin-top: 10px; margin-left: 5px">
                @if($trading1 !=="")
                    @foreach($trading1 as $trading)
                        @if($trading->image ==="none")
                            <div class="image"><a href="../{{$trading->username}}"><img src="../thumbnails/newuser.gif" ></a></div>
                        @else
                            <div class="image"><a href="../{{$trading->username}}" ><img src="../pictures/{{$trading->image}}"></a></div>
                        @endif
                        <?php      $key=$trading->username;
                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE username='$key'"));
                        $name=$row['name'];

                        ?>
                        <a href="/{{$trading->username}}" style=";font-size: 18px; color: rgb(149,75,75)"><b>{{ucfirst($name)}}</b></a>
                        @if(strlen($trading->boi) > 75)
                            <p style="margin-top: 2px">{{substr($trading->boi,0,75).'...'}}</p>
                        @else
                            <p style="margin-top: 2px">{{$trading->boi}}</p>
                        @endif

                        <?php include 'connect.php';
                        $query=mysqli_query($conn,"SELECT * FROM follow WHERE following=$trading->id");
                        $follow= mysqli_num_rows($query)?>
                        <p style="margin-top: -12px"><b>{{$follow}}</b> Followers </p>
                        <p style="margin-top: -12px; float: left; width: 75%;">
                            @if($trading->artist_fan == "fan")
                                Fan <span class="featured" >Featured</span></p>
                        @else
                            <b>
                                <?php include 'connect.php';
                                $query=mysqli_query($conn,"SELECT * FROM music WHERE f_key=$trading->id");
                                echo mysqli_num_rows($query)?>
                            </b> Songs uploaded <span class="featured">Featured</span></p>
                        @endif
                        <br>
                    @endforeach
                @endif

                @if($trading_track1 !=="")

                    @if($trading_track1->count())
                        @foreach($trading_track1 as $key=>$file)
                            <?php
                            if(file_exists('../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg')){
                            $img ='../album_art/'.substr($file->file_name,0,strlen($file->file_name)-3).'jpg';
                            }else{
                            $img ='../thumbnails/olova logo.jpg';
                            }
                            ?>

                            <div style="margin-top: -15px;"><div style="float: left; font-weight: bold"></div> <div class="image"><img  src="
                   {{$img}}

                                            " style="width: 85px;height: 85px" ></div>
                                <div class="icon"></div>&nbsp;<div style="margin:-5px; font-size: 12px">

                                    @if(strlen($file->file_name) > 40)
                                        {{substr($file->file_name,0,40).'.mp3'}}
                                    @else
                                        {{$file->file_name}}
                                    @endif

                                </div>
                                <br style="line-height: .2" >&nbsp;<div class="size" ></div>
                                <div class="min">&nbsp;{{number_format($file->file_size / 1000000, "2")}} Mb | {{$file->duration}}  Min</div><br style="line-height: .2" >
                                <div class="by"></div><br style="line-height: .2" >
                                <div class="byy" style="margin-bottom:5px">&nbsp;<b>By :</b>
                                    @if($file->artist==='unknown')
                                        {{ucfirst($file->artist)}}
                                    @else
                                        <?php
                                        $key=$file->f_key;
                                        $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM register WHERE id='$key'"));
                                        $name=$row['name'];
                                        ?>
                                        <a href="{{$file->artist}}" style="color: rgb(149,75,75)">{{ucfirst($name)}}</a>
                                    @endif
                                </div>
                                &nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="{{$file->download_code}}">Download</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($file->count)}}&nbsp;Downloads&nbsp;&nbsp;&nbsp;<a style="color: rgb(149,75,75);font-weight:bold;font-size:16px;" href="lyrics/{{$file->download_code}}">Lyrics
                                </a><span class="featured"  >Featured</span></div>

                        @endforeach

                    @endif


                @endif

            </div>

        </div>


    </div>

    <br style="line-height: .5">
    <script>
        function downs(){
            <?php  echo $track->currentPage();  ?>
        }
        function upsa(){

        }
    </script><hr>
    @if(count($track) !== 0)
        @if($track->lastPage() != 1)
            @if($track->currentPage() > 1)
                <p align="center"><a onclick="downs()" style="font-weight:bold;float:left;font-size: 26px; margin-left: 6%; color:rgb(149,75,75)"  href="{{$track->previousPageUrl()}}">Prev</a>
                    @endif

                    @if($track->currentPage() > 1)
                        <span  style="margin-left: -4%;font-size: 20px;font-weight:bold;">{{$track->currentPage()}}</span>
                    @else
                        <span  style="margin-left: 45%;font-size: 20px;font-weight:bold;">{{$track->currentPage()}}</span>
                    @endif

                    @if($track->currentPage()!== $track->lastPage())
                        <a onclick="upsa()" style="font-weight:bold;float: right;font-size: 26px; margin-right: 6%;color:rgb(149,75,75)"  href="{{$track->nextPageUrl()}}">Next</a> </p>
            @endif
        @endif
    @endif




    {{--<div align="center" id="controls">--}}
    {{--<input type="button" class="btn2" style="background-color:rgb(149,75,75); width: 100%" value="View more">--}}

    {{--</div>--}}
    <?php
    if (session()->get('username') && session()->get('password')) {
    $display="style=display:none";
    }else{
    $display="style=display:block";
    }
    ?>

    <?php include 'connect.php';
    $uname=session()->get('username');
    $query=mysqli_query($conn,"SELECT * FROM `register` WHERE `username`='$uname'");
    $row=mysqli_fetch_assoc($query);

    if($row['artist_fan'] === "fan"){
    $display2="style=display:none";
    $dsp="style=display:none";
    $login="display:none";
    }else{
    $display2="style=width:590px;display:block;  ";
    $dsp="style=display:block";
    $login="display:block";
    }

   
    ?>

    <hr <?php echo $dsp;  ?> >

    <div id="side"  style="width: 553px; height: 355px;  margin-left: 622px; margin-bottom: -385px;<?php echo $login ?>" >

        <h1 align="center" ><u>Download Banners</u></h1><br style="line-height:.3">
        <a href="download-avaliable"><img src="../thumbnails/avaliable.png" style="width: 350px;margin-left:100px "></a>
        <a href="download-comming"><img src="../thumbnails/soon.png" style="width: 350px; margin-left:100px"></a>
        <img src="../thumbnails/logggs.png" style="width: 500px;margin-left:20px">
    </div>
    <div id="side"   <?php echo $display2 ?>>
        <div style="float: left;">
            <b style="float: left"><div id="upl" style="margin-left: 10px"></div>&nbsp;&nbsp;Upload&nbsp;&nbsp; </b>
            <span id="error" style="font-family:Verdana, Geneva, sans-serif; color:red; float: left"></span>
            <span id="check" style="font-family:Verdana, Geneva, sans-serif; color:green"></span><br>

            <form enctype="multipart/form-data" method="POST" action="uploading" style="margin-left: 10px"  >
                {{ csrf_field() }}
                @if(session()->get('id') && session()->get('username'))
                    <input type="hidden" value="{{session()->get('id')}}" name="id" id="id2">
                    <input type="hidden" name="myname" id="myname" value="{{session()->get('username')}}">
                @else
                    <input type="hidden" value="0" name="id" id="id2">
                    <input type="hidden" name="myname" id="myname" value="unknown">
                @endif

                <input type="file" name="file"  id="file" style="width: 90px" onchange="file_check()">
                <span id="file_status">No file selected</span>
                <br><br style="line-height: .2"><div id="lry"></div><b >&nbsp;&nbsp;Lyrics (Optional): </b><br>

                <TEXTAREA ROWS=3 COLS=30  name="lyrics"  id="textarea" ></TEXTAREA><br style="line-height:0.5">
                <div id="genre_icon" style="margin-left: 0px;float:left"></div>&nbsp;&nbsp;<label><b>Genre</b></label><br>
                <input type="text"  class="text-field" id='genre' style="width:150px"><br>
                <a href="{{url('terms')}}" style="float: left;color: rgb(149,75,75)"><b>T&C's</b></a><br >
                <span id="statuss" style="display:none; margin-left: 3px;" >
               <div style="width: 370px; height: 20px;background-color:  #d19275;float: left;border-radius: 5px" >
             <div id="bar" style="width:0%;height: 100%;background-color: #b05f3c;border-radius: 5px"></div>
         </div><span id="cal" style="margin-left: 2px"> </span></span>
                <input type="button" onclick="uploadFile()" name="upbtn" value="Upload" id="btn" style="background:#954b4b; color:white"/>
            </form>
            <div style="margin-left:240px; margin-top:-100px">
                <span style="color:red" >*</span> Upload, Generate link and Share on Social Networks<br>
                <span style="color:red">*</span> To report an error Click 'Contact Us' below<br>
            </div>
            <br style="line-height:1.5">

        </div><br>
        <div style="height: 320px;">
            <div id="drop_zone" style="display:none" ondrop="drag_drop(event)" ondragover="drag_over(event)">
                <p style="margin-top: 120px; font-size: 24px;color: rgb(149,75,75)" id="zone_status" align="center">
                    <b>Drop your track here</b></p>
            </div>

        </div>
    </div>
    <hr>
@section('footer')
@stop


