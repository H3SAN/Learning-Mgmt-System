<?php 
session_start();

include "connection/db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $usernmame = $_SESSION['username'];
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
					<!-- Create Modal -->
					<!-- Nav main -->
					    <div class="col-xl-3 col-lg-3">
							<div class="mb-4">
								<div class="d-sm-flex align-items-center justify-content-between mb-4">
									<h3 class="h5 mb-0 text-gray-800">Chats</h3>
								</div>
								<hr class="sidebar-divider d-none d-md-block">
								<ul class="navbar-nav" role="tablist">
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
									<li class="nav-item hover-div" role="presentation">
										<div class="mb-0">
											<div class="row">
												<div class="col-lg-2 mb-4"><img class="img-profile rounded-circle" style="height: 35px; width: 35px;" src="img/undraw_profile.svg"></div>
												<div class="col-lg-10 mb-4">
													<div class=" col-lg-12 font-weight-bold">Mike Johnson</div>
													<div class=" col-lg-12 text-50 small">Hey, i wanted to check up on that assignm...</div>
												</div>
											</div>
										</div>
									</li>
									<li class="nav-item hover-div" role="presentation">
										<div class="mb-0">
											<div class="row">
												<div class="col-lg-2 mb-4"><img class="img-profile rounded-circle" style="height: 35px; width: 35px;" src="img/undraw_profile_1.svg"></div>
												<div class="col-lg-10 mb-4">
													<div class=" col-lg-12 font-weight-bold">Frank Lithman</div>
													<div class="col-lg-12 text-50 small">Where did you say i should check for the...</div>
												</div>
											</div>
										</div>
									</li>
									<li class="nav-item hover-div" role="presentation">
										<div class="mb-0">
											<div class="row">
												<div class="col-lg-2 mb-4"><img class="img-profile rounded-circle" style="height: 35px; width: 35px;" src="img/undraw_profile_2.svg"></div>
												<div class="col-lg-10 mb-4">
													<div class=" col-lg-12 font-weight-bold">John Greea</div>
													<div class=" col-lg-12 text-50 small">Thanks, ive recieved the data. I should be...</div>
												</div>
											</div>
										</div>
									</li>
									<li class="nav-item hover-div" role="presentation">
										<div class="mb-0">
											<div class="row">
												<div class="col-lg-2 mb-4"><img class="img-profile rounded-circle" style="height: 35px; width: 35px;" src="img/undraw_profile_3.svg"></div>
												<div class="col-lg-10 mb-4">
													<div class=" col-lg-12 font-weight-bold">Robert Ackerman</div>
													<div class=" col-lg-12 text-50 small">This is the link to the better version of...</div>
												</div>
											</div>
										</div>
									</li>
									<li class="nav-item hover-div" role="presentation">
										<div class="mb-0">
											<div class="row">
												<div class="col-lg-2 mb-4"><img class="img-profile rounded-circle" style="height: 35px; width: 35px;" src="img/undraw_profile_1.svg"></div>
												<div class="col-lg-10 mb-4">
													<div class=" col-lg-12 font-weight-bold">Jennifer Daltons</div>
													<div class=" col-lg-12 text-50 small">Hey, i wanted to check up on that assignm...</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					<!-- channel main -->
					    <div class="col-xl-9 col-lg-9">
							<div style="height: 500px;" class="card shadow mb-4">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-6 mb-4">
										<div class="card bg-light text-black shadow">
											<div class="card-body">
													<h6 class="m-0 text">Philosophy is the study of fundamental questions concerning existence, knowledge, values, reason, mind, and language. It explores abstract and conceptual aspects of human experience, aiming to deepen our understanding of the world and our place in it. </h6>
												<div class="text-black-50 small">12:24</div>
											</div>
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

</body>

</html>
<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>