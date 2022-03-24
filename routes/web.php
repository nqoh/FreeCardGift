<?php
use App\savedecards;
use App\ecards;
use App\images;
use App\usercard;
use App\ads;
use App\sounds;
use App\Registration;
use App\block;
use App\sents;
use App\contactus;
use App\savedeimages;
use App\User;
use App\Rate;
use App\sentcontacts;
use App\contacts;

Route::get('app', function (){
    return view('app');
});

Route::get('/', function () {
    $ecards = ecards::Paginate(8);
     $ads1= ads::inRandomOrder()->first();
     $ads2= ads::inRandomOrder()->first();
    return view('home',compact('ecards','ads1','ads2'));
});

Route::get('/imoji', function(){
    $src = "128513";
    $replaced = preg_replace("/\\\\u([0-9A-F]{1,4})/i", "&#x$i;", $src);
    $result = mb_convert_encoding($replaced, "UTF-16", "HTML-ENTITIES");
    $result = mb_convert_encoding($result, 'utf-8', 'utf-16');
    return $result;
});


Route::get('/SaveAllContacts/{AllContacts}', function($AllContacts){
   $contacts = explode(',',$AllContacts);
   for($i=0; $i < sizeof($contacts) ; $i ++){
       if(contacts::where('contacts',str_replace(']','',str_replace('[','',$contacts[$i])))->get() == '[]'){
         $con = new contacts();
         $con->contacts = str_replace(']','',str_replace('[','',$contacts[$i]));
         $con->save();
       }
   }
   return 'Done';
});


Route::get('/lordNumbers', function(){
    $allContacts = contacts::limit(100)->get();
    foreach($allContacts as $cont){
        $saveCont = new sentcontacts();
        $saveCont->contacts = $cont->contacts;
        $saveCont->save();
        contacts::where('contacts',$cont->contacts)->delete();
    }
    return $allContacts;
    
});


Route::get('aboutus', function (){
  return view('aboutus');
});

Route::post('/test',function(\Illuminate\Http\Request $request){
    return $request->title;
});

Route::get('terms', function (){
    return view('terms');
});

Route::get('/NumberUpdate/{oldNumber}/{newNumber}/{countryCode}', function($oldNumber,$newNumber,$countryCode){
    $contact = str_replace($countryCode,0,$newNumber);
    Registration::where('phoneCode',$oldNumber)->update(
        ['phoneCode'=>$newNumber , 'phone'=>$contact , 'countryCode' => $countryCode]
        );
    return 'Updated';
});

Route::get('/addNumber/{countryCode}/{phone}/{token}/{version}', function($countryCode,$phone, $token,$version){
    $contact = str_replace($countryCode,0,$phone);
    $registration = Registration::where('phoneCode',$phone)->orWhere('phone',$phone)->first();
    if($registration == ''){
        $register = new Registration();
        $register->phoneCode = $phone;
        $register->phone = $contact;
        $register->countryCode = $countryCode;
        $register->token = $token;
        $register->version = $version;
        $register->save();
        
         $url = 'https://fcm.googleapis.com/fcm/send';
          $pay = array(
            "notification"=>array (
            "title"=> "FreeCardGift sent a card",
            "text" => "Tab to view this card"
             ),
             
             "data"=>array (
             "click_action" => "FLUTTER_NOTIFICATION_CLICK",
             "screen"=> "home",
             "senderNumber"=> "+27553301200",
             "card"=> "For_Signing_up_48bcc.gif"
              ),
              
              "priority" => "high",
              
              "to" => "$token"
              
             );
             $fields = json_encode ( $pay );
             $headers = array (
            'Authorization: key=' . "AAAA0QLr9Pc:APA91bF-KWth1ExycZkJYHQlBTETv6CLrW5IZhB7vL8FZNG7BhEiSZA791zxMT5o8mv8MQ2X5YOwKPUFn9nyt2EUlWKo6kHpJVWs2cbjNeMCG5w9gurg9lZqCXuUbs1Or7PVoRK3977M",
            'Content-Type: application/json'
             );
             
             $ch = curl_init ();
             curl_setopt ( $ch, CURLOPT_URL, $url );
             curl_setopt ( $ch, CURLOPT_POST, true );
             curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
             curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
             curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
             $result = curl_exec ( $ch );
             curl_close ( $ch );
             
             
               $sents = new sents();
               $sents->sender = '+27553301200';
               $sents->receiver = $phone;
               $sents->card = "For_Signing_up_48bcc.gif";
               $sents->category = 'Thank you';
               $sents->status = 1;
               $sents->save();
             
        return "saved";
    }else{
        registration::where('phoneCode',$phone)->orWhere('phone',$phone)->update(['token'=>$token,'version'=>$version]);
        return 'Updated';
    }
});


