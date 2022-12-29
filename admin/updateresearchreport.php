<?php      
 
    include('config.php');  
    $research_id = $_POST['research_id'];

    $research_title = $_POST['research_title'];
    $research_des=$_POST['research_des'];

    // $status =$_POST['status'];

     $img =$_POST['eimage'];
     $img1 =$_POST['eimage1'];

     if(!empty($_FILES["research_image"]["name"])){


    move_uploaded_file($_FILES["research_image"]["tmp_name"],"daily_report/" . $_FILES["research_image"]["name"]);			
    $img=$_FILES["research_image"]["name"];


    $result = mysqli_query($con,"SELECT * FROM research WHERE research_id   ='" .$research_id. "'");
    $row= mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $imageUrl = 'daily_report/'.$row['research_image'];
    //  echo($imageUrl); die();

        unlink($imageUrl);
    }



     }
     if(!empty($_FILES["research_pdf"]["name"])){


        move_uploaded_file($_FILES["research_pdf"]["tmp_name"],"daily_report/" . $_FILES["research_pdf"]["name"]);			
        $img1=$_FILES["research_pdf"]["name"];
    
    
        $result = mysqli_query($con,"SELECT * FROM research WHERE research_id   ='" .$research_id. "'");
        $row= mysqli_fetch_array($result);
        if (mysqli_num_rows($result) > 0) {
    
            $imageUrl1 = 'daily_report/'.$row['research_pdf'];
            // echo($imageUrl); die();
    
            unlink($imageUrl1);
        }
    
    
    
         }

    
    $data=array();
    if(empty($research_title)){
        $data['code']="404";
    $data['msg']="Please enter report Title.";
    }

   
    else{
    $sql = "UPDATE research SET research_title ='$research_title', research_des = '$research_des', research_image ='$img',research_pdf ='$img1' WHERE research_id = '$research_id' ";
    mysqli_query($con,$sql);
    $data['code']="200";
    $data['msg']="Thank you! Data Saved.";
}			


echo json_encode($data);
	