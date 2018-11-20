<? session_start(); ?>
<? include_once("../conn/setdb32.php"); ?>
<?
$day = $_POST['day'];
$month = $_POST['month'];	 
$year = $_POST['year'];	 
$user_name = $_POST['nurse'];	

$work_date= $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$work_type = $_POST['work_type'];	 
$work_time = $_POST['work_time'];	 
 
$sql="SELECT * FROM  hos_user  where  user_name='$user_name'";
$dbquery = mysql_db_query($dbname, $sql);
$result = mysql_fetch_array($dbquery); 
$first_name = $result['first_name'];
$name = $result['name'];	
$usercreate = $_SESSION['user']; 
$last_name = $result['last_name'];	 
$position_g = $result['position_g'];	  
$position_g_code = $result['position_g_code'];	 
$ward = $_SESSION['ward_s'];	  
$position = $result['position'];
$sqle = "insert into rbh_nursework  (name,usercreate,work_date,work_time,typework,username,firstname,lastname,position_g,position_g_code,ward,position) values ('$name','$usercreate','$work_date','$work_time' ,'$work_type','$user_name','$first_name','$last_name','$position_g' ,'$position_g_code','$ward','$position')";

echo  $sqle;

$dbquerye = mysql_db_query($dbname, $sqle);  

	mysql_close();	
	
	?>
						<script type="text/JavaScript">
			window.location="add.php?dayday=<? echo $day; ?>";
				</script> 
						<?	
 ?>
