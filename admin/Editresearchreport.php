<?php include('header.php');?>


<?php
include_once 'config.php';

$result = mysqli_query($con,"SELECT * FROM research WHERE research_id  ='" . $_GET['research_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<div class="row mt-5">
    <div class="col-lg-9" style="margin-left:80px;">
        <h6 class="mb-3 font-weight-bold">Research Report Form</h6>

        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            </div>


            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <div class="card-body">
                <form id="addsid" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="research_id" id="research_id" value="<?php echo $row['research_id']; ?>">

                        <label for="exampleInputEmail1">Research Title:</label>
                        <input type="email" class="form-control" id="research_title" name="research_title"
                            aria-describedby="emailHelp" placeholder="Enter Report Title"
                            value="<?php echo $row['research_title']; ?>">

                    </div>

                    <div class="form-group">
                        <input type="hidden" name="research_id" id="research_id" value="<?php echo $row['research_id']; ?>">

                        <label for="exampleInputEmail1">Research Description:</label>
                        <input type="email" class="form-control" id="research_des" name="research_des"
                            aria-describedby="emailHelp" placeholder="Enter Report Description"
                            value="<?php echo $row['research_des']; ?>">

                    </div>
                    <div class="form-group">
                    <input type="hidden" name="research_id" id="research_id" value="<?php echo $row['research_id']; ?>">

                      <label for="exampleInputEmail1">Research Date:</label>
                      <input type="date" class="form-control" id="research_date" name="research_date" value="<?php echo $row['research_date']; ?>" aria-describedby="emailHelp">
                      
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Research Report Image</label>

                        <div class="hovercross img">
                            <a class="closeimg" onclick="$('.hovercross').hide();$('#research_image').show();">&times;</a>
                            <img src="daily_report/<?php echo $row['research_image']; ?>" height="100" width="100">
                        </div>
                        <input type="hidden" name="eimage" id="eimage" value="<?php echo $row['research_image']; ?>">
                        <input type="file" name="research_image" id="research_image" style="display:none;margin-top:8px;">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Research Report Pdf</label>

                        <div class="hoverimg img">
                            <a class="closeimg" onclick="$('.hoverimg').hide();$('#research_pdf').show();">&times;</a>
                            <img src="daily_report/<?php echo $row['research_pdf']; ?>" height="100" width="100">
                        </div>
                        <input type="hidden" name="eimage1" id="eimage1" value="<?php echo $row['research_pdf']; ?>">
                        <input type="file" name="research_pdf" id="research_pdf" style="display:none;margin-top:8px;">

                    </div>




                    <button type="button" class="btn btn-primary btn-fill" id="buteditresearch">Submit</button>
                    <div id="msg"></div>

                </form>
            </div>
        </div>
    </div>
</div>



<?php include('footer.php');?>

<script>
$(document).ready(function() {
    $('#buteditresearch').on('click', function() {
        var research_id = $('#research_id').val();

        var research_title = $('#research_title').val();
        var research_des = $('#research_des').val();
        var eimage = $('#eimage').val();
        var eimage1 = $('#eimage1').val();


        var research_image = $('#research_image').get(0).files[0];
        var research_pdf = $('#research_pdf').get(0).files[0];

        var formData = new FormData();
        formData.append('research_id', research_id);
        formData.append('research_title', research_title);
        formData.append('research_des', research_des);
        formData.append('research_image', research_image);
        formData.append('research_pdf', research_pdf);
        formData.append('eimage', eimage);
        formData.append('eimage1', eimage1);


        // if(slider_title!="" && slider_description!="" && btn_name!="" && slider_image!="" ){
        $.ajax({

            url: "updateresearchreport.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",

            success: function(data) {
                // var dataResult = JSON.parse(dataResult);
                // if(dataResult.statusCode==200){
                // 	$('#addsid').find('input:text').val('');
                // 	$("#success").show();
                // 	$('#success').html('Data added successfully !'); 	

                // }else if(dataResult.statusCode==201){
                //    alert("Error occured !");

                // }


                if (data.code == "404") {
                    $('#msg').html('<p class="text-danger">' + data.msg + '</p>');
                } else {
                    $('#msg').html('<p class="text-success">' + data.msg + '</p>');
                    // purchase_product();
                    window.location.href = "research_report.php";

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