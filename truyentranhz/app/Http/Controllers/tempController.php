<?php
	$username="root";
	$password="";
	$host="localhost";
	$database="id11828412_sale";
	$connect=mysqli_connect($host,$username,$password,$database);
	mysqli_set_charset($connect,"utf8");
	if($connect!=true){
		echo"die";
	}
	$sql = "insert into `theloai_truyen` (`truyentranh_id`, `idtheloai`, `updated_at`, `created_at`) values (1003, 33, 2020-07-10 20:43:50, 2020-07-10 20:43:50))";
	$sql = "insert into `chapter` (`ten`, `noidung`, `updated_at`, `created_at`) values (chap1, fadsffffa, 2020-07-10 20:43:50, 2020-07-10 20:43:50))";
?>