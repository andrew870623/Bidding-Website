<?php session_start(); ?>
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
	<script type="text/javascript">
		function plus()
			{
				var num=document.getElementById("money").value*1;
				document.getElementById("money").value = num+500;
			}
			function minus()
			{
				var num=document.getElementById("money").value*1; 
				document.getElementById("money").value = 500;
			}
			function set(){
				var price=document.getElementById("money").value*1;
				var highest_price = 10000;
				var prob = (price/highest_price)*100;
				console.log(prob);
				document.getElementById("enter").style.display = 'inline';
				if(prob>0 && prob<=10)
					document.getElementById('prob').src='images/chart/chart_10.jpg';
				else if(prob>10 && prob<=20)
					document.getElementById('prob').src='images/chart/chart_20.jpg';
				else if(prob>20 && prob<=30)
					document.getElementById('prob').src='images/chart/chart_50.jpg';
				else if(prob>30 && prob<=40)
					document.getElementById('prob').src='images/chart/chart_55.jpg';
				else if(prob>40 && prob<=50)
					document.getElementById('prob').src='images/chart/chart_60.jpg';
				else if(prob>50 && prob<=60)
					document.getElementById('prob').src='images/chart/chart_65.jpg';
				else if(prob>60 && prob<=70)
					document.getElementById('prob').src='images/chart/chart_70.jpg';
				else if(prob>70 && prob<=80)
					document.getElementById('prob').src='images/chart/chart_80.jpg';
				else if(prob>80 && prob<=90)
					document.getElementById('prob').src='images/chart/chart_90.jpg';
				else
					document.getElementById('prob').src='images/chart/chart_100.jpg';
				
				//location.href="eight.php?price=" +price; 
			}
			function other(){
				var num = document.getElementById("desire").value;
				if(num=="不願意" && document.getElementById("result").style.display=='none'){
					document.getElementById("result_yes").style.display = 'none';
					document.getElementById("result").style.display = 'inline';
					}
				else{
					document.getElementById("result_yes").style.display = 'inline';
					document.getElementById("result").style.display = 'none'; 
				}
			}
		
		function go(){
			if(one.education_level.value!="" && one.child.value!="" && one.position.value!="" && one.monthly_income.value!=""
			   && one.yearly_income.value!="" && one.marriage.value!=""){
					self.location.href='two.html';
			}
			else{
				alert('有地方未填寫');
			}
		}
	</script>
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
<body>
	<div class = "container">
		<div class = "row">
			<div class="jumbotron text-center;col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color:white;">
				<h1 align="center" style = "font-family:Microsoft JhengHei;font-size: 30px;">競價資訊</h1>
			</div>
			<div class = "col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form name="one" action="seven-next.php" method="post">
					<span class="font"><br>
                        班機資訊：台灣桃園-->日本北海道(航程：3小時35分)<br>
                        升等艙位：商務艙<br>
                        出價底價為：500元<br>
                        您的姓名：<span style = "color:red">
                        <?php 
                            echo $_SESSION['name'];
						?></span>
						<br>
						您願意加價的最高價:<span style = "color:red">
                        <?php 
                            echo $_SESSION['highest_price'];
						?></span>
						<br>
						加價金額：
							<input type="text" id="money" name="money" value="" style="width:40%" onchange="set(this.value)">
						<br>(輸入完畢請點選空白處以獲得得標機率)<br><br>
						得標機率：
	</br>	
						
					</span>
				<img id="prob"></img>
				<br>
				<div id="enter" style="display:none;">
					<input style="position:relative; left:5px;"  type="submit"  class="btn btn-primary" value="點我競標">
				</div>
				</form>
				
			</div>
			
		</div>
	</div>
</body>
</html>