Route::get('/searchContact/{number}', function($number){
    $contact=Registration::where('phone',$number)->orWhere('phoneCode',$number)->first();
    if($contact != ''){
      return $contact->phoneCode; 
    }else{
      return 'false';
    }
});

Route::get('/removeAccount/{number}', function($number){
    if(Registration::where('phoneCode',$number)->orWhere('phone',$number)->exists()){
      registration::where('phoneCode',$number)->orWhere('phone',$number)->delete();
     // block::where('blocker',$number)->orWhere('blocked',$number)->delete();
      sents::where('receiver',$number)->orWhere('sender',$number)->delete();
      return 'true';
    }else{
       return 'not exits';
      }
});

Route::get('/AllNumbers', function(){
   return  Registration::get();
});
Route::get('/searchNumber/{number}',function($number){
      if(Registration::where('phone','LIKE','%'.$number.'%')->exists()){
          return Registration::where('phone','LIKE','%'.$number.'%')
          ->first()->phone;
      }else{
          return 'not exits';
      }
});

Route::get('/getReceives/{number}', function($number){
     /*if(sents::where('receiver',$number)->where('status',1)->exists()){*/
      echo sents::join('Registration','sents.receiver','Registration.phoneCode')->where('sents.receiver',$number)->where('sents.status',1)->get(); 
      sents::where('receiver',$number)->where('status',1)->update(['status'=>0]);
    /* }else{
         return [];
     }*/
});

Route::get('/getOneCard/{number}/{card}', function($number,$card){
    if(sents::where('receiver',$number)->where('card',$card)->where('status',1)->exists()){

        echo sents::join('Registration','sents.receiver','Registration.phoneCode')->where('sents.receiver',$number)->where('sents.card',$card)->where('sents.status',1)->get();
        
        sents::where('receiver',$number)->where('card',$card)->where('status',1)->update(['status'=>0]);
    }
});

Route::get('/block/{blocker}/{blocked}', function($blocker,$blocked){
    $block = new  block();
    $block->blocker = $blocker;
    $block->blocked = $blocked;
    $block->save();
    return true;
});

Route::get('/unblock/{blocker}/{blocked}', function($blocker,$blocked){
    block::where('blocker',$blocker)->where('blocked',$blocked)->delete();
    return true;
});


Route::get('/deleteCard/{card}/{number}', function($card,$number){
    sents::where('card',$card)->where('receiver',$number)->delete();
});

Route::get('rate/{stars}', function($stars){
    
 $rate = new Rate();
 $rate->stars = $stars;
 $rate->save();
    
 return 'Done';    
});


