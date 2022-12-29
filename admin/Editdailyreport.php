<?php include('header.php');?>


<?php
include_once 'config.php';

$result = mysqli_query($con,"SELECT * FROM daily_reports WHERE report_id  ='" . $_GET['report_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<div class="row mt-5">
    <div class="col-lg-9" style="margin-left:80px;">
        <h6 class="mb-3 font-weight-bold">Daily Report Form</h6>

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
                        <input type="hidden" name="report_id" id="report_id" value="<?php echo $row['report_id']; ?>">

                        <label for="exampleInputEmail1">Report Title:</label>
                        <input type="email" class="form-control" id="report_title" name="report_title"
                            aria-describedby="emailHelp" placeholder="Enter Report Title"
                            value="<?php echo $row['report_title']; ?>">

                    </div>

                    <div class="form-group">
                        <input type="hidden" name="report_id" id="report_id" value="<?php echo $row['report_id']; ?>">

                        <label for="exampleInputEmail1">Report Description:</label>
                        <input type="email" class="form-control" id="report_des" name="report_des"
                            aria-describedby="emailHelp" placeholder="Enter Report Description"
                            value="<?php echo $row['report_des']; ?>">

                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Daily Report Image</label>

                        <div class="hovercross img">
                            <a class="closeimg" onclick="$('.hovercross').hide();$('#report_image').show();">&times;</a>
                            <img src="daily_report/<?php echo $row['report_image']; ?>" height="100" width="100">
                        </div>
                        <input type="hidden" name="eimage" id="eimage" value="<?php echo $row['report_image']; ?>">
                        <input type="file" name="report_image" id="report_image" style="display:none;margin-top:8px;">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Daily Report Pdf</label>

                        <div class="hoverimg img">
                            <a class="closeimg" onclick="$('.hoverimg').hide();$('#report_pdf').show();">&times;</a>
                            <img src="daily_report/<?php echo $row['report_pdf']; ?>" height="100" width="100">
                        </div>
                        <input type="hidden" name="eimage1" id="eimage1" value="<?php echo $row['report_pdf']; ?>">
                        <input type="file" name="report_pdf" id="report_pdf" style="display:none;margin-top:8px;">

                    </div>




                    <button type="button" class="btn btn-primary btn-fill" id="butaddslider">Submit</button>
                    <div id="msg"></div>

                </form>
            </div>
        </div>
    </div>
</div>



<?php include('footer.php');?>

<script>
$(document).ready(function() {
    $('#butaddslider').on('click', function() {
        var report_id = $('#report_id').val();

        var report_title = $('#report_title').val();
        var report_des = $('#report_des').val();
        var eimage = $('#eimage').val();
        var eimage1 = $('#eimage1').val();


        var report_image = $('#report_image').get(0).files[0];
        var report_pdf = $('#report_pdf').get(0).files[0];

        var formData = new FormData();
        formData.append('report_id', report_id);
        formData.append('report_title', report_title);
        formData.append('report_des', report_des);
        formData.append('report_image', report_image);
        formData.append('report_pdf', report_pdf);
        formData.append('eimage', eimage);
        formData.append('eimage1', eimage1);


        // if(slider_title!="" && slider_description!="" && btn_name!="" && slider_image!="" ){
        $.ajax({

            url: "updatedailyreport.php",
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
                    window.location.href = "daily_report.php";

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