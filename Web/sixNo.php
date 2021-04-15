<?php session_start();
            $dbhost = '140.113.73.85';
            $dbuser = '0853431';
            $dbpass = '';
            $dbname = 'bidding';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
            if(!$conn){
                die('Could not connect: ' . mysqli_error());
            }
            mysqli_query($conn,"SET NAMES UTF8");
            mysqli_select_db($conn,$dbname);
            
            //$notcom = $_POST[notcom];
            //$_SESSION['notcom'] = $notcom;
                    
            $name = $_SESSION['name'];
			//$desire = $_GET[value];   
			
			$desire = $_GET['desire'];
			$reasonNo = $_GET['reasonNo'];
			$reasonOther = $_GET['reasonOther'];
			print($reasonOther);
		
            $sql = mysqli_query($conn,"UPDATE personaldata SET will='$desire', reasonNo='$reasonNo', reasonOther='$reasonOther'  WHERE name='$name'");  //新增資料
            if($sql){
                header("Location: Thanks.html");
            }
            else{
                echo "Failed";
            }	
			?>