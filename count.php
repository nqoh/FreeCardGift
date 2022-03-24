<?php

$precision = 2;
$number= $input ;
$suffixes = array('k', 'M','B');
$suffix = '';
while($number >= 1000 && count($suffixes)){
$suffix = array_shift($suffixes);
$number /= 1000;
}
$num = $number;
while ($precision){
    $num /= 10;
    $precision--;
    if($num < 1){
        break;
    }
}

$number = round($number, $precision);

echo  $number.$suffix;

?>






