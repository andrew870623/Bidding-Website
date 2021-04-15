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
            
            $name = $_POST[name];
            $gender = $_POST[gender];
			$age = $_POST[age];
			$edu = $_POST[education_level];
			$marriage = $_POST[marriage];
            $kid = $_POST[child];
			$bigage = $_POST[bigage];
			$smallage = $_POST[smallage];
            $job = $_POST[position];
			$job_other = $_POST[job_other];
			$pincome = $_POST[monthly_income];
            $fincome = $_POST[yearly_income];
            $_SESSION['name'] = $name;
			
            $sql =mysqli_query($conn,"INSERT INTO personaldata(name,gender,age,edu,wedding,kids,bigage,smallage,job,job_other,pincome,fincome)  VALUES ('$name','$gender','$age','$edu','$marriage','$kid','$bigage','$smallage','$job','$job_other','$pincome','$fincome')");  //新增資料
            if($sql){
                header("Location: two.html"); 
            }
            else{
                echo "Failed";
            }	
?>
           