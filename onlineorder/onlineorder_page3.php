<?php
//    session_start();
//    include "../header.php";
//    include "../conn/pdomysql.php";
//    date_default_timezone_set('Asia/Bangkok');
//    $mysql = new pdomysql();
//    $dateNow = date("Y-m-d");
//    include "../conn/rbh.php";
//    $rbh = new rbh();
//
//	if ($_POST[normalfood] != null || $_POST[normalfood] != '') {$normalfood = implode(',' , $_POST[normalfood]);}
//	if ($_POST[specialfood] !=  null || $_POST[specialfood] != '') {$specialfood= implode(',' , $_POST[specialfood]);}
//	if ($_POST['irc'] == 'checked') {$irc = 'Y';}else{$irc ='N';}
//	if ($_POST['onlyuse'] == 'checked') {$onlyuse = 'Y';}else{$onlyuse ='N';}
//	$datetime = date('Y-m-d H:i:s');
//	$type = $_POST['foodtype'];
//	$amount = $_POST['amount6'];
//	$mealorfeed =$_POST['meal6'];
//	$extrafood = $_POST['extrafood'];
//	$intensity = $_POST['intensity'];
//	$recipe = $_POST['recipe'];
//	$amount = $_POST['amount'];
//	$breakfast =$_POST['breakfast'];
//	$lunch =$_POST['lunch'];
//	$dinner=$_POST['dinner'];
//	$mealorfeed =$_POST['meal'];
//	$hn=$_POST['hn'];
//	$ptname=$_POST['ptname'];
//
//
//	$exnor = explode(',', $normalfood);
//	$len = sizeof($exnor);
//	/*echo $len."<br>";
//	foreach ($exnor as $key) {
//		echo $key."<br>";
//	}
//	echo $normalfood."<br>";
//	echo $specialfood."<br>";
//	echo "irc ".$irc."<br>";
//	echo "onlyuse ".$onlyuse."<br>";
//	echo $datetime;*/
//
//
//	$sql = "INSERT INTO rbh_onlineorder_history (hn,ptname,food_type, food_normal, food_specific,
//                food_extra, intensity, recipe, amount, mealorfeed, irc, onlyuse, order_datetime,
//                order_staff, feed_breakfast, feed_lunch, feed_dinner)
//            VALUES ('$hn','$ptname','$type', '$normalfood', '$specialfood', '$extrafood',
//              '$intensity', '$recipe', '$amount', '$mealorfeed', '$irc', '$onlyuse', '$datetime',
//              'test','$breakfast', '$lunch', '$dinner')";
//  	$dbquery = mysql_db_query($dbname, $sql);
//
//  	$result = mysql_query("SELECT * FROM rbh_onlineorder WHERE hn ='$hn'");
//  			if(mysql_num_rows($result) > 0) {
//  			mysql_query("UPDATE rbh_onlineorder SET food_type='$type', food_normal='$normalfood', food_specific='$specialfood',
//  			food_extra='$extrafood',intensity='$intensity', recipe='$recipe', amount='$amount', mealorfeed='$mealorfeed',
//  			irc='$irc', onlyuse='$onlyuse', order_datetime='$datetime', order_staff='test', feed_breakfast='$breakfast', feed_lunch='$lunch', feed_dinner='$dinner'
//  			WHERE hn = '$hn'");
//  			}else{ mysql_query("INSERT INTO rbh_onlineorder (hn,ptname,food_type, food_normal, food_specific, food_extra, intensity, recipe, amount, mealorfeed, irc,
//  			onlyuse, order_datetime, order_staff, feed_breakfast, feed_lunch, feed_dinner)
//         	VALUES ('$hn','$ptname','$type', '$normalfood', '$specialfood', '$extrafood', '$intensity', '$recipe', '$amount', '$mealorfeed', '$irc', '$onlyuse', '$datetime', 'test','$breakfast', '$lunch', '$dinner')");}
//
//  	$queryupdate = mysql_db_query($dbname, $update);
print_r($_POST);
?>



	