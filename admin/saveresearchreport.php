<?php      
 
    include('config.php');  
    $data=array();
    $research_title = $_POST['research_title'];
	$research_des = $_POST['research_des'];
	$research_date= $_POST['research_date'];
//    echo $research_des;
	// $status =$_POST['status'];

	if(!empty($_FILES['research_image']))
{
	$img_name = $_FILES['research_image']['name'];
	$img_size = $_FILES['research_image']['size'];
	$tmp_name = $_FILES['research_image']['tmp_name'];
	$error = $_FILES['research_image']['error'];

	
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'daily_report/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
            }



}  
if(!empty($_FILES['research_pdf']))
{
	$img_name = $_FILES['research_pdf']['name'];
	$img_size = $_FILES['research_pdf']['size'];
	$tmp_name = $_FILES['research_pdf']['tmp_name'];
	$error = $_FILES['research_pdf']['error'];

	
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png","pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name1 = uniqid("pdf-", true).'.'.$img_ex_lc;
				$img_upload_path = 'daily_report/'.$new_img_name1;
				// print_r($img_upload_path);die();
				move_uploaded_file($tmp_name, $img_upload_path);
            }



}else{
                $data['code']="404";
                $data['msg']="Please Select Image.";
            }

				
		if(empty($research_title)){
			$data['code']="404";
		$data['msg']="Please Enter Research Title.";
		}else{

				// Insert into Database
				$sql = "INSERT INTO `research`(`research_title`, `research_date`, `research_des`, `research_image`, `research_pdf`) 
				        VALUES ('$research_title','$research_date','$research_des','$new_img_name','$new_img_name1')";
						mysqli_query($con,$sql);
						$data['code']="200";
						$data['msg']="Thank you! Data Saved.";
						//  print_r($sql);
		}			


		
echo json_encode($data);