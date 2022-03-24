<?php
include 'connect.php';
if(isset($_POST['image_name'])){
    $name=$_POST['image_name'].'.gif';
    $filename = "saved_images/$name";
    
        $escape=mysqli_real_escape_string($conn, $_POST['image_name']);
        $query=mysqli_query($conn,"SELECT * FROM `savedecards` WHERE `ecard_code`='$escape'");
        $row=mysqli_fetch_assoc($query);
        $count=$row['donwload']+1;//add count
        $id=$row['id'];

        mysqli_query($conn,"UPDATE `savedecards` SET `download`='$count' WHERE `ecard_code`='$escape'");
        
     header("location: d.php?image=$filename");
}
?>