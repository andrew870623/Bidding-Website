<?php session_start();
            $dbhost = '140.113.73.75';
            $dbuser = '309706022';
            $dbpass = '';
            $dbname = 'bidding';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
            if(!$conn){
                die('Could not connect: ' . mysqli_error());
            }
            mysqli_query($conn,"SET NAMES UTF8");
            mysqli_select_db($conn,$dbname);
            
            $exp = $_POST[exp];
			$com = $_POST[com];
			$start = $_POST[start];
			$des = $_POST[des];
            $cost = $_POST[cost];
            $goal = $_POST[goal];
            $name = $_SESSION['name'];
            if($exp=='有使用過'){
                $sql = mysqli_query($conn,"UPDATE personaldata SET exp='$exp',expavia='$com',expstart='$start',expend='$des',expcost='$cost',expobject='$goal' WHERE name='$name'");  //新增資料
            }
            else{
                $sql = mysqli_query($conn,"UPDATE personaldata SET exp='$exp',expavia='NULL',expstart='NULL',expend='NULL',expcost='NULL',expobject='NULL' WHERE name='$name'");
            }
            if($sql){
                header("Location: six.html"); 
            }
            else{
                echo "Failed";
            }	
			?>