<?php include('header.php');?>
<?php
include_once 'config.php';
$count = 0;
$result = mysqli_query($con,"SELECT * FROM research");
?>
<div class="content">
    <div class="container-fluid">

        <!-- <div class="d-md-flex"> -->
            <div class="row my-2">
                <div class="col-lg-7 col-md-7">
                    <h4 class="card-title">Research Report</h4>
                    <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>  -->
                </div>
                <div class="col-lg-5 col-md-5 d-flex justify-content-end">
                    <a class="btn btn-info btn-fill mt-4" href="addresearchReport.php"
                        style="margin-left:420px!important;">Add Research Report</a>
                </div>
            </div>
        <!-- </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">

                    </div>

                    <?php
if (mysqli_num_rows($result) > 0) {
?>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="thead">ID</th>
                                    <th class="thead">Report Title</th>
                                    <!-- <th class="thead">Report Description</th> -->
                                    <!-- <th class="thead">Date</th> -->
                                    <th class="thead">Report Image</th>
                                    <th class="thead">Report Pdf</th>
                                    <th class="thead">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                        $count+=1;


                                    ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <!-- <td><?php echo $row["research_id"]; ?></td> -->
                                    <td><?php echo $row["research_title"]; ?></td>
                                    <!-- <td><?php echo $row["research_des"]; ?></td> -->
                                    <!-- <td><?php echo $row["research_date"];?></td> -->
                                    <td><img src="daily_report/<?php echo $row['research_image']; ?>" width="70"
                                            height="40"></td>
                                    <td>
                                        <a href="daily_report/<?php echo $row['research_pdf']; ?>" target="_blank">
                                            <i class="fa fa-download text-info px-1"></i> </a>
                                    </td>

                                    <td>
                                        <a href="#" style="font-size:12px;" class="text-danger" data-toggle="modal"
                                            data-target="#deletedailyreportModal_<?php echo $row["research_id"]; ?>">
                                            <!-- <i class="fa fa-trash-o" style="font-size:22px;color:#f57a64;padding-right:6px;"></i> -->
                                            <i class='fa fa-trash' style='font-size:22px'></i>

                                        </a>

                                        <a href="Editresearchreport.php?research_id=<?php echo $row["research_id"]; ?>"><i
                                                class="fa fa-edit ml-2"
                                                style="font-size:22px;color:green;"></i></a>&nbsp;&nbsp;


                                        <!-- Modal -->
                                        <div id="deletedailyreportModal_<?php echo $row["research_id"]; ?>"
                                            class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h4>Are you sure you want to delete this?</h4>
                                                        <button type="button" class="delete_slider btn btn-danger"
                                                            value="<?php echo $row["research_id"]; ?>">Yes</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">No</button>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!--End Modal -->
                                    </td>



                                </tr>


                                <!--End Modal -->
                                <?php
$i++;
}
?>

                            </tbody>
                        </table>
                        <?php
}
else{
    echo "No result found";
}
?>
                    </div>
                </div>
            </div>
            <?php include('footer.php');?>



            <script>
            $('body').on('click', '.delete_slider', function() {
                // alert("hii");
                var research_id = $(this).val();
                //alert(slider_id);
                $.ajax({
                    url: "deleteresearchdetails.php",
                    data: {
                        'research_id': research_id
                    },
                    type: "post",

                    success: function(response) {

                        //alert("hii");
                        window.location.reload(true);
                    }
                });
            });
            </script>