Route::get('/sentCard/{sender}/{receiver}/{card}/{senderName}/{category}',function($sender,$receiver,$card,$senderName,$category){
      $send = Registration::where('phoneCode',$sender)->orWhere('phone',$sender)->first();
      $receiv = Registration::where('phoneCode',$receiver)->orWhere('phone',$receiver)->first();
      
    if(block::where('blocker',$receiv->phoneCode)->where('blocked',$send->phoneCode)->orWhere('blocked',$send->phone)->exists()){
        return "you have been blocked";
    }else if(Registration::where('phoneCode',$receiver)->orWhere('phone',$receiver)->exists()){

        if(!sents::where('sender',$send->phoneCode)->where('receiver',$receiv->phoneCode)->where('card',$card)->exists()){
        $registration = Registration::where('phoneCode',$receiver)->orWhere('phone',$receiver)->first();
        $sents = new sents();
        $sents->sender = $sender;
        $sents->receiver = $registration->phoneCode;
        $sents->card = $card;
        $sents->category = $category;
        $sents->status = 1;
        $sents->save();
        
        $token = $registration->token;
        $url = 'https://fcm.googleapis.com/fcm/send';
          $pay = array(
            "notification"=>array (
            "title"=> "$senderName sent a card",
            "text" => "Tab to view this card"
             ),
             
             "data"=>array (
             "click_action" => "FLUTTER_NOTIFICATION_CLICK",
             "screen"=> "home",
             "senderNumber"=> "$sender ",
             "card"=> "$card"
              ),
              
              "priority" => "high",
              
              "to" => "$token"
              
             );
             $fields = json_encode ( $pay );
             $headers = array (
            'Authorization: key=' . "AAAA0QLr9Pc:APA91bF-KWth1ExycZkJYHQlBTETv6CLrW5IZhB7vL8FZNG7BhEiSZA791zxMT5o8mv8MQ2X5YOwKPUFn9nyt2EUlWKo6kHpJVWs2cbjNeMCG5w9gurg9lZqCXuUbs1Or7PVoRK3977M",
            'Content-Type: application/json'
             );
             
             $ch = curl_init ();
             curl_setopt ( $ch, CURLOPT_URL, $url );
             curl_setopt ( $ch, CURLOPT_POST, true );
             curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
             curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
             curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
             $result = curl_exec ( $ch );
             curl_close ( $ch );
            
             return 'card sent succefuly';
        }else{
            return 'your card already sent';
        }
    }else{
        return "Something wrong with this number $receiver ! Number must begin with country code or 0 ";
    }
});


Route::get('/getBlocked/{number}', function($number){
    if(block::where('blocker',$number)->exists()){
        return block::where('blocker',$number)->get();
    }else{
        return 'false';
    }
});





Route::post('/CardFromMobile/v13',function (\Illuminate\Http\Request $request){
    $card_name = $request->card_name;
    $senderName = $request->senderName;
    $recevierName = $request->receiverName;
    $message     =  $request->message; 
    $color       =  $request->color; 

    $card = new savedecards();
    $image = images::where('image', $card_name)->first();
    $ecard_code =substr(str_shuffle(md5($senderName)),3,5);
     
    $download_link =preg_replace("/[^a-zA-Z0-9]+/" , "_",  $senderName.'_'.$ecard_code);
    
    $card->receiver_name = ucfirst($recevierName);
    $card->message = $message;
    $card->name = ucfirst($senderName);
    $card->color = $color;
    $card->ecard_code = $download_link;
    $card->image =  $card_name;
    $card->ecard_name = $image->card_name;
    
    $card->save();
  
      $message = $message ;
      $pic = "images/".$image->image;
      $image_name= $download_link.".gif";
      $receiver_name = ucfirst($senderName);
      $name = ucfirst($recevierName);
      $color = $color;
      
      $receivercolor = "#A55FB6";
      $sendercolor = "#6dc6ef";
      
       $font = 'fonts/Cipthayasa.ttf';  if($image->card_name == "Love" || $image->card_name == "crush" ||
      $image->card_name == "Crush" || $image->card_name == "Marryme" || $image->card_name == "Valentines")
      { $font = "fonts/Love_Letters.ttf";}elseif($image->card_name == "Christmas"){ $image = "fonts/ChristmasPersonalUse.otf"; }
    
       
       if($color == 'Black'){$color = '#212529';}elseif($color == 'Pink'){$color = '#ff66ff';}
       elseif($color == 'Red'){$color='#ff4c4c';}elseif($color == 'Purple'){$color = '#993d99';}
       elseif($color == 'Grey'){$color = '#6c757d';}elseif($color == 'Blue'){$color = '#0077b6';}
       else if($color == 'Violet'){$color ='#b14dff';}    
      
     /* if($request->ecard_name == "Christmas"){ $font = "ChristmasPersonalUse.otf"; }*/
    
      if($color != 'Black' || $color != 'black' || $color != '#212529'){
          $receivercolor = $color;
          //$sendercolor = $color;
      }else if($color == 'Black' || $color == 'black' || $color == '#212529'){
          $receivercolor = '#0077b6';
      }
      
      
      exec('convert  '.$pic.'  -coalesce \
      -gravity center -background transparent  -fill "#191919"  -stroke "'.$receivercolor.'"  -font '.$font.'  -pointsize 40   -splice 0x0 \
      -strokewidth 2 -annotate -0-50 "'.$receiver_name.'" \
      -fill black   -stroke none -annotate -0-50 "'.$receiver_name.'" \
      -layers Optimize saved_images/'.$image_name.'');
      
    
 $message1 =  explode('*', $message);
 $mymessage2='';
 $num=50;
 $mymessage ='';
for($i=0 ; $i < sizeof($message1) ; $i++){
  
  if(strlen($message1[$i]) > 55){
      $message2 = explode(' ',$message1[$i]);
	for($ix = 0 ; $ix < sizeof($message2); $ix++){
	    $mymessage2 .= $message2[$ix].' ';
	   if(strlen($mymessage2) >= $num ) {
	     $mymessage2 .= '\n';
	     $num += 50;
	   }
	  }
	  $mymessage .= $mymessage2;
	}else{
	  $mymessage .= $message1[$i].'\n';	
	}

}
       exec('convert saved_images/'.$image_name.'  -coalesce \
      -gravity center -background transparent -fill "'.$color.'" -font fonts/Alex.ttf  -pointsize 20 -splice 0x0 \
      -annotate +0+28 "'.$mymessage.'" \
      -layers Optimize saved_images/'.$image_name.'');
  
  
  
       exec('convert saved_images/'.$image_name.' -coalesce \
      -gravity SouthEast -background transparent -fill "'.$sendercolor.'"  -stroke "'.$sendercolor.'"  -pointsize 40 -font fonts/cac_champagne.ttf  -splice 0x0 \
      -annotate +5-4    "'.$name.'" \
      -layers Optimize saved_images/'.$image_name.'');
      
      return  $download_link;
});


