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

        <title><?php echo $_SESSION['username'] ?> - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Courses</h1>
                        </div>
                        <!-- Content Row -->
                        <div class="row">
                            <?php
                            $main_id = $_SESSION['id'];
                            $sql = "SELECT * FROM student_courses WHERE std_id = '$main_id'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) !== 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // To get the information on the course
                                    $course_id = $row["course_id"];
                                    $sql1 = "SELECT * FROM courses WHERE id = '$course_id'";
                                    $result1 = mysqli_query($conn, $sql1);
                                    $row1 = mysqli_fetch_assoc($result1);
                                    $cname = $row1["gr_name"];
                                    $desc = $row1["description"];
									$img = $row1["display_image"];
                            ?>
                                    <!-- Courses dropdown -->
                                    <div class="col-lg-4">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Dropdown -->
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary"><?php echo $cname;?></h6>
                                                <div class="dropdown no-arrow">
                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div <?php echo $permit2;?> class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="addto_group.php?id=<?php echo $course_id;?>">View Members</a>
                                                        <a class="dropdown-item" href="#">Manage Course</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" style="color: #e74a3b;" href="#">Delete Group</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem; height: 10rem;" src="<?php echo "$img";?>" alt="...">
                                                </div>
                                                <p style="white-space: nowrap;
													overflow: hidden;
													text-overflow: ellipsis;
													max-width: 250px; "><?php echo $desc ?></p>
                                                <!-- <a target="_blank" rel="nofollow" href="course_view.php?course_id=<?php echo $course_id?>">Open course &rarr;</a> -->
												<a href="course_view.php?course_id=<?php echo $course_id?>">Open course &rarr;</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Courses dropdown end -->
									
                            <?php
                                }
                            }
                            ?>
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
} else {
    header("Location: login.php");
    exit();
}
?>