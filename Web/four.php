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
            
			
            $name = $_SESSION['name'];
			$heardY = $_GET['valueY'];
			$heardN = $_GET['valueN'];
			if($heardY=="Y"){
				$heardY = "有聽過";
				$sql = mysqli_query($conn,"UPDATE personaldata SET heard='$heardY' WHERE name='$name'");  //新增資料
				}
			else if($heardN=="N"){
				$heardN = "沒聽過";
				$sql = mysqli_query($conn,"UPDATE personaldata SET heard='$heardN' WHERE name='$name'");  //新增資料
				}
			

            

          
            if($sql){
                header("Location: five.html"); 
            }
            else{
                echo "Failed";
            }	
			?>