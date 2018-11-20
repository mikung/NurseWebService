<? session_start();
 include "../header.php";
 include_once("../conn/setdb32.php");
$ward = $_POST['ward'];
$worktime = $_POST['worktime'];	
$statdate = $_POST['statdate'];	 
$t1=0;
$t2=0;
$t3=0;
$t4=0;
$t5=0;
$n=0;
$v=0;

$sql="SELECT    r.respirator As respirator, i.hn As hn,i.an As an,r.level as level   FROM  ipt i left outer join rbh_nursept_item r on i.an = r.an   where i.dchdate is null and i.ward='$ward'";
echo $sql."<br>";
$dbquery = mysql_db_query($dbname, $sql);



	 $num_rows = mysql_num_rows($dbquery);
	 $i=0;
  			while ($i < $num_rows) 
 				      {
					  
				
   $result = mysql_fetch_array($dbquery);  
   
     if($result['level']!=null && $result['level']!='' && $result['level']==1){ $t1=$t1+1;}
   if($result['level']!=null && $result['level']!='' && $result['level']==2){ $t2=$t2+1;}
   if($result['level']!=null && $result['level']!='' && $result['level']==3){ $t3=$t3+1;}
		if($result['level']!=null && $result['level']!='' && $result['level']==4){ $t4=$t4+1;}	
		if($result['level']!=null && $result['level']!='' && $result['level']==5){ $t5=$t5+1;}	
				 
			$an = 	$result['an'];	 
			$hn = 	$result['hn'];	
			$level = 	$result['level'];
			$respirator = 	$result['respirator'];
				 
	$sql2="SELECT  i.an,b.bedtype FROM  iptadm i left outer join  bedno  b on  i.bedno = b.bedno where i.an ='$an' ";
echo $sql2."<br>";
$dbquery2 = mysql_db_query($dbname, $sql2);
$result2 = mysql_fetch_array($dbquery2);

if($result2['bedtype'] == 57  ||  $result2['bedtype'] == 58   ||  $result2['bedtype'] == 53  ||  $result2['bedtype'] == 52  ||  $result2['bedtype'] == 51  ||  $result2['bedtype'] == 17  ||  $result2['bedtype'] == 16  ||  $result2['bedtype'] == 59  ||  $result2['bedtype'] == 50){
	
	$v = $v+1;
	}else {
		
		$n = $n+1;
		
		}				 
					 
	$sql3="insert into rbh_nursept  (an, hn, level, stat_date, ward, work_time, respirator) values ('$an','$hn','$level','$statdate','$ward','$worktime','$respirator')";	
			echo $sql3."<br>";
			$dbquerye3 = mysql_db_query($dbname, $sql3);




$i++;
					  }



$sql4="insert into rbh_nurse_stat  ( bedn, bedv,  level1, level2, level3, level4, level5, statdate,  ward,  worktime_int) values ('$n','$v','$t1','$t2','$t3','$t4','$t5','$statdate','$ward','$worktime')";	
$dbquerye4 = mysql_db_query($dbname, $sql4);  


	mysql_close();	
	
	
 ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>สรุปเวร</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<table width="90%"  height="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                          </tr>
                         
                         
                  
                           <tr> 
                            <td colspan="4" align="center" class="style2">บันทึกข้อมูลสรุปเวรเรียบร้อยแล้ว&nbsp;</td>
                          </tr>
                        
                            <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                          </tr>
                          
                          <tr> 
                            <td width="31%" height="31"  align="right">&nbsp;</td>
                            <td width="53%" align="left">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                          </tr>
                           <tr> 
                            <td width="31%" height="31"  align="right">&nbsp;</td>
                            <td width="53%" align="left">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                          </tr>
                           <tr> 
                            <td width="31%" height="31">&nbsp;</td>
                            <td width="53%" align="right">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                          </tr>
                      
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                         
                          <tr> 
                            <td width="31%" height="33" align="right" valign="top">&nbsp;</td>
                            <td width="53%" align="left">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                          </tr>
                       <tr> 
                            <td width="31%" height="31">&nbsp;</td>
                            <td width="53%" align="right">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td width="31%" height="33" align="right" valign="top">&nbsp;</td>
                            <td width="53%" align="left">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                          </tr>
						    <tr> 
                            <td width="31%" height="31">&nbsp;</td>
                            <td width="53%" align="right">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                          </tr>
                         
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td width="31%">&nbsp;</td>
                            <td width="53%" align="right"><div align="right">
                             
                            </div></td>
                            <td width="8%">&nbsp;</td>
                            <td width="8%">&nbsp;</td>
                          </tr>
                        
                          <tr align="center" valign="top"> 
                            <td colspan="4"></td>
                          </tr>
                          <tr align="center" valign="top">
                            <td colspan="4"></td>
                          </tr>
                      </table>
</section>
<?php include "../footer.php";?>

