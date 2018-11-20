<? session_start(); ?>
<? include_once("../conn/setdb32.php"); ?>
<?
$hn = $_POST['hn'];
$an = $_POST['an'];	

$level = $_POST['level'];	 
$res = $_POST['res'];	

$sql="SELECT count(*) AS num  FROM  rbh_nursept_item   where  an='$an'";

$dbquery = mysql_db_query($dbname, $sql);
$result = mysql_fetch_array($dbquery); 

if($result['num'] != null &&  $result['num'] != 0)
{
	
	$sqle = "UPDATE rbh_nursept_item  SET  level = '$level', respirator='$res' WHERE an = '$an' ";
	
}else
{
	$sqle = "insert into rbh_nursept_item  (hn,an,level,respirator) values ('$hn','$an','$level','$res')";
	
}

echo $sqle;


$dbquerye = mysql_db_query($dbname, $sqle);  

	mysql_close();	
	
	?>
						<script type="text/JavaScript">
			window.location="nursestat.php";
				</script> 
						<?	
 ?>

