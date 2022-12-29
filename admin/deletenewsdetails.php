
<?php
    include('config.php');  
    $sql = "DELETE FROM news WHERE news_id   ='" . $_POST["news_id"] . "'";


    $result = mysqli_query($con,"SELECT * FROM news WHERE news_id='" . $_POST["news_id"] . "'");
    $row= mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

    $imageUrl = 'news/'.$row['news_image'];
    unlink($imageUrl);



    }
    if (mysqli_num_rows($result) > 0) {

        $imageUrl1 = 'news/'.$row['news_pdf'];
        unlink($imageUrl1);
    
    
    
        }

mysqli_query($con, $sql);

?>
