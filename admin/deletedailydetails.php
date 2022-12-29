
<?php
    include('config.php');  
    $sql = "DELETE FROM daily_reports WHERE report_id   ='" . $_POST["report_id"] . "'";


    $result = mysqli_query($con,"SELECT * FROM daily_reports WHERE report_id='" . $_POST["report_id"] . "'");
    $row= mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

    $imageUrl = 'daily_report/'.$row['report_image'];
    unlink($imageUrl);



    }
    if (mysqli_num_rows($result) > 0) {

        $imageUrl1 = 'daily_report/'.$row['report_pdf'];
        unlink($imageUrl1);
    
    
    
        }

mysqli_query($con, $sql);

?>
