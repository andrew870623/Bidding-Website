<html>
<head>
	<meta charset="utf-8">
	<title>個人資料與旅次問項</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name = "viewport" content = "width=device-width,initial-scale=1">
	<style type="text/css">
		
		.slidecontainer {
			margin-left: 10px;
		  	width: 50%;
		}

		.slider {
		-webkit-appearance: none;
		width: 100%;
		height: 15px;
		border-radius: 5px;  
		background: #d3d3d3;
		outline: none;
		opacity: 0.7;
		-webkit-transition: .2s;
		transition: opacity .2s;
		}

		.slider::-webkit-slider-thumb {
		-webkit-appearance: none;
		appearance: none;
		width: 25px;
		height: 25px;
		border-radius: 50%; 
		background: #4CAF50;
		cursor: pointer;
		}

		.slider::-moz-range-thumb {
		width: 25px;
		height: 25px;
		border-radius: 50%;
		background: #4CAF50;
		cursor: pointer;
		}
	</style>
	<style type="text/css">
		body {
			background: url(./images/back.png);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
			}
		form {
			font:100% verdana,arial,sans-serif;
			margin: auto;
			padding: 0;
			min-width: 80%;
			max-width: 100%;
			width: 300px;
			position:relative; height:700px;
			top:-20; bottom:0; left:0; right:0;
			background-color:#F5F5F5;
			border-style:solid;
			}
		.font{
			font-size:25px
		}
		#demo{
		font-size:25px
		}
		#prob {
				padding-left:5px;
				padding-right:5px;
				max-width:75%;
				max-height:45%;
		}
		}
	</style>
</head>
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
						$name = $_SESSION['name'];
						$price = $_POST[money];
						
						$sql = mysqli_query($conn,"UPDATE personaldata SET plusprice='$price'  WHERE name='$name'");  //新增資料
						if($sql){
								
							}
							else{
								echo "Failed";
							}
?>
<body>
	<div class = "container">
		<div class = "row">
			<div class="jumbotron text-center;col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color:white;">
				<h1 align="center" style = "font-family:Microsoft JhengHei;font-size: 30px;">競價資訊</h1>
			</div>
			<div class = "col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form name="one" action="seven-next.php" method="post">
					<span style="font-size:50px">
						競標結果:  
					</span><br>
					<span  style="font-size:40px;color:red ;">
					
						
							
						<?php

						
						$highest_price = "10000";
						$prob = ($price/$highest_price)*100;
						$prob2 = 0;
						$rand =  rand ( 0 , 100 );
						if($prob>0 && $prob<=10)
							$prob2 = 10;
						else if($prob>10 && $prob<=20)
							$prob2 = 20;
						else if($prob>20 && $prob<=30)
							$prob2 = 50;
						else if($prob>30 && $prob<=40)
							$prob2 = 55;
						else if($prob>40 && $prob<=50)
							$prob2 = 60;
						else if($prob>50 && $prob<=60)
							$prob2 = 65;
						else if($prob>60 && $prob<=70)
							$prob2 = 70;
						else if($prob>70 && $prob<=80)
							$prob2 = 80;
						else if($prob>80 && $prob<=90)
							$prob2 = 90;
						else
							$prob2 = 100;
							
						
						
						if($rand >= $prob2){
							print("失敗");
							$result = "失敗";
							$sql = mysqli_query($conn,"UPDATE personaldata SET result='$result'  WHERE name='$name'");
							if($sql){
								
							}
							else{
								echo "失敗Failed";
							}
						}

					?>
					</span>
					<span style="font-size:40px;color:green">
					<?php
						if($rand < $prob2){
							print("成功");
							$result = "成功";
							$sql = mysqli_query($conn,"UPDATE personaldata SET result='$result'  WHERE name='$name'");
							if($sql){
								
							}
							else{
								echo "成功Failed";
							}
						}
					?>
					<br>
					
					</span>
					<input style="position:relative;top:500px; left:50px;" onclick="self.location.href='eight.php'" class="btn btn-primary" value="點我結束" >
				</form>
				
			</div>
			
		</div>
	</div>
</body>
</html>
