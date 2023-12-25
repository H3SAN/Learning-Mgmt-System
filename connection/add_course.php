<?php
session_start();
include "db_conn.php";

$creator_id = $_SESSION['id'];
$creator = $_SESSION['username'];

if (isset($_POST['coursename']) && isset($_POST['describe'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $gname = validate($_POST['coursename']);
    $desc = validate($_POST['describe']);
    $ispublic = validate($_POST['ispublic']);
	
	if ($ispublic == "on"){
		$public = 1;
	}
	else {
		$public = 0;
	}
    

    if (empty($gname)) {
		header("Location: ../new_group.php?error=Course name is required");
	    exit();
	}else if(empty($desc)){
        header("Location: ../new_group.php?error=Please add a short description");
	    exit();
	}
    else{

		// hashing the password
        // $pass = md5($pass);

	    $sql = "SELECT * FROM courses WHERE gr_name='$gname'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../new_group.php?error=This Group already Exists!");
	        exit();
		}else {
           $sql2 = "INSERT INTO `courses` (`id`, `gr_name`, `created_by`, `creator_id`, `description`, `display_image`, `is_public`)
            VALUES (NULL, '$gname', '$creator', '$creator_id', '$desc','img/undraw_programmer_re_owql.svg', '$public')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
			   //Insert into the student_courses
			   $sql3 = "SELECT * FROM courses WHERE description = '$desc'";
			   $result3 = mysqli_query($conn, $sql3);
			   $row3 = mysqli_fetch_assoc($result3);
			   $cour_id = $row3['id'];
			   
			   $sql4 = "INSERT INTO `student_courses` (`id`, `std_id`, `course_id`) VALUES (NULL, '$creator_id', '$cour_id')";
			   $result4 = mysqli_query($conn, $sql4);
			   if($result4){
				   header("Location: ../new_group.php?success=Group has been created successfully");
					exit();
			   }
           }else {
	           	header("Location: ../new_group.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
} else {
    header("Location: ../new_group.php");
    exit();
}
