<?php


/*exec('convert image/east4.gif -coalesce \
          -gravity SouthEast -background white -splice 0x5 \
          -annotate +10+10 "A Better" \
          
          -gravity center -background white -splice 0x18 \
          -annotate 0 "Ngobese mandisa fksdjeaf ffdadf \n yizo na dfasf asfeadad dsafseasa sdafea d \n jdsfsadffdsedk isenza njalo" \
          
          -gravity center -background white  -pointsize 28   -splice 0x5 \
          -annotate -0-70 "123456789012340" \
          -layers Optimize    saved_images/nqobilez.gif')
  
/*  exec('convert mage/east4.gif -coalesce \
          -gravity South -background white -splice 0x18 \
          -annotate 0 "A Better Label" \
          -layers Optimize saved_images/nqobilez.gif');*/
  
  
  /*   -coalesce \
          -gravity SouthEast -background white -splice 0x5 \
          -annotate +10+10 "A Better" \
          
          -gravity center -background white -splice 0x18 \
          -annotate 0 "Ngobese mandisa fksdjeaf ffdadf \n yizo na dfasf asfeadad dsafseasa sdafea d \n jdsfsadffdsedk isenza njalo" \
          
          -gravity center -background white  -pointsize 28   -splice 0x5 \
          -annotate -0-70 "123456789012340" \
          -layers Optimize
          
          
          
          -gravity center -background white  -splice 0x0 \
      -annotate -0-10 "Ngobese mandisa fksdjeaf ffdadf \n yizo na dfasf asfeadad dsafseasa sdafea d \n jdsfsadffdsedk isenza njalo \n sadfsdafs dsaefads dasfe" \
      -gravity center -background white  -pointsize 28   -splice 0x0 \
      -annotate -0-50 "123456789012340"       
          -font image/FFF_Tusj.ttf
          */


      $nqobile ="Nkosingiphilelo";
      exec('/bin/convert  images/missyou3.gif  -coalesce \
      -gravity center -background transparent  -fill black  -stroke "#6dc6ef"  -font fonts/Cipthayasa.ttf  -pointsize 45   -splice 0x0 \
      -stroke red -strokewidth 1 -annotate -0-50 '.$nqobile.' \
      -fill black   -stroke none -annotate -0-50 '.$nqobile.' \
      -layers Optimize saved_images/nqobile.gif');
  
  
       $message ="The sacrifices that you have made for me are precious gifts that will last for the rest of my life. Happy Mother’s Day mom! ";
       $msg='';
       $x= explode(' ', $message);
           $num =6;
                 for($i=0; $i < str_word_count($message); $i++){
                  
                      $msg .= $x[$i].' ';
                    
                      if( $i >= $num ){
                          $msg .= '\n';
                          $num +=7;
                          if($num > str_word_count($message)){
                              $num = str_word_count($message);
                          }
                      }
                  }
                  
       
      exec('/bin/convert saved_images/nqobile.gif  -coalesce \
      -gravity center -background transparent -fill purple -font fonts/SCRIPTBL.TTF  -pointsize 21 -splice 0x0 \
      -annotate +0+35 "'.$msg.'" \
      -layers Optimize saved_images/nqobile.gif');
  
  
       exec('/bin/convert saved_images/nqobile.gif -coalesce \
      -gravity SouthEast -background transparent -fill "#6dc6ef"   -pointsize 27 -font fonts/cac_champagne.ttf  -splice 0x0 \
      -annotate +5-4 "Nkosingiphilelo" \
      -layers Optimize saved_images/nqobile.gif');




     




      
         
       /*   $image ="saved_images/nqobile.gif";
    
    
    $filename = $image;
    $ctype="image/gif";
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
    readfile("$filename");*/
 
?>

<img style='border:1px solid silver' src=saved_images/nqobile.gif />



<form  method="post" action="../../imagex" enctype="multipart/form-data">
  {{ csrf_field() }}
<textarea name='text'> </textarea><br>
<input type='submit' value='send'>
</form>
