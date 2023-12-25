<?php
session_start();
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname = validate($_POST['firstname']);
    $lname = validate($_POST['lastname']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $dob = validate($_POST['dob']);
    $dept = validate($_POST['dept']);
    $usename = validate($_POST['username']);
    $role = validate($_POST['role']);

    if (empty($fname)) {
		header("Location: ../new_user.php?error=First Name is required");
	    exit();
	}else if(empty($lname)){
        header("Location: ../new_user.php?error=Last Name is required&$user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: ../new_user.php?error=Email is required&$user_data");
	    exit();
	}
	else if(empty($usename)){
        header("Location: ../new_user.php?error=Username is required&$user_data");
	    exit();
	}
    else if(empty($password)){
        header("Location: ../new_user.php?error=Passoword is required&$user_data");
	    exit();
	}
    else if(empty($dob)){
        header("Location: ../new_user.php?error=Date of Birth is required&$user_data");
	    exit();
	}
    else if(empty($dept)){
        header("Location: ../new_user.php?error=Department is required&$user_data");
	    exit();
	}
    else{

		// Encrypting the Password
		$salt = date('Ymd');
		
		// Combine the password and salt
		$passwordWithSalt = $password . $salt;
		
		
		// Hash the password using DES
		$hashedPassword = crypt($passwordWithSalt, $salt);

		// Check if Username is taken
	    $sql = "SELECT * FROM user WHERE user_name='$usename' AND email='$email'";
		$result = mysqli_query($conn, $sql);
		$acc = mysqli_fetch_assoc($result);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../new_user.php?error=This Account already exist!");
	        exit();
		}else {
           $sql2 = "INSERT INTO `user` (`id`, `user_name`, `first_name`, `last_name`, `date_of_birth`, `role_id`, `dept_id`, `email`, `password`, `salt`, `date_created`)
            VALUES (NULL, '$usename', '$fname', '$lname', '$dob', '$role', '$dept', '$email', '$hashedPassword',  '$salt', current_timestamp())";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../new_user.php?success=Account has been created successfully");
	         exit();
           }else {
	           	header("Location: ../new_user.php?error=unknown error occurred");
		        exit();
           }
		}
	}
} else {
    header("Location: ../new_user.php");
    exit();
}
