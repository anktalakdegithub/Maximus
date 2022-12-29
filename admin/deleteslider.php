
<?php
    include('config.php');  
    $sql = "DELETE FROM slider_images WHERE slider_id  ='" . $_POST["slider_id"] . "'";


    $result = mysqli_query($con,"SELECT * FROM slider_images WHERE slider_id='" . $_POST["slider_id"] . "'");
    $row= mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

    $imageUrl = 'uploads/'.$row['slider_img'];
    unlink($imageUrl);



    }

mysqli_query($con, $sql);

?>
