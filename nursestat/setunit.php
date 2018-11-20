<?  session_start();
include_once("../conn/setdb32.php");

$loginname = $_POST['loginname'];	 
$nursename = $_POST['name'];
$unit_id = $_POST['unit_id'];
$position_id = $_POST['position_id'];	
$prtype = $_POST['prtype'];	
 

 $sql = "select  *  from  rbh_nurse_position  where status = 'Y' and position_id=$position_id";
 $dbquery = mysql_db_query($dbname, $sql);
  $result = mysql_fetch_array($dbquery); 
  
  $position=$result['name'];
   $position_g=$result['position_g'];
    $position_g_code=$result['position_order'];
 
 
 $sql = "select  *  from  rbh_nurse_unit  where status = 'Y' and unit_id=$unit_id";
  $dbquery = mysql_db_query($dbname, $sql);
  $result = mysql_fetch_array($dbquery); 
  $wardname=$result['name'];
   $ward=$result['unit_id'];
 
 $update_date = date ("Y-m-d h:m:s");
 

 $sql="select count(*) AS num from hos_user where user_name='$loginname'";
			 $dbquery = mysql_db_query($dbname, $sql);
		$result = mysql_fetch_array($dbquery); 
						 
							 if($result['num'] != null  &&  $result['num'] > 0 ) {
								  
								  
								$sql2= " UPDATE hos_user SET prtype = '$prtype',position_id = '$position_id', update_date = '$update_date', department = '$wardname',position='$position',ward='$ward',wardname='$wardname',position_g='$position_g',position_g_code='$position_g_code',name='$nursename' WHERE user_name = '$loginname' ";
								
								 
								 $dbquery2 = mysql_db_query($dbname, $sql2);
								 
							 }else {
								 
								 $sql2="INSERT INTO hos_user (user_name,department,position,status,ward,wardname,position_g,position_g_code,name,update_date,position_id) values ('$loginname','$wardname','$position','EN','$ward','$wardname','$position_g',$position_g_code,'$nursename','$update_date','$position_id') ";
								 
								 $dbquery2 = mysql_db_query($dbname, $sql2);
								 }
								 
								
							 ?>
				 <script type="text/JavaScript">

							window.location="pr.php";

							</script> 

<?
 ?> 

