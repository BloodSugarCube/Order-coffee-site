<!DOCTYPE html>
<html>
<head>
  <title>Cards</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style_catalog.css">
</head>
<body>
	<div class="container">
		<FORM method="GET">
			<?php
			include_once("connect.php");

			$a=$_GET ["a"];
			$sql=mysqli_query($connection,"INSERT INTO `basket`(`id`) VALUES ('$a')");
			?>
	<div id="app">
		<div class="catalog">
		<h3 class="menu_name">Наше меню</h3>
			<div class="menu">
				<template v-for="product of products">
				<div class="desc-content" v-for="product.id">
					<div class="desc-butt">{{ product.name }} - {{ product.price }}
						<div v-bind:class="product.en"></div><div class="desc-butt1">
						{{ product.desk }}
						<br><br>
						<button  name="a" v-bind:value="product.id + 1">Добавить в корзину</button>
					</div></div>
				</template>
			</div>
	</div>
	<div class="basket">
	<?php
	$c=$_GET ['c'];
  	$sql3=mysqli_query($connection,"DELETE FROM `basket` WHERE `id`=$c");
	$sql="SELECT * FROM `product`,`basket` where `product`.`id`=`basket`.`id`";
	$с=0;
	$result = mysqli_query($connection, $sql);
	while($row = mysqli_fetch_array($result)){
    $id=$row['id'];
    $name=$row['name'];
    $price=$row['price'];
	$EI=$row['ЕдиницаИзмерения'];
    echo "<p><FORM method='GET'><button class='buttget' name='c' value='$id'> X </button> $name - $price р.</p>";
   	}
	$sql2="SELECT SUM(price) FROM `product`,`basket` where `product`.`id`=`basket`.`id`";
	$result2 = mysqli_query($connection, $sql2);
	while($row2 = mysqli_fetch_array($result2)){
   	echo "<span class='itog'>Итого: $row2[0] р. </span><br>";
	}
	?>
	<button> Оформить заказ </button>
	</div>
	<div>
	<div class="gavno-linia"></div>
	<a name="Н">
    </a>
	<div class="search">
	<div class="subscribe">
	<font color="white"><b><p>Подписаться</p></b></font>
	</div>
	<div class="weekly">
	<font color="black"><b><p>На еженедельную<br>
	рассылку новостей</p></b></font>
	</div>
	<div class="blockwhite">
	<div class="email">
	<font color="grey"><p>Ваш email</p></font>
	</div>
	</div>
	<div class="blockblack">
	<div class="subscribepress">
	<font color="white"><b><p><a href="" class="btn">Подписаться</a></p></b></font>
	</div>
	</div>
	<div class="icon">
	<div class="twitter">
	<a href="http://www.twitter.com"><img src="images/twitter.png"></a>
	</div>
	</div>
	<div class="icon1">
	<div class="facebook">
	<a href="http://www.facebook.com"><img src="images/facebook.png"></a>
	</div>
	</div>
	<div class="icon2">
	<div class="instagram">
	<a href="http://www.instagram.com"><img src="images/instagram.png"></a>
	</div>
	</div>
	<div class="icon3">
	<div class="googleplus">
	<a href="http://www.GooglePLus.com"><img src="images/googleplus.png"></a>
</div>
	<script src="js/vue.js"></script>
	<script src="js/script.js"></script>
</body>
</html>