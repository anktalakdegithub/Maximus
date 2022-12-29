<?php      
 
    include('config.php');  
    $data=array();
    $news_title = $_POST['news_title'];
	$news_des = $_POST['news_des'];
	$news_date = $_POST['news_date'];
//    echo $report_des;
	// $status =$_POST['status'];

	if(!empty($_FILES['news_image']))
{
	$img_name = $_FILES['news_image']['name'];
	$img_size = $_FILES['news_image']['size'];
	$tmp_name = $_FILES['news_image']['tmp_name'];
	$error = $_FILES['news_image']['error'];

	
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'news/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
            }



}  
if(!empty($_FILES['news_pdf']))
{
	$img_name = $_FILES['news_pdf']['name'];
	$img_size = $_FILES['news_pdf']['size'];
	$tmp_name = $_FILES['news_pdf']['tmp_name'];
	$error = $_FILES['news_pdf']['error'];

	
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png","pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name1 = uniqid("pdf-", true).'.'.$img_ex_lc;
				$img_upload_path = 'news/'.$new_img_name1;
				move_uploaded_file($tmp_name, $img_upload_path);
            }



}
            else 
            {
                $data['code']="404";
                $data['msg']="Please Select Image.";
            }

				
		if(empty($news_title)){
			$data['code']="404";
		$data['msg']="Please Enter Report Title.";
		}			
		// elseif(empty($report_des)){
		// 	$data['code']="404";
		// $data['msg']="Please Enter Report Description.";
		// }
	
		else{

				// Insert into Database
				$sql = "INSERT INTO `news`(`news_title`, `news_des`, `news_date`, `news_image`, `news_pdf`)
				        VALUES ('$news_title','$news_des','$news_date','$new_img_name','$new_img_name1')";
						mysqli_query($con,$sql);
						$data['code']="200";
						$data['msg']="Thank you! Data Saved.";
						// print_r($sql);
		}			


		

// mysqli_close($con);  

			



echo json_encode($data);