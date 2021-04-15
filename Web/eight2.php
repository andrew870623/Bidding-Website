<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<title>競價資訊</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name = "viewport" content = "width=device-width,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
			position:relative; height:800px;
			top:-20; bottom:0; left:0; right:0;
			background-color:#F5F5F5;
			border-style:solid;
			}
		.font{
			font-size:25px;
		}
		#demo{
			font-size:25px
		}
		
		}
	</style>
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
            location.href="eight.php?price=" +price; 
        }
        function go(){
			console.log("YES");
			<?php
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
											
			$sql = mysqli_query($conn,"SELECT MAX (money) FROM participants;");
			if($sql){echo "Success";}
			?>
			//var num=document.getElementById("money").value*1;
			//print(num);
			/*if(num<=<?php $sql ?>)
			{
				print( "輸入數字太小");
			}
			else{*/
            self.location.href = "index.php";//}
        }
	
	</script>


</head>
<?php
			$dbhost = '140.113.73.85';
            $dbuser = '0853431';
            $dbpass = '1234';
            $dbname = 'bidding';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
            if(!$conn){
                die('Could not connect: ' . mysqli_error());
            }
            mysqli_query($conn,"SET NAMES UTF8");
            mysqli_select_db($conn,$dbname);
            
            
            $name = $_SESSION['name'];
			$money = $_POST[money];
            $sql = mysqli_query($conn,"INSERT INTO participants(name,money) VALUES('$name','$money')");  //新增資料
            if($sql){
                
            }
            else{
                echo "Failed";
            }	
?>
<body >

 
	<div class = "container">
		<div class = "row">
			<div class="jumbotron text-center;col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color:white;">
				<h1 align="center" style = "font-family:Microsoft JhengHei;font-size: 30px;">競價資訊</h1>
			</div>
			<div class = "col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<form name="one" >	
						<div class="row" >
							<div class="col-sm-6" >
								<div class="card" style="height:200px">
									<div class="card-body" style="overflow:auto;" >
										<h2 class="card-title"><b>競價即時資訊(每人價格)</b></h2>
										<p class="card-text">
										<?php
											$dbhost = '140.113.73.85';
											$dbuser = '0853431';
											$dbpass = '1234';
											$dbname = 'bidding';
											$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
											if(!$conn){
												die('Could not connect: ' . mysqli_error());
											}
											mysqli_query($conn,"SET NAMES UTF8");
											mysqli_select_db($conn,$dbname);
											
											$sql = mysqli_query("SELECT* FROM participants ORDER BY money DESC");
											$no_fields=mysqli_num_fields($sql);

											echo"<table>";
											  while($x=mysqli_fetch_row($sql)){
												 echo "<tr>";
												 for($j=0;$j<$no_fields;$j++)
													echo "<td width='200px'><font size='5'> $x[$j]</font></td>";
												 echo "</tr>";
											  }
											echo"</table>";
										?>						
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6" >
								<div class="card" style="height:200px" >
									<div class="card-body" align="center">
										<h2 class="card-title"><b>剩餘時間</b></h2>
										<p class="card-text">
										<body onload="miaosha();">
											<p class="tit_right" style="">
											<h2>
												<span id="d" style="">00</span>天
												<span id="h" style="">00</span>时
												<span id="m" style="">00</span>分
												<span id="s" style="">00</span>秒
											</h2>
											</p>
										 
										</body>
										</p>
									</div>
								</div>
							</div>
						</div>
						<span class="font"><br>
							班機資訊：台灣桃園-->日本北海道(航程：3小時35分)<br>
							升等艙位：商務艙<br>
							出價底價為：500元<br>
							出價活動時間：12/1-12/8<br>
							該次同行人數：<span style="color:red">
                                <?php 
                                    
                                    echo $_SESSION['notcom']-1;
                                ?>
                            </span>人
                            <br>
                            您的姓名：<span style = "color:red">
                            <?php 
                                echo $_SESSION['name'];
                            ?></span><br>
							加價金額：
							<input type="text" id="money" name="money" readonly="readonly" value=<?php echo $price ?> >
							<button type="button" class="btn btn-primary btn-lg" onclick="plus()">+500</button>
                            <button type="button" class="btn btn-secondary btn-lg" onclick="minus()">還原</button>
                            <button type="button" class="btn btn-secondary btn-lg" onclick="set()">計算</button>
							<br>加價總金額會依據加價金額*同行人數計算<br>
							即：<span style ="color:red">
                                <?php 
                                    $price = $_GET['price'];
                                    echo $price*($_SESSION['notcom']-1);
                                ?>
                                </span>    
                            <br><br>
							
						</span>
						&nbsp <button style="position:relative;"  type="button" onclick="go()" class="btn btn-primary">點我繼續</button>
				</form>
			</div>
			
		</div>
	</div>
	
</body>

</html>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    var timer = null;
	var DD = new Date();
	var yy = DD.getFullYear();
	var mm = (DD.getMonth()+1);
	var dd = DD.getDate();
	var hh = DD.getHours();
	var mi = DD.getMinutes();
	var ss = DD.getSeconds();
    // 秒杀函数
    function miaosha(year, month, day, hour, minute, second) {
        // 剩余时间：设定的-当前的
        var leftTime = (new Date(year, month - 1, day, hour, minute, second)) - (new Date());
        // parseInt()返回一个整数。得出剩余的时分秒
        var days = parseInt(leftTime / 1000 / 60 / 60 / 24, 10);
        var hours = parseInt(leftTime / 1000 / 60 / 60 % 24, 10);
        var minutes = parseInt(leftTime / 1000 / 60 % 60, 10);
        var seconds = parseInt(leftTime / 1000 % 60, 10);
        // 结束的时候
        if (seconds < 0) {
        	alert("快点！");
            clearTimeout(timer);
        }
        else {
        	// 格式的转化
            days = fix(days, 2);
            hours = fix(hours, 2);
            minutes = fix(minutes, 2);
            seconds = fix(seconds, 2);
            // 递归调用  注意：比当前时间大！
			timer = setTimeout("miaosha(2020,09,09,10,56,00)", 1000); 
			//var now = "miaosha("+yy+","+mm+","+dd+","+hh+","+(mi+1)+","+(ss+2)+")";
            //timer = setTimeout(now, 1000);  //// 设置开始的时间
            // 设置时分秒
            document.getElementById("h").innerHTML = hours;
            document.getElementById("m").innerHTML = minutes;
            document.getElementById("s").innerHTML = seconds;
            document.getElementById("d").innerHTML = days;
        }
    }
    //fix函数：数字加0
    function fix(num, length) {
    	console.log(num);
    	// 数字转化为字符串  进行拼接
        return num.toString().length<length?'0'+num:num;
    }
</script>
