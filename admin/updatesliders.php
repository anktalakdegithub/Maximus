<?php      
 
    include('config.php');  
    $Slider_id = $_POST['Slider_id'];

    $Slider_title = $_POST['Slider_title'];
    $Slider_subtitle = $_POST['Slider_subtitle'];
    $Slider_button_text =$_POST['Slider_button_text'];
    $Slider_button_link =$_POST['Slider_button_link'];

    // $status =$_POST['status'];

     $img =$_POST['eimage'];

     if(!empty($_FILES["Slider_img"]["name"])){


    move_uploaded_file($_FILES["Slider_img"]["tmp_name"],"uploads/" . $_FILES["Slider_img"]["name"]);			
    $img=$_FILES["Slider_img"]["name"];


    $result = mysqli_query($con,"SELECT * FROM slider_images WHERE slider_id  ='" . $Slider_id. "'");
    $row= mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $imageUrl = 'uploads/'.$row['slider_img'];
        // echo($imageUrl); die();

        unlink($imageUrl);
    }



     }


    
    $data=array();
    if(empty($Slider_title)){
        $data['code']="404";
    $data['msg']="Please enter Slider Name.";
    }
 else if(empty($Slider_subtitle)){
        $data['code']="404";
    $data['msg']="Please enter Slider SubTitle.";
    }
   
    else{
    $sql = "UPDATE slider_images SET slider_title ='$Slider_title',slider_subtitle ='$Slider_subtitle',slider_img ='$img',slider_button_text ='$Slider_button_text',slider_button_link ='$Slider_button_link' WHERE slider_id   = '$Slider_id' ";
    mysqli_query($con,$sql);
    $data['code']="200";
    $data['msg']="Thank you! Data Saved.";
}			


echo json_encode($data);
	