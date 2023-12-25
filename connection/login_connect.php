<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: ../login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../login.php?error=Password is required");
	    exit();
	}else{
		//checking encrypted password
		$hashquery = "SELECT * FROM user WHERE email = '$email'";
		$qresult = mysqli_query($conn, $hashquery);
		$row = mysqli_fetch_assoc($qresult);
		$salt = $row['salt'];
		$hashedPassword = $row['password'];
		
		$enteredPassword = '$pass';
		// Combine the entered password and retrieved salt
		$enteredPasswordWithSalt = $enteredPassword.$salt;
		
		// Hash the entered password using DES
		$hashedEnteredPassword = crypt($enteredPasswordWithSalt, $salt);
		
		echo "Entered password".$hashedEnteredPassword;
		echo "Hashed password".$hashedPassword;
		
		// Verify the entered password against the stored hashed password
		if ($hashedEnteredPassword === $hashedPassword) {
			// Password is correct
			$_SESSION['email'] = $row['email'];
			$_SESSION['firstname'] = $row['first_name'];
			$_SESSION['lastname'] = $row['last_name'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['user_name'];
			$_SESSION['role_id'] = $row['role_id'];
			echo 'Password is correct.';
			header("Location: ../index.php");
		    exit();
		} else {
			// Password is incorrect
			header("Location: ../login.php?error=Incorrect E-Mail or Password");
			echo 'Password is incorrect.';
		}
		
	//	$sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";

	//	$result = mysqli_query($conn, $sql);

	//	if (mysqli_num_rows($result) === 1) {
	//		$row = mysqli_fetch_assoc($result);
    //        if ($row['email'] === $email && $row['password'] === $pass) {
    //        	$_SESSION['email'] = $row['email'];
    //        	$_SESSION['firstname'] = $row['first_name'];
	//			$_SESSION['lastname'] = $row['last_name'];
    //        	$_SESSION['id'] = $row['id'];
    //            $_SESSION['username'] = $row['user_name'];
    //        	header("Location: ../index.php");
	//	        exit();
    //        }else{
	//			header("Location: ../login.php?error=Incorrect User name or password");
	//	        exit();
	//		}
	//	}else{
	//		header("Location: ../login.php?error=Incorrect User name or password");
	//        exit();
	//	}
	}
	
}else{
	header("Location: ../login.php");
	exit();
}