Route::post('/CardFromMobile',function (\Illuminate\Http\Request $request){
    $card_name = $request->card_name;
    $senderName = $request->senderName;
    $recevierName = $request->receiverName;
    $message     =  $request->message; 
    $color       =  $request->color; 

    $card = new savedecards();
    $image = images::where('image', $card_name)->first();
    $ecard_code =substr(str_shuffle(md5($senderName)),3,5);
     
    $download_link =preg_replace("/[^a-zA-Z0-9]+/" , "_",  $senderName.'_'.$ecard_code);
    
    $card->receiver_name = ucfirst($recevierName);
    $card->message = $message;
    $card->name = ucfirst($senderName);
    $card->color = $color;
    $card->ecard_code = $download_link;
    $card->image =  $card_name;
    $card->ecard_name = $image->card_name;
    
    $card->save();
  
      $message = $message ;
      $pic = "images/".$image->image;
      $image_name= $download_link.".gif";
      $receiver_name = ucfirst($senderName);
      $name = ucfirst($recevierName);
      $color = $color;
      
      $receivercolor = "#A55FB6";
      $sendercolor = "#6dc6ef";
      
       $font = 'fonts/Cipthayasa.ttf';  if($image->card_name == "Love" || $image->card_name == "crush" ||
      $image->card_name == "Crush" || $image->card_name == "Marryme" || $image->card_name == "Valentines")
      { $font = "fonts/Love_Letters.ttf";}elseif($image->card_name == "Christmas"){ $image = "fonts/ChristmasPersonalUse.otf"; }
    
       
       if($color == 'Black'){$color = '#212529';}elseif($color == 'Pink'){$color = '#ff66ff';}
       elseif($color == 'Red'){$color='#ff4c4c';}elseif($color == 'Purple'){$color = '#993d99';}
       elseif($color == 'Grey'){$color = '#6c757d';}elseif($color == 'Blue'){$color = '#0077b6';}
       else if($color == 'Violet'){$color ='#b14dff';}    
      
     /* if($request->ecard_name == "Christmas"){ $font = "ChristmasPersonalUse.otf"; }*/
    
      if($color != 'Black' || $color != 'black' || $color != '#212529'){
          $receivercolor = $color;
          //$sendercolor = $color;
      }else if($color == 'Black' || $color == 'black' || $color == '#212529'){
          $receivercolor = '#0077b6';
      }
      
      
      exec('convert  '.$pic.'  -coalesce \
      -gravity center -background transparent  -fill "#191919"  -stroke "'.$receivercolor.'"  -font '.$font.'  -pointsize 40   -splice 0x0 \
      -strokewidth 2 -annotate -0-50 "'.$receiver_name.'" \
      -fill black   -stroke none -annotate -0-50 "'.$receiver_name.'" \
      -layers Optimize saved_images/'.$image_name.'');
      
    
$message1 = explode(' ',$message);
$line1 ='';
$ix=0;
for($i=0 ; $i < sizeof($message1) ; $i++){
    $array_string = str_split($message1[$i]);
     $x=0;
    for($ii = 0 ; $ii < strlen($message1[$i]); $ii++){

        if($ix == 37 ) {
            $ix = strlen($message1[$i]);
            $line1 .= '\n';
            break;
        }
        $x++; $ix ++;
    }
    $line1 .= $message1[$i].' ';
}
    
$msg = $line1;
       exec('convert saved_images/'.$image_name.'  -coalesce \
      -gravity center -background transparent -fill "'.$color.'" -font fonts/Alex.ttf  -pointsize 20 -splice 0x0 \
      -annotate +0+28 "'.$msg.'" \
      -layers Optimize saved_images/'.$image_name.'');
  
  
  
       exec('convert saved_images/'.$image_name.' -coalesce \
      -gravity SouthEast -background transparent -fill "'.$sendercolor.'"  -stroke "'.$sendercolor.'"  -pointsize 40 -font fonts/cac_champagne.ttf  -splice 0x0 \
      -annotate +5-4    "'.$name.'" \
      -layers Optimize saved_images/'.$image_name.'');
      
      return  $download_link;
});









