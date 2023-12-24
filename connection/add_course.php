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
    

    if (empty($gname)) {
		header("Location: ../new_group.php?error=First Name is required");
	    exit();
	}else if(empty($desc)){
        header("Location: ../new_group.php?error=Last Name is required&$user_data");
	    exit();
	}
	else if(empty($ispublic)){
        header("Location: ../new_group.php?error=Email is required&$user_data");
	    exit();
	}
    else{

		// hashing the password
        // $pass = md5($pass);

	    $sql = "SELECT * FROM courses WHERE gr_name='$coursename'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../new_group.php?error=This Group already Exists!");
	        exit();
		}else {
           $sql2 = "INSERT INTO `courses` (`id`, `gr_name`, `created_by`, `creator_id`, `description`, `is_public`)
            VALUES (NULL, '$gname', '$creator', '$creator_id', '$desc', '$public')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../new_group.php?success=Group has been created successfully");
	         exit();
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
