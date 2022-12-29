<?php
 include('config.php');  
$slider_id=$_REQUEST['slider_id'];

$r=mysqli_query($con,"SELECT `status` FROM `slider_images` WHERE `slider_id`= '".$slider_id."'");
$sql=(mysqli_fetch_array($r));
echo $sql["status"];
if($sql["status"]=='0')
{
    $status="1";

}
else{
    $status="0";
}

$q=mysqli_query($con,"UPDATE `slider_images` SET`status`='".$status."' WHERE  `slider_id`='".$slider_id."'")


?>