Route::get('/CardFromMobile/{senderName}/{recevierName}/{message}/{color}/{card_name}',function ($senderName,$recevierName,$message,$color,$card_name){

    $card = new savedecards();
    $image = images::where('image', $card_name)->first();
    $ecard_code =substr(str_shuffle(md5($senderName)),3,5);
     
    $download_link =preg_replace("/[^a-zA-Z0-9]+/" , "_",  $senderName.'_'.$ecard_code);
    
    $card->receiver_name = ucfirst($recevierName);
    $card->message = $message;
    $card->name = ucfirst($senderName);
    $card->color = $color;
    $card->ecard_code = $download_link;
    $card->image =  $card_name;
    $card->ecard_name = $image->card_name;
    
    $card->save();
  
      $message = $message ;
      $pic = "images/".$image->image;
      $image_name= $download_link.".gif";
      $receiver_name = ucfirst($senderName);
      $name = ucfirst($recevierName);
      $color = $color;
      
      $receivercolor = "#A55FB6";
      $sendercolor = "#6dc6ef";
      
       $font = 'fonts/Cipthayasa.ttf';  if($image->card_name == "Love" || $image->card_name == "crush" ||
      $image->card_name == "Crush" || $image->card_name == "Marryme" || $image->card_name == "Valentines")
      { $font = "fonts/Love_Letters.ttf";}elseif($image->card_name == "Christmas"){ $image = "fonts/ChristmasPersonalUse.otf"; }
    
       
       if($color == 'Black'){$color = '#212529';}elseif($color == 'Pink'){$color = '#ff66ff';}
       elseif($color == 'Red'){$color='#ff4c4c';}elseif($color == 'Purple'){$color = '#993d99';}
       elseif($color == 'Grey'){$color = '#6c757d';}elseif($color == 'Blue'){$color = '#0077b6';}
       else if($color == 'Violet'){$color ='#b14dff';}    
      
     /* if($request->ecard_name == "Christmas"){ $font = "ChristmasPersonalUse.otf"; }*/
    
      if($color != 'Black' || $color != 'black' || $color != '#212529'){
          $receivercolor = $color;
          //$sendercolor = $color;
      }else if($color == 'Black' || $color == 'black' || $color == '#212529'){
          $receivercolor = '#0077b6';
      }
      
      
      exec('convert  '.$pic.'  -coalesce \
      -gravity center -background transparent  -fill "#191919"  -stroke "'.$receivercolor.'"  -font '.$font.'  -pointsize 40   -splice 0x0 \
      -strokewidth 2 -annotate -0-50 "'.$receiver_name.'" \
      -fill black   -stroke none -annotate -0-50 "'.$receiver_name.'" \
      -layers Optimize saved_images/'.$image_name.'');
      
      
$message1 = explode(' ',$message);
$line1 ='';
$ix=0;
for($i=0 ; $i < sizeof($message1) ; $i++){
    $array_string = str_split($message1[$i]);
     $x=0;
    for($ii = 0 ; $ii < strlen($message1[$i]); $ii++){

        if($ix == 37 ) {
            $ix = strlen($message1[$i]);
            $line1 .= '\n';
            break;
        }
        $x++; $ix ++;
    }
    $line1 .= $message1[$i].' ';
}

$msg = $line1;
       exec('convert saved_images/'.$image_name.'  -coalesce \
      -gravity center -background transparent -fill "'.$color.'" -font fonts/Alex.ttf  -pointsize 20 -splice 0x0 \
      -annotate +0+28 "'.$msg.'" \
      -layers Optimize saved_images/'.$image_name.'');
  
  
  
       exec('convert saved_images/'.$image_name.' -coalesce \
      -gravity SouthEast -background transparent -fill "'.$sendercolor.'"  -stroke "'.$sendercolor.'"  -pointsize 40 -font fonts/cac_champagne.ttf  -splice 0x0 \
      -annotate +5-4    "'.$name.'" \
      -layers Optimize saved_images/'.$image_name.'');
      
      return  $download_link;
});




