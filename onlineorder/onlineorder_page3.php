<?php
    session_start();
    include "../header.php";
    include "../conn/pdomysql.php";
    include "../conn/rbh.php";
    date_default_timezone_set('Asia/Bangkok');
    $mysql = new pdomysql();
    $user = $_SESSION['opduser']['loginname'];

	if ($_POST[normalfood] != null || $_POST[normalfood] != '') {$normalfood = implode(',' , $_POST[normalfood]);}
	if ($_POST[specialfood] !=  null || $_POST[specialfood] != '') {$specialfood= implode(',' , $_POST[specialfood]);}
	if ($_POST['irc'] == 'checked') {$irc = 'Y';}else{$irc ='N';}
	if ($_POST['onlyuse'] == 'checked') {$onlyuse = 'Y';}else{$onlyuse ='N';}
	$type 			= $_POST['foodtype'];
	$amount 		= $_POST['amount6'];
	$mealorfeed 	= $_POST['meal6'];
	$extrafood 		= $_POST['extrafood'];
	$intensity 		= $_POST['intensity'];
	$recipe 		= $_POST['recipe'];
	$amount 		= $_POST['amount'];
	$breakfast 		= $_POST['breakfast'];
	$lunch 			= $_POST['lunch'];
	$dinner			= $_POST['dinner'];
	$mealorfeed 	= $_POST['meal'];
	$hn				= $_POST['hn'];
	$ptname			= $_POST['ptname'];



	$sql = "INSERT INTO rbh_onlineorder_history 
				(hn, ptname, food_type, food_normal, food_specific,
                 food_extra, intensity, recipe, amount, mealorfeed, irc, 
                 onlyuse, feed_breakfast, feed_lunch, feed_dinner,
                 order_datetime, order_staff)
            VALUES ('$hn','$ptname','$type', '$normalfood', '$specialfood', 
            		'$extrafood', '$intensity', '$recipe', '$amount', '$mealorfeed', '$irc', 
            		'$onlyuse', '$breakfast', '$lunch', '$dinner',
            		NOW(), '$user')";
  	$dbquery = $mysql->insertData($sql);

  	$result = $mysql->selectOne("SELECT COUNT(*) AS row FROM rbh_onlineorder WHERE hn ='$hn'");

  	if ($result['row'] != 0 ){
  		$qry = "UPDATE rbh_onlineorder 
				SET food_type='$type', food_normal='$normalfood', food_specific='$specialfood',
  				food_extra='$extrafood',intensity='$intensity', recipe='$recipe', amount='$amount', 
  				mealorfeed='$mealorfeed', irc='$irc', onlyuse='$onlyuse', 
  				feed_breakfast='$breakfast', feed_lunch='$lunch', feed_dinner='$dinner',
  				order_datetime=NOW(), order_staff='$user'
  				WHERE hn = '$hn'";
  		$dbqry = $mysql->updateData($qry);
	}else{
  		$qry = "INSERT INTO rbh_onlineorder 
					(hn, ptname, food_type, food_normal, food_specific,
                 	food_extra, intensity, recipe, amount, mealorfeed, irc, 
                 	onlyuse, feed_breakfast, feed_lunch, feed_dinner,
                 	order_datetime, order_staff)
            	VALUES ('$hn','$ptname','$type', '$normalfood', '$specialfood', 
            			'$extrafood', '$intensity', '$recipe', '$amount', '$mealorfeed', '$irc', 
            			'$onlyuse', '$breakfast', '$lunch', '$dinner',
            			NOW(), '$user')";
        $dbqry = $mysql->insertData($qry);
	}

?>



	