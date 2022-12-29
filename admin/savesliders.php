<?php      
 
    include('config.php');  

    $Slider_title = $_POST['Slider_title'];
    $Slider_subtitle = $_POST['Slider_subtitle'];
    $Slider_button_text =$_POST['Slider_button_text'];
    $Slider_button_link =$_POST['Slider_button_link'];
	// $status =$_POST['status'];

	if(!empty($_FILES['Slider_img']))
{
	$img_name = $_FILES['Slider_img']['name'];
	$img_size = $_FILES['Slider_img']['size'];
	$tmp_name = $_FILES['Slider_img']['tmp_name'];
	$error = $_FILES['Slider_img']['error'];

	
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);


				$data=array();
		if(empty($Slider_title)){
			$data['code']="404";
		$data['msg']="Please Enter Slider Ttle.";
		}
	 else if(empty($Slider_subtitle)){
			$data['code']="404";
		$data['msg']="Please Enter Slider Subtitle.";
		}
	
		else if(empty($Slider_button_text)){
			$data['code']="404";
		$data['msg']="Please Enter Slider button text.";
		}
        else if(empty($Slider_button_link)){
			$data['code']="404";
		$data['msg']="Please Enter Slider button Link.";
		}
	
		else{

				// Insert into Database
				$sql = "INSERT INTO `slider_images`(`slider_title`, `slider_subtitle`, `slider_img`, `slider_button_text`,`slider_button_link`) 
				        VALUES ('$Slider_title','$Slider_subtitle','$new_img_name','$Slider_button_text','$Slider_button_link')";
						mysqli_query($con,$sql);
						$data['code']="200";
						$data['msg']="Thank you! Data Saved.";
		}			


		

// mysqli_close($con);  

			}
}
else 
{
	$data['code']="404";
	$data['msg']="Please Select Image.";
}


echo json_encode($data);