Route::get('contactus',function(){
	  return view('contactus');
});


Route::get('/card', function (){
    return view('card');
});

Route::post('/download' , function (\Illuminate\Http\Request $request){
    $filename = 'saved_images/'.$request->image_name.'.gif';
    $ctype="audio/mpeg";
    if(ini_get('zlib.output_compression'))
        ini_set('zlib.output_compression', 'Off');
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    header("Content-Type: $ctype/force-download");
    header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize($filename));
    readfile("$filename");
    exit();
    
    });
	
	
	Route::post('/submitCard/v3',function (\Illuminate\Http\Request $request){
   
    $card = new savedecards();
    $image = images::where('card_name', $request->ecard_name)->where('id',$request->id)->first();
    $ecard_code =substr(str_shuffle(md5($request->receiver_name)),3,5);
     
    $download_link =preg_replace("/[^a-zA-Z0-9]+/" , "_",  $request->receiver_name.'_'.$ecard_code);
    
    $card->receiver_name = ucfirst($request->receiver_name);
    $card->message = $request->message;
    $card->name = ucfirst($request->name);
    $card->color = $request->color;
    $card->ecard_code = $download_link;
    $card->image =  $image->image;
    $card->ecard_name = $request->ecard_name;
    $card->save();


      $image = images::where('card_name', $request->ecard_name)->where('id',$request->id)->first();
      $message = $request->message  ;
      $pic = "images/".$image->image;
      $image_name= $download_link.".gif";
      $receiver_name = ucfirst($request->receiver_name);
      $name = ucfirst($request->name);
      $color = $request->color;
      $font = 'fonts/Cipthayasa.ttf'; 
      
     
      $receivercolor = "#A55FB6";
      $sendercolor = "#6dc6ef";
      
      if($request->ecard_name == "Love" || $request->ecard_name == "Crush" || $request->ecard_name == "Marryme" || $request->ecard_name == "Valentines")
      { $font = "fonts/Love_Letters.ttf";}elseif($request->ecard_name == "Christmas"){ $font = "fonts/ChristmasPersonalUse.otf"; }
    
      if($color != 'Black' || $color != 'black' || $color != '#212529'){
          $receivercolor = $color;
          //$sendercolor = $color;
      }else if($color == 'Black' || $color == 'black' || $color == '#212529'){
          $receivercolor = '#0077b6';
      }
     
      
      exec('convert  '.$pic.'  -coalesce \
      -gravity center -background transparent  -fill "#191919"  -stroke "'.$receivercolor.'"  -font '.$font.'  -pointsize 40   -splice 0x0 \
      -strokewidth 2 -annotate -0-50 "'.$receiver_name.'" \
      -fill black   -stroke none -annotate -0-50 "'.$receiver_name.'" \
      -layers Optimize saved_images/'.$image_name.'');
      
                  
$message1 = explode('*',$message);
$message2 = explode(' ',$message1);
$mymessage ='';
for($i=0 ; $i < sizeof($message1) ; $i++){
  if( 52 > strlen($message1[$i])){
	for($ix = 0 ; $ix < strlen($message2[$i]); $ix++){
	  $mymessage .= $message2[$ix];
	   if($ix == 40 ) {
	     $mymessage .= '\n';
	   }
	  }
	}else{
	  $mymessage .= $message1[$i].'\n';	
	}

     exec('convert saved_images/'.$image_name.'  -coalesce \
      -gravity center -background transparent -fill "'.$color.'" -font fonts/Alex.ttf  -pointsize 20 -splice 0x0 \
      -annotate +0+28 "'.$mymessage.'" \
      -layers Optimize saved_images/'.$image_name.'');
  
  
  
       exec('convert saved_images/'.$image_name.' -coalesce \
      -gravity SouthEast -background transparent -fill "'.$sendercolor.'"  -stroke "'.$sendercolor.'"  -pointsize 40 -font fonts/cac_champagne.ttf  -splice 0x0 \
      -annotate +5-4    "'.$name.'" \
      -layers Optimize saved_images/'.$image_name.'');
 

    return  $download_link;
}
});



