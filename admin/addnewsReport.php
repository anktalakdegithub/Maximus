<?php include('header.php');?>


<div class="row mt-5">
            <div class="col-lg-9" style="margin-left:80px;">
            <h6 class="mb-3 font-weight-bold">News Report Form</h6>

              <!-- Form Basic -->
              <div class="card mb-4" >
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>

               
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
                            <div class="card-body">
                            <form id="addsid"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">News Title:</label>
                                    <input type="text" class="form-control" id="news_title" name="news_title" aria-describedby="emailHelp"
                                        placeholder="Enter News Title">
                                    
                                 </div>
                   
                   
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">News Description:</label>
                                    <input type="text" class="form-control" id="news_des" name="news_des" aria-describedby="emailHelp"
                                        placeholder="Enter News Description">
                                    
                                 </div>
                                 <div class="form-group">
                      <label for="exampleInputEmail1">Date:</label>
                      <input type="date" class="form-control" id="news_date" name="news_date" aria-describedby="emailHelp">
                      
                    </div>
                     <div class="form-group">
                                         <label for="customFile">News Image</label>
                                        <input type="file" class="form-control" id="news_image" name="news_image">
                       
                      </div> 

                      <div class="form-group">
                                         <label for="customFile">News Pdf</label>
                                        <input type="file" class="form-control" id="news_pdf" name="news_pdf">
                       
                      </div> 
                 


                    <button type="button" class="btn btn-primary btn-fill" id="buttonnews">Submit</button>
                    <div id="msg"></div>

                  </form>
                </div>
              </div>
</div></div>



<?php include('footer.php');?>

<script>
$(document).ready(function() {
	$('#buttonnews').on('click', function() {

		var news_title = $('#news_title').val();
   var news_des= $('#news_des').val();
  var news_date=$('#news_date').val();
        var news_image=$('#news_image').get(0).files[0];
        var news_pdf=$('#news_pdf').get(0).files[0];

        var formData = new FormData();
        formData.append('news_title', news_title);
        formData.append('news_des', news_des);
        formData.append('news_date', news_date)
        formData.append('news_image', news_image);
        formData.append('news_pdf', news_pdf);
     

        // if(slider_title!="" && slider_description!="" && btn_name!="" && slider_image!="" ){
			$.ajax({
                
				url: "savenewsreport.php",
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
                     window.location.href="news.php";					

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