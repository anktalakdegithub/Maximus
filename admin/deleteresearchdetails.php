
<?php
    include('config.php');  
    $sql = "DELETE FROM research WHERE research_id   ='" . $_POST["research_id"] . "'";


    $result = mysqli_query($con,"SELECT * FROM research WHERE research_id='" . $_POST["research_id"] . "'");
    $row= mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

    $imageUrl = 'research_report/'.$row['research_image'];
    unlink($imageUrl);



    }
    if (mysqli_num_rows($result) > 0) {

        $imageUrl1 = 'research_report/'.$row['research_pdf'];
        unlink($imageUrl1);
    
    
    
        }

mysqli_query($con, $sql);

?>
