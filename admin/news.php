<?php include('header.php');?>
<?php
include_once 'config.php';
$count = 0;
$result = mysqli_query($con,"SELECT * FROM news");
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <h4 class="card-title">News</h4>
                <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>  -->
            </div>
            <div class="col-lg-5 col-md-5 pull-right">
                <a class="btn btn-info btn-fill pull-right mt-4" href="addnewsReport.php">Add News Report</a>
            </div>
        </div>
        <!-- <div class="d-md-flex">
           
        </div> -->
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
                                    <th class="thead">News Title</th>
                                    <!-- <th class="thead">News Description</th> -->
                                    <th class="thead">News Image</th>
                                    <th class="thead">News Date</th>
                                    <th class="thead">News Pdf</th>
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
                                    <!-- <td><?php echo $row["news_id"]; ?></td> -->
                                    <td><?php echo $row["news_title"]; ?></td>
                                    <!-- <td><?php echo $row["news_des"]; ?></td> -->
                                    <td><?php echo $row["news_date"]; ?></td>
                                    <td><img src="news/<?php echo $row['news_image']; ?>" width="70" height="40"></td>
                                    <td>
                                    <a href="news/<?php echo $row['news_pdf']; ?>" target="_blank">
                                            <i class="fas fa-download text-info px-1"></i> </a>
                                </td>

                                    <td>
                                        <a href="#" style="font-size:12px;" class="text-danger" data-toggle="modal"
                                            data-target="#deletenewsreportModal_<?php echo $row["news_id"]; ?>">
                                            <!-- <i class="fa fa-trash-o" style="font-size:22px;color:#f57a64;padding-right:6px;"></i> -->
                                            <i class='fas fa-trash-alt' style='font-size:22px'></i>

                                        </a>

                                        <a href="Editnewsreport.php?news_id=<?php echo $row["news_id"]; ?>"><i
                                                class="fa fa-edit ml-2"
                                                style="font-size:22px;color:green;"></i></a>&nbsp;&nbsp;


                                        <!-- Modal -->
                                        <div id="deletenewsreportModal_<?php echo $row["news_id"]; ?>"
                                            class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h4>Are you sure you want to delete this?</h4>
                                                        <button type="button" class="delete_slider btn btn-danger"
                                                            value="<?php echo $row["news_id"]; ?>">Yes</button>
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
                var news_id = $(this).val();
                //alert(slider_id);
                $.ajax({
                    url: "deletenewsdetails.php",
                    data: {
                        'news_id': news_id
                    },
                    type: "post",

                    success: function(response) {

                        //alert("hii");
                        window.location.reload(true);
                    }
                });
            });
            </script>