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
                    <!-- <div class="row"> -->
                    <div class="card shadow mb-4">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 card-header py-3">
							<?php
								$idd = $_GET['id'];
								$titquery = "SELECT * FROM courses WHERE id = '$idd';";
                                $titquery_run = mysqli_query($conn, $titquery);
								$acc = mysqli_fetch_assoc($titquery_run);
								$title = $acc['gr_name'];
								
							?>
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo "$title";?> Members</h6>
							<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
							<i class="fas fa-plus fa-sm text-white-50"></i> Add User</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>User Name</th>
                                            <th>Department</th>
                                            <th>E-Mail</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $query = "SELECT * FROM student_courses WHERE course_id = $idd";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
										$previousValue = null;
										while ($row = mysqli_fetch_assoc($query_run)) {
											$student_id = $row['std_id']; // Replace 'your_column' with the actual column name

											// Check if the current value is different from the previous one
											if ($student_id !== $previousValue) {
												// Process the row or output the value
												$student_query = "SELECT * FROM user WHERE id = $student_id ORDER BY id ASC";
												$run_student = mysqli_query($conn, $student_query);
													if(mysqli_num_rows($run_student) > 0){
														$student = mysqli_fetch_assoc($run_student);
														$depts = $student['dept_id'];
														$first = $student['first_name'];
														$last = $student['last_name'];
														$user = $student['user_name'];
														$querydept = "SELECT * FROM departments WHERE id = $depts";
														$query_dept = mysqli_query($conn, $querydept);
														$deptt = mysqli_fetch_assoc($query_dept);
														$depart_name = $deptt['department_name'];
														$email = $student['email'];
														$role = $student['role_id'];
														$queryrole = "SELECT * FROM roles WHERE id = $role";
															$query_role = mysqli_query($conn, $queryrole);
															$roles = mysqli_fetch_assoc($query_role);
															$role_name = $roles['role_name'];
												?>
                                            <tr>
                                                <td><?= $student_id; ?></td>
                                                <td><?= $last; ?></td>
                                                <td><?= $user; ?></td>
                                                <td><?= $depart_name;?></td>
                                                <td><?= $email; ?></td>
                                                <td><?= $role_name; ?></td>
                                            </tr>
                                            <?php
													}
												// Update the previous value to the current one
												$previousValue = $student_id;
											}
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
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