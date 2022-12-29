<?php
$page_title='Research Report - Maximus Securities Limited';

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
$result1 = mysqli_query($con,"SELECT * FROM `research` ORDER BY research_id DESC LIMIT $start_from, $limit");

?>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Research Report</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Research Report </span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row mb-4">
            <?php 
        $i=0;
        while($row=mysqli_fetch_array($result1)) {
          // print_r($row);die();
        
    ?>
            <div class="col-md-6 col-lg-4 ftco-animate mb-1">
                <div class="blog-entry h-100">
                    <a href="blog-single.html" class="block-20 d-flex align-items-end"
                        style="background-image: url('admin/daily_report/<?php echo $row['research_image']; ?>');">

                    </a>
                    <div class="text border border-top-0 p-4 h-50">
                        <h3 class="heading"><a href="#"><?php echo $row['research_title']; ?></a></h3>
                        <p>
                            <?php
                                $string=$row["research_des"];
                                if (strlen($string) > 10) {
                                    $trimstring = substr($string, 0, 100). '...';
                                    } else {
                                    $trimstring = $string;
                                    }
                                    echo $trimstring;
   
                                                  ?>
                        </p>
                        <p>
                        <b>Date: </b>    
                        <?php echo $row['research_date']; ?></p>
                        <div class="d-flex align-items-center mt-4">
                            <p class="mb-0">
                                <a class="btn btn-primary"
                                    href="admin/daily_report/<?php echo $row['research_pdf']; ?>">Read More <span
                                        class="ion-ios-arrow-round-forward"></span></a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <?php $i++;} ?>

        </div>
        <?php  

$result_db = mysqli_query($con,"SELECT COUNT(report_id) FROM daily_reports"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 

?>
	<?php if (ceil($total_records / $limit) > 0): ?>
			<ul class="pagination ">
				<?php if ($page > 1): ?>
				<li class="prev mx-1 btn btn-primary text-white"><a class="text-light" href="blog.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start mx-1 btn btn-light"><a href="blog.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page mx-1 btn btn-light"><a href="blog.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page mx-1 btn btn-light"><a href="blog.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage mx-1 btn btn-primary"><a class="text-light" href="blog.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_records / $limit)+1): ?><li class="page mx-1 btn btn-light"><a href="blog.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_records / $limit)+1): ?><li class="page mx-1 btn btn-light"><a href="blog.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_records / $limit)-2): ?>
				<li class="dots">...</li>
				<li class="end  mx-1 btn btn-light"><a href="blog.php?page=<?php echo ceil($total_records / $limit) ?>"><?php echo ceil($total_records / $limit) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_records / $limit)): ?>
				<li class="next mx-1 btn btn-primary "><a class="text-light" href="blog.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
    </div>
</section>
<?php include('footer.php');?>