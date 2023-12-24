<?php
session_start();
include "connection/db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
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
                        <!-- Content Row -->
                        <div class="row justify-content-md-center">
                            <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    Add New course
                                </div>
                                <div class="card-body">
                                <h2>Course Registration Form</h2>
                                <form action="connection/add_course.php" method="post">
                                    <div class="row">
                                    <?php if (isset($_GET['error'])) { ?>
                                        <div class="form-group col-12">
     		                            <input type="text" class="form-control-plaintext danger" disabled value="<?php echo $_GET['error']; ?>">
                                        </div>
                                    <?php }
                                    elseif (isset($_GET['success'])){?>
                                    <div class="form-group col-12">
     		                            <input type="text" class="form-control-plaintext success" disabled value="<?php echo $_GET['success']; ?>">
                                    </div>
                                    <?php

                                    } ?>
                                    <!-- Course -->
                                    <div class="form-group col-12">
                                        <label for="studentName">Course Name:</label>
                                        <input type="text" class="form-control" id="CourseName" name="coursename" required>
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group col-12">
                                        <label for="studentName">Description:</label>
                                        <textarea rowa="3" class="form-control" id="describe" name="describe" required></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="ispublic">
                                                <label class="custom-control-label" for="customCheck">Set as Public</label>
                                            </div>
                                        </div>
                                    <!-- Submit Button -->
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                    </div>
                                </form>
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
} else {
    header("Location: login.php");
    exit();
}
?>
<style>
    /* styles.css */
.danger {
    color: #e74a3b; /* background color */
    /* Add any other styles you want */
}
.success {
    color: #1cc88a; /* background color */
    /* Add any other styles you want */
}
</style>