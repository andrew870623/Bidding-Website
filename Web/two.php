<?php  session_start();
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
            
            $htimes = $_POST[ftimes];
			$reason = $_POST[reason];
			$reason_other = $_POST[reason_other];
			$country = $_POST[country];
			$levels = $_POST[levels];
            $people= $_POST[people];
            $member = $_POST[member];
			$member_other = $_POST[member_other];
            $price = $_POST[price];
            $name = $_SESSION['name'];
            $sql = mysqli_query($conn,"UPDATE personaldata SET ftimes='$htimes',object='$reason',reason_other = '$reason_other',destination='$country',class='$levels',com='$people',member='$member',member_other = '$member_other',price='$price' WHERE name='$name'");  //新增資料
            if($sql){
                header("Location: three.html"); 
            }
            else{
                echo "Failed";
            }	
			?>