Route::post('/submitCard',function (\Illuminate\Http\Request $request){
   
    $card = new savedecards();
    $image = images::where('card_name', $request->ecard_name)->where('id',$request->id)->first();
    $ecard_code =substr(str_shuffle(md5($request->receiver_name)),3,5);
     
    $download_link =preg_replace("/[^a-zA-Z0-9]+/" , "_",  $request->receiver_name.'_'.$ecard_code);
    
    $card->receiver_name = ucfirst($request->receiver_name);
    $card->message = $request->message;
    $card->name = ucfirst($request->name);
    $card->color = $request->color;
    $card->ecard_code = $download_link;
    $card->image =  $image->image;
    $card->ecard_name = $request->ecard_name;
    $card->save();

    // execute imagick to edit and save new gif to created_gif folder
    /*
     * picture name images/$image->image
     * receiver_name $request->receiver_name
     * message  $request->message
     * name     $request->name
     * message color $request->color
     * font  $font='';  if($request->ecard_name == "Love"){ $font = 'fonts/Love_Letters.ttf'; )else{ $font = 'fonts/SchoolStory.ttf';}
     */
    

      
      $image = images::where('card_name', $request->ecard_name)->where('id',$request->id)->first();
      $message = $request->message  ;
      $pic = "images/".$image->image;
      $image_name= $download_link.".gif";
      $receiver_name = ucfirst($request->receiver_name);
      $name = ucfirst($request->name);
      $color = $request->color;
      $font = 'fonts/Cipthayasa.ttf'; 
      
     
      $receivercolor = "#A55FB6";
      $sendercolor = "#6dc6ef";
      
      if($request->ecard_name == "Love" || $request->ecard_name == "Crush" || $request->ecard_name == "Marryme" || $request->ecard_name == "Valentines")
      { $font = "fonts/Love_Letters.ttf";}elseif($request->ecard_name == "Christmas"){ $font = "fonts/ChristmasPersonalUse.otf"; }
      
      
      if($color == 'Black'){$color = '#212529';}elseif($color == 'Pink'){$color = '#ff66ff';}
       elseif($color == 'Red'){$color='#ff4c4c';}elseif($color == 'Purple'){$color = '#993d99';}
       elseif($color == 'Grey'){$color = '#6c757d';}elseif($color == 'Blue'){$color = '#0077b6';}
       else if($color == 'Violet'){$color ='#b14dff';}    
      
     /* if($request->ecard_name == "Christmas"){ $font = "ChristmasPersonalUse.otf"; }*/
    
      if($color != 'Black' || $color != 'black' || $color != '#212529'){
          $receivercolor = $color;
          //$sendercolor = $color;
      }else if($color == 'Black' || $color == 'black' || $color == '#212529'){
          $receivercolor = '#0077b6';
      }
     
      
      exec('convert  '.$pic.'  -coalesce \
      -gravity center -background transparent  -fill "#191919"  -stroke "'.$receivercolor.'"  -font '.$font.'  -pointsize 40   -splice 0x0 \
      -strokewidth 2 -annotate -0-50 "'.$receiver_name.'" \
      -fill black   -stroke none -annotate -0-50 "'.$receiver_name.'" \
      -layers Optimize saved_images/'.$image_name.'');
      
    /*   $msg='';
       $x= explode(' ', $message);
    
           $num =6;
                 for($i=0; $i < sizeof($x); $i++){
                  
                    $msg .= $x[$i].' '; 
                    
                      if( $i >= $num ){
                          $msg .= '\n';
                          $num +=7;
                          if($num > sizeof($x)){
                              $num = sizeof($x);
                          }
                      }
                  }*/
                  
$message1 = explode(' ',$message);
$line1 ='';
$ix=0;
for($i=0 ; $i < sizeof($message1) ; $i++){
    $array_string = str_split($message1[$i]);
     $x=0;
    for($ii = 0 ; $ii < strlen($message1[$i]); $ii++){

        if($ix == 37 ) {
           // echo $ix.'---'.$line1.'--'.strlen($line1);exit();
            /*if($x < strlen($message[$i])){
                $line1 = substr($line1,0 , strlen($line1) - $x );
            }*/

            $ix = strlen($message1[$i]);
            $line1 .= '\n';
         //  $line1 .= $message[$i];
            break;
        }


        $x++; $ix ++;


    }
    $line1 .= $message1[$i].' ';
    /*$line1.=' ';
    $ix++;*/



}

$msg = $line1;
                  
       
      exec('convert saved_images/'.$image_name.'  -coalesce \
      -gravity center -background transparent -fill "'.$color.'" -font fonts/Alex.ttf  -pointsize 20 -splice 0x0 \
      -annotate +0+28 "'.$msg.'" \
      -layers Optimize saved_images/'.$image_name.'');
  
  
  
       exec('convert saved_images/'.$image_name.' -coalesce \
      -gravity SouthEast -background transparent -fill "'.$sendercolor.'"  -stroke "'.$sendercolor.'"  -pointsize 40 -font fonts/cac_champagne.ttf  -splice 0x0 \
      -annotate +5-4    "'.$name.'" \
      -layers Optimize saved_images/'.$image_name.'');
 

    return  $download_link;
});


