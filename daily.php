<?php 
$page_title='Daily - Maximus Securities Limited';

$page_description='We are a broking firm which provides you truly personalized services as per your requirment on demand. ';

$page_keywords='Securities, maximus, Personalized, client, share markets';

include_once 'config.php';
include('header.php');
$limit = 6;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
$result1 = mysqli_query($con,"SELECT * FROM daily_reports ORDER BY report_id DESC LIMIT $start_from, $limit");

?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Daily Report</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Daily Report</span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters justify-content-center mb-5">
            <div class="col-md-6 text-center heading-section ftco-animate">
                <span class="subheading">Report</span>
                <h2 class="mb-4">Daily Report</h2>
               
            </div>
        </div>
        <div class="row">
            <?php
            $i=0;
            while($row=mysqli_fetch_array($result1)) {
       
            ?>
            <div class="col-md-4">
                <div class="project">
                    <div class="img rounded mb-4" style="background-image: url(admin/daily_report/<?php echo $row['report_image']; ?>);"></div>
                    <div class="text w-100 text-center">
                        <!-- <span class="cat">Consulting</span> -->
                        <h3><?php echo $row["report_title"]; ?></h3>
						
                        <p>
						<?php
                                $string=$row["report_des"];
                                if (strlen($string) > 10) {
                                    $trimstring = substr($string, 0, 100). '...';
                                    } else {
                                    $trimstring = $string;
                                    }
                                    echo $trimstring;
   
                                                  ?>
					</p>
						<a class="btn btn-primary" target="_blank" href="admin/daily_report/<?php echo $row['report_pdf']; ?>">Read More</a>
						
                    </div>
                </div>
            </div>
            <?php
$i++;
}
?>

            <!-- <div class="col-md-4">
        		<div class="project">
        			<div class="img rounded mb-4" style="background-image: url(images/project-2.jpg);"></div>
        			<div class="text w-100 text-center">
        				<span class="cat">Marketing</span>
        				<h3><a href="#">Consultacy Solutions</a></h3>
        				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
        			</div>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="project">
        			<div class="img rounded mb-4" style="background-image: url(images/project-3.jpg);"></div>
        			<div class="text w-100 text-center">
        				<span class="cat">Financing</span>
        				<h3><a href="#">Consultacy Solutions</a></h3>
        				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
        			</div>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="project">
        			<div class="img rounded mb-4" style="background-image: url(images/project-4.jpg);"></div>
        			<div class="text w-100 text-center">
        				<span class="cat">Audit &amp; Taxes</span>
        				<h3><a href="#">Consultacy Solutions</a></h3>
        				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
        			</div>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="project">
        			<div class="img rounded mb-4" style="background-image: url(images/project-5.jpg);"></div>
        			<div class="text w-100 text-center">
        				<span class="cat">Financing</span>
        				<h3><a href="#">Consultacy Solutions</a></h3>
        				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
        			</div>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="project">
        			<div class="img rounded mb-4" style="background-image: url(images/project-6.jpg);"></div>
        			<div class="text w-100 text-center">
        				<span class="cat">Real Estate</span>
        				<h3><a href="#">Consultacy Solutions</a></h3>
        				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
        			</div>
        		</div>
        	</div> -->
        </div>
		<?php  

$result_db = mysqli_query($con,"SELECT COUNT(report_id) FROM daily_reports"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
// $pagLink = "<ul class='pagination'>";  
// for ($i=1; $i<=$total_pages; $i++) {
//               $pagLink .= "<li class='page-item'><a class='page-link' href='daily.php?page=".$i."'>".$i."</a></li>";	
// }
// echo $pagLink . "</ul>";  
?>
	<?php if (ceil($total_records / $limit) > 0): ?>
			<ul class="pagination ">
				<?php if ($page > 1): ?>
				<li class="prev mx-1 btn btn-primary text-white"><a class="text-light" href="daily.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start mx-1 btn btn-light"><a href="daily.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page mx-1 btn btn-light"><a href="daily.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page mx-1 btn btn-light"><a href="daily.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage mx-1 btn btn-primary"><a class="text-light" href="daily.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_records / $limit)+1): ?><li class="page mx-1 btn btn-light"><a href="daily.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_records / $limit)+1): ?><li class="page mx-1 btn btn-light"><a href="daily.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_records / $limit)-2): ?>
				<li class="dots">...</li>
				<li class="end  mx-1 btn btn-light"><a href="daily.php?page=<?php echo ceil($total_records / $limit) ?>"><?php echo ceil($total_records / $limit) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_records / $limit)): ?>
				<li class="next mx-1 btn btn-primary "><a class="text-light" href="daily.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
    </div>
</section>
<?php include('footer.php');?>