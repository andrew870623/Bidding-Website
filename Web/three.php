<?php session_start();
            $dbhost = '140.113.73.75';
            $dbuser = '309706022';
            $dbpass = '';
            $dbname = 'bidding';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
            if(!$conn){
                die('Could not connect: ' . mysql_error());
            }
            mysqli_query($conn,"SET NAMES UTF8");
            mysqli_select_db($conn,$dbname);
            
			$avia = $_POST[avia];
			$avia_other = $_POST[avia_other];
			//$first = $_POST[first];
            //$second = $_POST[second];
            $source = "";
            foreach($_POST[source] as $names)
            {
                $source = $source.$names."\n";
            }
			$source_other = $_POST[source_other];
            $name = $_SESSION['name'];
            $sql = mysqli_query($conn,"UPDATE personaldata SET avia='$avia',avia_other='$avia_other',source='$source',source_other='$source_other' WHERE name='$name'");  //新增資料
            if($sql){
                header("Location: four.html"); 
            }
            else{
                echo "Failed";
            }	
			?>