Route::get('GetFirstImage/{card_name}', function ($card_name){
    $image = images::where('card_name', $card_name)->first();
    return $image->image ;
});






Route::get('GetFirstImage/{card_name}', function ($card_name){
    $image = images::where('card_name', $card_name)->first();
    return $image->image ;
});




Route::get('/{card_name}', function ($card_name){
     
    if(ecards::where('ecard_name',$card_name)->exists()) {

        $ads2= ads::inRandomOrder()->first();
        $images = images::where('card_name', $card_name)->get();
        $selected_card_id = images::where('card_name', $card_name)->first();
        $ecards = ecards::where('eCard_name', $card_name)->first();
        $usercard = usercard::where('card_name',$card_name)->inRandomOrder()->first();

        $link1 = ecards::inRandomOrder()->first();
        $link2 = ecards::inRandomOrder()->first();
        $link3 = ecards::inRandomOrder()->first();

        return view('edit', compact('ecards','link1','link2','link3','ads2','images','usercard','selected_card_id','card_name'));

    }else if(savedecards::where('ecard_code',$card_name)->exists()) {
        $ecard_name = savedecards::where('ecard_code', $card_name)->first();
        $sound = '';
        if(sounds::where('card_name',$ecard_name->ecard_name)->exists()){
            $sound = sounds::where('card_name',$ecard_name->ecard_name)->inRandomOrder()->first();
        }
            $ads1= ads::inRandomOrder()->first();

            return view('card',compact('ecard_name','sound','ads1','card_name'));
    }else{
        return view('errorpage');
    }
});
