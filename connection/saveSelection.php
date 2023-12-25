<?
session_start();
include "db_conn.php";
echo 'hello';

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