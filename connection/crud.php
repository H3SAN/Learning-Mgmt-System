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

if(isset($_GET['stdid'])& isset($_GET['course_id']))
{
    $course_id = mysqli_real_escape_string($conn, $_GET['course_id']);
    $student_id = mysqli_real_escape_string($conn, $_GET['stdid']);

    $sql2 = "INSERT INTO `student_courses` (`std_id`, `course_id`)
            VALUES ('$student_id', '$course_id')";
    $result2 = mysqli_query($conn, $sql2);

    if($result2)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: ../addto_group.php?id=$course_id");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: ../role_edit.php");
        exit(0);
    }

}

if(isset($_POST['c_id'])& isset($_POST['channel']))
{
    $course_id = mysqli_real_escape_string($conn, $_POST['c_id']);
    $channel = mysqli_real_escape_string($conn, $_POST['channel']);
	
	echo $course_id;
	echo $channel;
    $sql2 = "INSERT INTO `channels` (`sub_gr_name`, `gr_id`)
            VALUES ('$channel', '$course_id')";
    $result2 = mysqli_query($conn, $sql2);

    if($result2)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: ../course_view.php?course_id=$course_id");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: ../course_view.php");
        exit(0);
    }

}

if(isset($_POST['c_id']) & isset($_POST['std_id']))
{
    $course_id = mysqli_real_escape_string($conn, $_POST['c_id']);
    $student = mysqli_real_escape_string($conn, $_POST['std_id']);
	
	echo $course_id;
    $sql2 = "INSERT INTO `student_courses` (`id`, `std_id`, `course_id`)
            VALUES (NULL, '$student', '$course_id')";
    $result2 = mysqli_query($conn, $sql2);

    if($result2)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: ../addto_group.php?id=$course_id");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: ../addto_group.php?id=$course_id");
        exit(0);
    }

}
else {
	echo 'not showing up';
}
?>