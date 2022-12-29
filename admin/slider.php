<?php include('header.php');?>
<?php
include_once 'config.php';
$count = 0;
$result = mysqli_query($con,"SELECT * FROM slider_images");
?>
<div class="content">
                <div class="container-fluid">

                <div class="d-md-flex">
                     <h4 class="card-title">Slider</h4>
                     <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>  -->

                        <a class="btn btn-info btn-fill mb-3 slider-btn" href="addslider.php" >Add Slider</a>
                        </div>
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
                                        <thead >
                                        <tr >
                                            <th class="thead"  >ID</th>
                                            <th class="thead">Slider Title</th>
                                            <th class="thead">Slider Image</th>
                                            <th class="thead">Slider subtitle</th>
                                            <th class="thead">Slider Button Text</th>
                                            <th class="thead">Slider Button Link</th>
                                            <th class="thead">Status</th>
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
<!-- <td><?php echo $row["slider_id"]; ?></td> -->
<td><?php echo $row["slider_title"]; ?></td>
<td><img src="uploads/<?php echo $row['slider_img']; ?>" width="70" height="40"></td>
<td><?php echo $row["slider_subtitle"]; ?></td>
<td><?php echo $row["slider_button_text"]; ?></td>
<td><?php echo $row["slider_button_link"]; ?></td>

<td>   <label class="switch">
                                            <input type="checkbox" class="slider_status" <?php if($row['status']==1){ echo "checked" ;} ?> value="<?=$row['slider_id'];?>">
                                            <span class="slider round" style=""></span>
                                        </label>
</td>
<td>
<a href="#" style="font-size:12px;" class="text-danger" data-toggle="modal" data-target="#deletesliderModal_<?php echo $row["slider_id"]; ?>">
                <!-- <i class="fa fa-trash-o" style="font-size:22px;color:#f57a64;padding-right:6px;"></i> -->
                <i class='fas fa-trash-alt' style='font-size:22px'></i>

                </a>    

                <a href="Editslider.php?slider_id=<?php echo $row["slider_id"]; ?>"><i class="fa fa-edit ml-2" style="font-size:22px;color:green;"></i></a>&nbsp;&nbsp;

                
 <!-- Modal -->
 <div id="deletesliderModal_<?php echo $row["slider_id"]; ?>" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                
                       <!-- Modal content-->
                            <div class="modal-content">
                                          <div class="modal-body">
                                            <h4>Are you sure you want to delete this?</h4>
                                            <button type="button" class="delete_slider btn btn-danger" value="<?php echo $row["slider_id"]; ?>">Yes</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                          
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

$('body').on('click','.delete_slider',function()
{
    // alert("hii");
    var slider_id=$(this).val();
    //alert(slider_id);
    $.ajax({
        url:"deleteslider.php",
        data: {'slider_id': slider_id},
        type: "post",
        
        success:function(response) {
          
           //alert("hii");
          window.location.reload(true);          
        }
    });
});

    </script>




<script>
$('.slider_status').click(function(){
    
    var slider_id=$(this).val();
//    alert(slider_id);
     $.ajax({
	 	url: "updateStatus.php",
		type  : "POST",
         data  : { slider_id: slider_id}, 
      
	 	success: function(data){

      window.location.reload(true);          
                        
		
            
	 	}
});
});
</script>