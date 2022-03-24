<?php
if(isset($_POST['app_name']) ) {
    $file = $_POST['app_name'];
    $filename = "apk/$file";
    header("location:app.php?app_name=$filename");
}
?>