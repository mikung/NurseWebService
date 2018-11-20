<? session_start();
 include "../header.php";
 include_once("../conn/setdb32.php");
date_default_timezone_set('Asia/Bangkok');
  $month = date("m");
  $year = date("Y");
  $ward =$_SESSION['ward_s'];

$sql="SELECT statdate,DATE_ADD(statdate,INTERVAL 1 DAY) as nextdate ,worktime_int FROM  rbh_nurse_stat  where  ward = '$ward'  order by statdate DESC,worktime_int DESC limit 1";
					 
			 $dbquery = mysql_db_query($dbname, $sql);
			
   $result = mysql_fetch_array($dbquery);
if($result['worktime_int']==3)  {   
$statdate =  $result['nextdate'];
$worktime=1;
}else{
$statdate =  $result['statdate'];
$worktime=$result['worktime_int']+1;
}
 
  
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
  <table width="100%" border="0"  cellspacing="0" cellpadding="0">
                      <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                        </tr>
                                    
                           <tr> 
                            <td colspan="4" align="center"><strong>หน่วยงาน: <strong><font color="#FF0000" size="3"><? echo $ward; ?></font></strong> วันที่ :</strong> <strong><font color="#FF0000" size="3"><? echo date ("d-m-Y ",strtotime($statdate)); ?> </font></strong>  &nbsp;<strong>เวร: </strong> <strong><font color="#FF0000" size="3"> <? if($worktime==1){ echo "ดึก";} if($worktime==2){ echo "เช้า";}if($worktime==3){ echo "บ่าย";}




 ?></font></strong></td>
                          </tr>
                              
                       
                                                    <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                        </tr>
                          <tr> 
                            <td colspan="4" align="center">
                            
                            
                                   <table  width="100%" border="1" cellpadding="0" cellspacing="0">
                            <tr bgcolor="#33CCFF"> 
                            <td width="11%"><div align="center"><strong>เตียง</strong></div></td>  
                            <td width="50%"><div align="center"><strong>ชื่อ-สกุล</strong></div></td>  
                              <td width="12%"><div align="center"><span style="text-align: center"><strong>ประเภท</strong></span></div></td>
                               <td width="20%"><div align="center"><strong>เครื่องช่วยหายใจ</strong></div></td>
                                <td width="7%"><div align="center"><strong>&nbsp;</strong></div></td>
                              </tr>
                            
                            
                            
                            
                            
                            	  <?
						
						    $sql="SELECT ia.bedno as bedno ,p.fname as fname,p.lname as lname ,t.level as level , t.respirator as respirator, i.hn as hn, i.an as an FROM  ipt i left outer join patient p on i.hn = p.hn  left outer join rbh_nursept_item t on i.an = t.an  left outer join iptadm ia on i.an = ia.an where  (i.dchdate is null  or i.dchdate ='') and ward='$ward'  order by ia.bedno ";
					 
			 $dbquery = mysql_db_query($dbname, $sql);
			
			 $num_rows = mysql_num_rows($dbquery);
	 $i=0;
  			while ($i < $num_rows) 
 				      {
		$i++;			  
   $result = mysql_fetch_array($dbquery);  
   
   
       ?>
						  
						   <tr <? if($i%2!=0){ echo "bgcolor=#CCFFFF"; }?> >
                             <td>&nbsp;<? echo  $result['bedno'] ?></td>  
                           <td>&nbsp;<? echo  $result['fname'] ?>&nbsp;<? echo  $result['lname'] ?></td> 
                              <td>&nbsp;<? echo  $result['level'] ?></td>
                              <td>&nbsp;<? echo  $result['respirator'] ?></td>
                              <td align="center"><strong>&nbsp;<a href="ptedit.php?an=<? echo  $result['an'];?>&hn=<? echo  $result['hn'];?>">แก้ไข</a></strong></td>
                              </tr>

                          <?    }  ?>
          
                            </table>
    
                            </td>
                          </tr>
                       <form action="nursestatsave.php" method="post">
                          <tr> 
                            <td colspan="4" align="center" >
                            
                              <input type="hidden" name="statdate" id="statdate" value="<? echo $statdate; ?>" >
                            <input type="hidden" name="ward" id="ward" value="<? echo $ward; ?>" >
                            <input type="hidden" name="worktime" id="worktime"  value="<? echo $worktime;?>">
                            <input type="submit" class="poom"  name="submit" id="submit" value="บันทึกสรุปเวร"></td>
                          </tr>
                         </form>
                          <tr align="center" valign="top"> 
                            <td colspan="4"></td>
                          </tr>
                      </table>
</section>
<?php include "../footer.php";?>

