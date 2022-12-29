<?php include('header.php');?>


<div class="row mt-5">
            <div class="col-lg-9" style="margin-left:80px;">
            <h6 class="mb-3 font-weight-bold">Research Form</h6>

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
                                    <label for="exampleInputEmail1">Research Title:</label>
                                    <input type="text" class="form-control" id="research_title" name="research_title" aria-describedby="emailHelp"
                                        placeholder="Enter research Title">
                                    
                                 </div>
                   
                   
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Research Description:</label>
                                    <!-- <input type="text" class="form-control" id="research_des" name="research_des" aria-describedby="emailHelp" -->
                                        <!-- placeholder="Enter research Description"> -->
                                    <textarea type="text" class="form-control" id="research_des" name="research_des" cols="30" rows="10" placeholder="Enter research Description"></textarea>
                                 </div>
                                 <div class="form-group">
                      <label for="exampleInputEmail1">Reaserch Date:</label>
                      <input type="date" class="form-control" id="research_date" name="research_date" aria-describedby="emailHelp">
                      
                    </div>

                     <div class="form-group">
                                         <label for="customFile">Research Image</label>
                                        <input type="file" class="form-control" id="research_image" name="research_image">
                       
                      </div> 

                      <div class="form-group">
                                         <label for="customFile">Research Pdf</label>
                                        <input type="file" class="form-control" id="research_pdf" name="research_pdf">
                       
                      </div> 
                 


                    <button type="button" class="btn btn-primary btn-fill" id="btnresearch">Submit</button>
                    <div id="msg"></div>

                  </form>
                </div>
              </div>
</div></div>



<?php include('footer.php');?>

<script>
$(document).ready(function() {
	$('#btnresearch').on('click', function() {

		var research_title = $('#research_title').val();
   var research_des= $('#research_des').val();
  var research_date=$('#research_date').val();
        var research_image=$('#research_image').get(0).files[0];
        var research_pdf=$('#research_pdf').get(0).files[0];

        var formData = new FormData();
        formData.append('research_title', research_title);
        formData.append('research_des', research_des);
        formData.append('research_date', research_date);
        formData.append('research_image', research_image);
        formData.append('research_pdf', research_pdf);
     

        // if(slider_title!="" && slider_description!="" && btn_name!="" && slider_image!="" ){
			$.ajax({
                
				url: "saveresearchreport.php",
				type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",

				success: function(data){
      


          if(data.code=="404"){
                    $('#msg').html('<p class="text-danger">'+data.msg+'</p>');
                }
                else{
                    $('#msg').html('<p class="text-success">'+data.msg+'</p>');
                    // purchase_product();
                   window.location.href="research_report.php";					

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