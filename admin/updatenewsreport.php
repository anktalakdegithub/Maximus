<?php      
 
    include('config.php');  
    $news_id = $_POST['news_id'];

    $news_title = $_POST['news_title'];
    $news_des=$_POST['news_des'];
  $news_date=$_POST['news_date'];
    // $status =$_POST['status'];

     $img =$_POST['eimage'];
     $img1 =$_POST['eimage1'];

     if(!empty($_FILES["news_image"]["name"])){


    move_uploaded_file($_FILES["news_image"]["tmp_name"],"news/" . $_FILES["news_image"]["name"]);			
    $img=$_FILES["news_image"]["name"];


    $result = mysqli_query($con,"SELECT * FROM news WHERE news_id   ='" .$news_id. "'");
    $row= mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $imageUrl = 'news/'.$row['news_image'];
    //  echo($imageUrl); die();

        unlink($imageUrl);
    }



     }
     if(!empty($_FILES["news_pdf"]["name"])){


        move_uploaded_file($_FILES["news_pdf"]["tmp_name"],"news/" . $_FILES["news_pdf"]["name"]);			
        $img1=$_FILES["news_pdf"]["name"];
    
    
        $result = mysqli_query($con,"SELECT * FROM news WHERE news_id   ='" .$news_id. "'");
        $row= mysqli_fetch_array($result);
        if (mysqli_num_rows($result) > 0) {
    
            $imageUrl1 = 'news/'.$row['news_pdf'];
            // echo($imageUrl); die();
    
            unlink($imageUrl1);
        }
    
    
    
         }

    
    $data=array();
    if(empty($news_title)){
        $data['code']="404";
    $data['msg']="Please enter News Title.";
    }

  else{
    $sql = "UPDATE `news` SET news_title ='$news_title', news_des = '$news_des', news_date = '$news_date', news_image ='$img', news_pdf ='$img1' WHERE news_id = '$news_id' ";
    mysqli_query($con,$sql);
    $data['code']="200";
    $data['msg']="Thank you! Data Saved.";
}			


echo json_encode($data);
	