<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM user WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: role_edit.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: role_edit.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);


    $query = "UPDATE user SET first_name='$firstname', last_name='$lastname', user_name='$username', email='$email', 
	date_of_birth='$dob', dept_id='$dept', password='$password', role_id='$role' WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: ../role_edit.php?success='User Successfully updated'");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: ../role_edit.php");
        exit(0);
    }

}
?>