<?php include('header.php');?>


<?php
include_once 'config.php';

$result = mysqli_query($con,"SELECT * FROM slider_images WHERE slider_id ='" . $_GET['slider_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<div class="row mt-5">
            <div class="col-lg-9" style="margin-left:80px;">
            <h6 class="mb-3 font-weight-bold">Edit Sliders Form</h6>

              <!-- Form Basic -->
              <div class="card mb-4" >
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>

               
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
                <div class="card-body">
                  <form id="addsid"  enctype="multipart/form-data">
                  <input type="hidden" name="Slider_id" id="Slider_id" value="<?php echo $row['slider_id']; ?>">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Slider Title:</label>
                      <input type="email" class="form-control" id="Slider_title" name="Slider_title" aria-describedby="emailHelp"
                        placeholder="Enter Slider Title" value="<?php echo $row['slider_title']; ?>">
                      
                    </div>
                   
                   
                    
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Slider Subtitle</label>
                      <input type="email" class="form-control" id="Slider_subtitle" name="Slider_subtitle" aria-describedby="emailHelp"
                        placeholder="Enter Slider Subtitle" value="<?php echo $row['slider_subtitle']; ?>">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Slider Image</label>

                    <div class="hovercross img">
                        <a class="closeimg" onclick="$('.hovercross').hide();$('#Slider_img').show();">&times;</a>
                        <img src="uploads/<?php echo $row['slider_img']; ?>" height="100" width="100"></div>
                        <input type="hidden" name="eimage" id="eimage" value="<?php echo $row['slider_img']; ?>">
                      <input type="file" name="Slider_img" id="Slider_img" style="display:none;margin-top:8px;">
                     
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">Slider button text</label>
                      <input type="email" class="form-control" id="Slider_button_text" name="Slider_button_text" aria-describedby="emailHelp"
                        placeholder="Enter Slider button name" value="<?php echo $row['slider_button_text']; ?>">
                      
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Slider button link</label>
                      <input type="email" class="form-control" id="Slider_button_link" name="Slider_button_link" aria-describedby="emailHelp"
                        placeholder="Enter Slider button name" value="<?php echo $row['slider_button_text']; ?>">
                      
                    </div>


                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">status:</label>&nbsp;
                      <input type="checkbox"  id="status" name="status" aria-describedby="emailHelp">
                      
                    </div> -->


                    <button type="button" class="btn btn-primary btn-fill" id="editslider">Submit</button>
                    <div id="msg"></div>

                  </form>
                </div>
              </div>
</div></div>



<?php include('footer.php');?>

<script>
$(document).ready(function() {
	$('#editslider').on('click', function() {

        var Slider_id =$('#Slider_id').val();
		var Slider_title = $('#Slider_title').val();
        // alert(slider_title);
        var Slider_subtitle = $('#Slider_subtitle').val();
        var eimage = $('#eimage').val();

		//var slider_description = $('#slider_description').val();
		
//     var status=0;
  
// if($('#status').is(':checked')){
//   status=1;
// }
    // alert(status);
        var Slider_img=$('#Slider_img').get(0).files[0];
        var Slider_button_text = $('#Slider_button_text').val();
		var Slider_button_link = $('#Slider_button_link').val();

        var formData = new FormData();
        formData.append('Slider_title', Slider_title);
        formData.append('Slider_subtitle', Slider_subtitle);
        formData.append('Slider_img', Slider_img);
        formData.append('Slider_button_text', Slider_button_text);
        formData.append('Slider_button_link', Slider_button_link);
        // formData.append('status', status);
        formData.append('eimage', eimage);
        formData.append('Slider_id', Slider_id );

        // if(slider_title!="" && slider_description!="" && btn_name!="" && slider_image!="" ){
			$.ajax({
                
				url: "updatesliders.php",
				type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",

				success: function(data){
          // var dataResult = JSON.parse(dataResult);
          // if(dataResult.statusCode==200){
					// 	$('#addsid').find('input:text').val('');
					// 	$("#success").show();
					// 	$('#success').html('Data added successfully !'); 	
                   
          // }else if(dataResult.statusCode==201){
					//    alert("Error occured !");
             
					// }


          if(data.code=="404"){
                    $('#msg').html('<p class="text-danger">'+data.msg+'</p>');
                }
                else{
                    $('#msg').html('<p class="text-success">'+data.msg+'</p>');
                    // purchase_product();
                     window.location.href="slider.php";					

                }
				
				}
      
			});
		
    //     }
    //     else{
		// 	alert('Please fill all the field !');
		// }
	});
});
</script>