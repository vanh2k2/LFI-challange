<?php
	// Kết nối đến database
	$severname = "localhost";
	$username = "root";
	$password = "";
	$database = "test1";
	$db = mysqli_connect($severname, $username, $password, $database);
	
	// Lấy dữ liệu từ login form
	$un = $_POST['uname'];
	$pw = $_POST['psw'];

	// Accuracy
	if((strpos($un,'=')!==false)or(strpos($un,'0')!==false)or(strpos($un,'1')!==false)or(strpos($un,'2')!==false)or(strpos($un,'3')!==false)or(strpos($un,'4')!==false)or(strpos($un,'5')!==false)or(strpos($un,'6')!==false)or(strpos($un,'7')!==false)or(strpos($un,'8')!==false)or(strpos($un,'9')!==false)or(strpos($un,'true')!==false)or(strpos($un,'false')!==false)){ 
	    header('Location: hacker_found.html');
 		exit;
	}
	if((strpos($pw,'=')!==false)or(strpos($pw,'0')!==false)or(strpos($pw,'1')!==false)or(strpos($pw,'2')!==false)or(strpos($pw,'3')!==false)or(strpos($pw,'4')!==false)or(strpos($pw,'5')!==false)or(strpos($pw,'6')!==false)or(strpos($pw,'7')!==false)or(strpos($pw,'8')!==false)or(strpos($pw,'9')!==false)or(strpos($un,'true')!==false)or(strpos($un,'false')!==false)){ 
	    header('Location: hacker_found.html');
 		exit;
	}


	// Truy vấn đến database, tìm username và password
	$sql = "select * from table_name where username='$un' and password='$pw'";

	//Thực thi truy vấn
	$result = mysqli_query($db, $sql);
	if(mysqli_fetch_assoc($result)){
		echo  nl2br ("login success! \n\n");
		echo file_get_contents("flag.txt");
	}else{		
		echo "login fail!";
		
	}
?>