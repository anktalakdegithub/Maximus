<?php include('header.php');?>

<div class="container">
<div class="row mt-5">
    <div class="col-lg-12">
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
                        <label for="exampleInputEmail1">Report Title:</label>
                        <input type="text" class="form-control" id="report_title" name="report_title"
                            aria-describedby="emailHelp" placeholder="Enter Report Title">

                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Report Description:</label>
                        <input type="text" class="form-control" id="report_des" name="report_des"
                            aria-describedby="emailHelp" placeholder="Enter Report Description">

                    </div>

                    <div class="form-group">
                        <label for="customFile">Report Image</label>
                        <input type="file" class="form-control" id="report_image" name="report_image">

                    </div>

                    <div class="form-group">
                        <label for="customFile">Report Pdf</label>
                        <input type="file" class="form-control" id="report_pdf" name="report_pdf">

                    </div>



                    <button type="button" class="btn btn-primary btn-fill" id="butaddslider">Submit</button>
                    <div id="msg"></div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php include('footer.php');?>

<script>
$(document).ready(function() {
    $('#butaddslider').on('click', function() {

        var report_title = $('#report_title').val();
        var report_des = $('#report_des').val();

        var report_image = $('#report_image').get(0).files[0];
        var report_pdf = $('#report_pdf').get(0).files[0];

        var formData = new FormData();
        formData.append('report_title', report_title);
        formData.append('report_des', report_des);
        formData.append('report_image', report_image);
        formData.append('report_pdf', report_pdf);


        // if(slider_title!="" && slider_description!="" && btn_name!="" && slider_image!="" ){
        $.ajax({

            url: "savedailyreport.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",

            success: function(data) {
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