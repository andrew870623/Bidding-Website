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
	<script src="js/jquery-3.4.1.min.js"></script>
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
	</style>
	<script type="text/javascript">
		// 競價排行
		var bid_list = new Map();
		// 出價歷史
		var bid_history = [];
		// 最高願付價格
		var max_willing_bid = 5000;
		// 2 or 3 回合
		var total_round = randomInt(2, 3);

		function initialize(){
			bid_history.push(2000);
			
			bid_list.set("陳柏安(玩家)", 2000);
			bid_list.set("陳建宏", randomInt(0, bid_list.get("陳柏安(玩家)")/10)*10);
			bid_list.set("黃佳晨", randomInt(0, bid_list.get("陳柏安(玩家)")/10)*10);
			bid_list.set("范姜永岩", randomInt(0, bid_list.get("陳柏安(玩家)")/10)*10);
			
			bid_list_sort();
			refresh();
			setTimeout(exceed, 3000);
		}
		
		function plus(amount){
			var num = +document.getElementById("money").value;
			document.getElementById("money").value = num + amount;
		}
		
		function minus(amount){
			var num = +document.getElementById("money").value; 
			document.getElementById("money").value = (num - amount < 0)? 0 : num - amount;
		}
		
		function reset(){
			document.getElementById("money").value = 0;
		}
        
		function set(){
            var price=+document.getElementById("money").value;
            location.href="eight.php?price=" +price;
        }
		
		function setTotalPrice(){	
			document.getElementById("totalprice").innerHTML =
			+document.getElementById("money").value * parseInt(document.getElementById("people").innerHTML);
		}

		function go(){
			self.location.href='thanks.html';
		}

		function bid(){
			var new_bid = +document.getElementById("money").value;
			var max_bid = Math.max(...bid_list.values());
			
			if(new_bid <= max_bid){
				alert("您的出價: " + new_bid + "不可低於目前最高出價: " + max_bid);
			}

			if(new_bid > max_willing_bid){
				var alert_box = confirm("您剛的最高加價價格為" + max_willing_bid +
				",但您的出價已達到最高加價價格,請問您能要以此價格出價嗎?");
				if (alert_box == false) {
					reset();
					return;
				}
			}
			
			bid_history.push(new_bid);

			if (total_round == 0){
				alert("恭喜您以 " + new_bid + "得標！\n" + bid_history);
				return 
			}

			bid_list.set("陳柏安(玩家)", new_bid);
			bid_list_sort();
			refresh();
			setTimeout(exceed, 3000);
		}
		
		function randomInt(start,end){
       		return Math.floor(Math.random() * (end - start + 1) + start);
		}
			
		function exceed(){
			var max_bid = Math.max(...bid_list.values());
			var player_who_bids;
			var new_bid;

			total_round--;
			
			do{
				player_who_bids = Array.from(bid_list.keys())[randomInt(0, 3)];				
			}while(player_who_bids  == "陳柏安(玩家)");
			
			do{
				new_bid = Math.round(max_bid*(1+randomInt(10, 30)/100));
			}while(new_bid > max_willing_bid);

			bid_list.set(player_who_bids, new_bid);
			bid_list_sort();
			refresh();

			var alert_box = confirm("您的出價已被超越，是否繼續出價？");
			if (alert_box == false) {
				alert("非常抱歉您沒有得標！");
				return;
			}
		}

		function refresh(){
			var bid_list_html = "<ol>"
			for (let [key, value] of bid_list) {
				bid_list_html += "<li>" + key + " " + value + "</li>";
			}
			bid_list_html += "</ol>"	
			document.getElementById("bid_list").innerHTML = bid_list_html;
		}

		function bid_list_sort(){
			bid_list[Symbol.iterator] = function* () {
				yield* [...this.entries()].sort((a, b) => b[1] - a[1]);
			}
		}

	</script>
</head>

<body>
	<div class = "container">
		<div class = "row">
			<div class="jumbotron text-center;col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color:white;">
				<h1 align="center" style = "font-family:Microsoft JhengHei;font-size: 30px;">競價資訊</h1>
			</div>
			<div class = "col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<form name="one" action="eight2.php">	
						<div class="row" >
							<div class="col" >
								<div class="card" style="height:200px">
									<div class="card-body" style="overflow:auto;" >
										<h2 class="card-title"><b>競價即時資訊(每人價格)</b></h2>
										<p id="bid_list" class="card-text">
											初始化... 
											<script>
												document.onload = setTimeout(initialize, 3000);
											</script>
										</p>
									</div>
								</div>
							</div>
						</div>
						<span class="font"><br>
							您的姓名：
							<span style = "color:red">
						</span><br>
							班機資訊：台灣桃園-->日本北海道(航程：3小時35分)<br>
							升等艙位：商務艙<br>
							出價活動時間：12/1-12/8<br>
							該次總人數：<span id="people" style="color:red">
                                5
                            </span>人
                            <br>
							加價金額：
							<input id="money" name="money" readonly="readonly"  value=500><br>
							<button type="button" class="btn btn-primary btn-lg" onclick="plus(1000);setTotalPrice();">+1000</button>
							<button type="button" class="btn btn-primary btn-lg" onclick="plus(500);setTotalPrice();">+500</button>
							<button type="button" class="btn btn-primary btn-lg" onclick="plus(100);setTotalPrice();">+100</button>
							<button type="button" class="btn btn-primary btn-lg" onclick="plus(50);setTotalPrice();">+50</button>
							<button type="button" class="btn btn-primary btn-lg" onclick="plus(10);setTotalPrice();">+10</button>
							<button type="button" class="btn btn-primary btn-lg" onclick="minus(10);setTotalPrice();">-10</button>
							<button type="button" class="btn btn-primary btn-lg" onclick="minus(50);setTotalPrice();">-50</button>
							<button type="button" class="btn btn-primary btn-lg" onclick="minus(100);setTotalPrice();">-100</button>
							<button type="button" class="btn btn-primary btn-lg" onclick="minus(500);setTotalPrice();">-500</button>
							<button type="button" class="btn btn-primary btn-lg" onclick="minus(1000);setTotalPrice();">-1000</button>
                            <button type="button" class="btn btn-default btn-lg" onclick="reset();setTotalPrice();">還原</button>
                            <button type="button" class="btn btn-danger btn-lg" onclick="bid();reset();">出價</button>
							<br>加價總金額(加價金額*同行人數計算)<br>
							為：<span id="totalprice" style="color:red">
							<?php
								echo 500*($_SESSION['notcom']-1);
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

