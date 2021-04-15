<?php session_start();
            $dbhost = '140.113.73.75';
            $dbuser = 'root';
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
            $desire = $_POST[desire];
            $highest_price = $_POST[highest_price];
            $name = $_SESSION['name'];
            $_SESSION['highest_price'] = $highest_price;
            $sql = mysqli_query($conn,"UPDATE personaldata SET will='$desire',highest_price='$highest_price'  WHERE name='$name'");  //新增資料
            if($sql){
                header("Location: seven.php");
            }
            else{
                echo "Failed";
            }	
			?>