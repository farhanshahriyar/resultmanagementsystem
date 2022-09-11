<?php
$user_logo = "";
$u_logo = "http://127.0.0.1/_rms/assets/img/mb.png";
$stamp = "http://127.0.0.1/_rms/assets/img/s.png";
$sign = "http://127.0.0.1/_rms/assets/img/u.png";
$passMarks = 30;
$university_name = "Notre Dame University Bangladesh";
$university_address = "2/A, Arambagh, Motijheel, GPO Box 7
DHAKA-1000
BANGLADESH";

//Define User logo

//site_url
$url = "http://ndub.edu.bd" . $_SERVER['SERVER_NAME'];


// Titles
   $exam_container_title = 'New Exams';
   $student_container_title = "New Students";

//  === Database Info =====
	$servername = "localhost";
	$username = "root";
	$password = "";
    $dbName = "results";

	$conn = mysqli_connect($servername, $username, $password);
	$db = mysqli_select_db($conn,$dbName);


?>