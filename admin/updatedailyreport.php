<?php      
 
    include('config.php');  
    $report_id = $_POST['report_id'];

    $report_title = $_POST['report_title'];
    $report_des=$_POST['report_des'];

    // $status =$_POST['status'];

     $img =$_POST['eimage'];
     $img1 =$_POST['eimage1'];

     if(!empty($_FILES["report_image"]["name"])){


    move_uploaded_file($_FILES["report_image"]["tmp_name"],"daily_report/" . $_FILES["report_image"]["name"]);			
    $img=$_FILES["report_image"]["name"];


    $result = mysqli_query($con,"SELECT * FROM daily_reports WHERE report_id   ='" .$report_id. "'");
    $row= mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $imageUrl = 'daily_report/'.$row['report_image'];
    //  echo($imageUrl); die();

        unlink($imageUrl);
    }



     }
     if(!empty($_FILES["report_pdf"]["name"])){


        move_uploaded_file($_FILES["report_pdf"]["tmp_name"],"daily_report/" . $_FILES["report_pdf"]["name"]);			
        $img1=$_FILES["report_pdf"]["name"];
    
    
        $result = mysqli_query($con,"SELECT * FROM daily_reports WHERE report_id   ='" .$report_id. "'");
        $row= mysqli_fetch_array($result);
        if (mysqli_num_rows($result) > 0) {
    
            $imageUrl1 = 'daily_report/'.$row['report_pdf'];
            // echo($imageUrl); die();
    
            unlink($imageUrl1);
        }
    
    
    
         }

    
    $data=array();
    if(empty($report_title)){
        $data['code']="404";
    $data['msg']="Please enter report Title.";
    }

   
    else{
    $sql = "UPDATE daily_reports SET report_title ='$report_title', report_des = '$report_des', report_image ='$img',report_pdf ='$img1' WHERE report_id = '$report_id' ";
    mysqli_query($con,$sql);
    $data['code']="200";
    $data['msg']="Thank you! Data Saved.";
}			


echo json_encode($data);
	