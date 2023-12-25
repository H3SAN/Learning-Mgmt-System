<?php 
session_start();

include "connection/db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $usernmame = $_SESSION['username'];
	
	$c_id = $_GET['course_id'];
	$titquery = "SELECT * FROM courses WHERE id = '$c_id';";
	$titquery_run = mysqli_query($conn, $titquery);
	$acc = mysqli_fetch_assoc($titquery_run);
	$title = $acc['gr_name'];
	$images = $acc['display_image'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_SESSION['username']?> - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- SideBar -->
            <?php include "layout/nav_bar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
			
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "layout/top_bar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
					<!-- Create channel Modal -->
					<div class="modal fade" id="channelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<form action="connection/crud.php" method="post">
										<div class="row">
										
										<!-- Course -->
										<div class="form-group col-12">
											<label for="studentName">Channel Name:</label>
											<input type="text" class="form-control" id="CourseName" name="channel" required>
										</div>

										<!-- Description -->
										<div class="form-group col-12">
											<!-- <label for="studentName">Description:</label> -->
											<input type="text" class="form-control" id="CourseName" hidden name="c_id" value="<?php echo $c_id;?>" required>
										</div>
										<!-- Submit Button -->
										<div class="form-group col-lg-4">
											<button type="submit" class="btn btn-success">Register</button>
										</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Nav main -->
					    <div class="col-xl-3 col-lg-3">
							<div class="mb-4">
								<div class="text-center">
									<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo $images;?>" alt="...">
								</div>
								<div class="d-sm-flex align-items-center justify-content-between mb-4">
									<h3 class="h5 mb-0 text-gray-800"><?php echo "$title";?></h3>
									<div <?php echo $permit2;?> class="dropdown no-arrow">
                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#channelModal" href="#">Create New Channel</a>
														<a class="dropdown-item" href="addto_group.php?id=<?php echo $c_id;?>">View Members</a>
														<a class="dropdown-item" data-toggle="modal" data-target="#membermodal" href="#">Add a new Member</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" style="color: #e74a3b;" href="#">Remove Channel</a>
                                                    </div>
                                                </div>
								</div>
								<hr class="sidebar-divider d-none d-md-block">
								<ul class="sidebar navbar-nav" role="tablist">
									<style>
										.hover-div {
											line-height: 23px;
											cursor: pointer;
											border-radius: 6px;
											/* Set initial style (without hover) */
											transition: background-color 0.3s;
										}

										/* Define the hover style for the div */
										.hover-div:hover {
											background-color: #ffffff;
											color: #000000;
										}
									</style>
									<li class="nav-item hover-div mb-2" role="presentation">
										General
									</li>
									<?php
										$sql3 = "SELECT * FROM channels WHERE gr_id = '$c_id'";
										$chquery = mysqli_query($conn, $sql3);
										if (mysqli_num_rows($chquery) !== 0) {
											while ($row1 = mysqli_fetch_assoc($chquery)) {
												$ch_name = $row1["sub_gr_name"];
										?>
										<li class="nav-item hover-div mb-2">
											<?php echo $ch_name; ?>
										</li>
									<?php
										}
									}
									?>
								</ul>
							</div>
						</div>
					<!-- channel main -->
					    <div class="col-xl-9 col-lg-9">
							<div class="card shadow mb-4">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-0">
											<img class="img-profile rounded-circle" style="height: 45px; width: 45px;" src="img/undraw_profile.svg">
										</div>
										<div class="col-lg-11">
											<div class="mb-2">
												<h6 class="m-0 font-weight-bold text-primary">Hyeladi Malgwi 19:26</h6>
											</div>
											<div>
												<h6 class="m-0 text">Philosophy is the study of fundamental questions concerning existence, knowledge, values, reason, mind, and language. It explores abstract and conceptual aspects of human experience, aiming to deepen our understanding of the world and our place in it. </h6>
											</div>
											<div>
												<h6 class="m-0 text-white">Philosophy is the study of fundamental questions concerning existence, knowledge, values, reason, mind, and language. It explores abstract and conceptual aspects of human experience, aiming to deepen our understanding of the world and our place in it. </h6>
											</div>
											<div>
												<h6 class="m-0 text-white">Philosophy is the study of fundamental questions concerning existence, knowledge, values, reason, mind, and language. It explores abstract and conceptual aspects of human experience, aiming to deepen our understanding of the world and our place in it. </h6>
											</div>
											<div>
												<h6 class="m-0 text-white">Philosophy is the study of fundamental questions concerning existence, knowledge, values, reason, mind, and language. It explores abstract and conceptual aspects of human experience, aiming to deepen our understanding of the world and our place in it. </h6>
											</div>
											<div>
												<h6 class="m-0 text-white">Philosophy is the study of fundamental questions concerning existence, knowledge, values, reason, mind, and language. It explores abstract and conceptual aspects of human experience, aiming to deepen our understanding of the world and our place in it. </h6>
											</div>
											<div>
												<h6 class="m-0 text-white">Philosophy is the study of fundamental questions concerning existence, knowledge, values, reason, mind, and language. It explores abstract and conceptual aspects of human experience, aiming to deepen our understanding of the world and our place in it. </h6>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Reply
								 </div>
							</div>
						</div>
                    </div>
                </div>
                <!-- End Page Contents -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; EMU CMSE 353 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
	
	<!-- jQuery for handling selection change -->
<script>
    $(document).ready(function() {
        $('#exampleSelect').on('change', function() {
            var selectedValues = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'saveSelection.php?=$_GET['course_id'];', // Replace with your server-side script URL
                data: { selectedValues: selectedValues },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

</body>

</html>
<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>