<? session_start();
 include "../header.php";
 include_once("../conn/setdb32.php");
require_once('calendar/calendar/classes/tc_calendar.php');  


  $month = date("m");
  $year = date("Y");
  $day = $_POST['day'];
  
 
  if($dayday != '')
  {
	  $day=$dayday ;

	  }
	  
	
 $ward =$_SESSION['ward_s'];

$sql="SELECT * FROM  rbh_nurse_unit  where  unit_id = '$ward'  ";
	echo	 $sql."<br>"	;		 
			 $dbquery = mysql_db_query($dbname, $sql);
			
   $result = mysql_fetch_array($dbquery);  

 $wardname = $result['name'];

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
<script language="javascript" src="calendar/calendar/calendar.js"  ></script>
<link href="calendar/calendar/calendar.css" rel="stylesheet" type="text/css" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                        </tr>
                                    
                           <tr> 
                            <td colspan="4" align="center"><strong>หน่วยงาน: <strong><font color="#FF0000" size="3"><? echo $wardname; ?></font></strong> เดือน :</strong> <strong><font color="#FF0000" size="3"><?  switch ($month) {
    case 1:
	 echo "มกราคม";
       ;
        break;
    case 2:
        echo "กุมภาพันธ์";
        break;
    case 3:
       echo "มีนาคม";
        break;
 case 4:
       echo "เมษายน";
        break;
		case 5:
       echo "พฤษภาคม";
        break;
		case 6:
       echo "มิถุนายน";
        break;
		case 7:
       echo "กรกฎาคม";
        break;
		case 8:
       echo "สิงหาคม";
        break;
		case 9:
       echo "กันยายน";
        break;
		case 10:
       echo "ตุลาคม";
        break;
		case 11:
       echo "พฤศจิกายน";
        break;
		case 12:
       echo "ธันวาคม";
        break;
	
} ?> </font></strong>  &nbsp; <strong>ปี: </strong> <strong><font color="#FF0000" size="3"> <? echo $year; ?></font></strong></td>
                          </tr>
                             
                       
                          <form  action="save.php"  method="post"  >
                            <tr> 
                        
                            <td colspan="4"  align="left">&nbsp;                             
                               
                               </td>
                           
                          </tr>
                          <tr> 
                            <td colspan="4" align="center" >วันที่ : <strong><font color="#FF0000" size="3"><? echo $day ;?></font></strong>
                              <label for="select2">เวร:</label>
                              
                              <select name="work_time" id="select2"  class="style3">
                              <option value="EVN">ดึก</option>
                              <option value="MOR">เช้า</option>
                              <option value="AFT">บ่าย</option>
                              </select> 
                              
                              <label for="select2">ประเภทการปฏิบัติงาน:</label>
                              
                              <select name="work_type" id="work_type"  class="style3">
                              <option value="ปกติ">ปกติ</option>
                              <option value="ครึ่งเวร">ครึ่งเวร</option>
                              <option value="เสมี่ยน">เสมี่ยน</option>
                              <option value="OT1">OT1</option>
                              <option value="OT2">OT2</option>
                              <option value="OT3">OT3</option>
                              <option value="OTBD">OTBD</option>
                              <option value="onCall">onCall</option>
                              
                              </select> 
                              
                              </td>
                        </tr>
                         <tr> 
                        
                            <td colspan="4"  align="left">&nbsp;</td>
                           
                          </tr>
                       
                        <?
						    $sql="SELECT * FROM  hos_user  where  ward='$ward' and user_name like 'rbh%' and status = 'EN' order by position_g_code ";
					 echo	 $sql."<br>"	;	
			 $dbquery = mysql_db_query($dbname, $sql);
			
			 $num_rows = mysql_num_rows($dbquery);
	 $i=0;
  			while ($i < $num_rows) 
 				      {
		$i++;			  
   $result = mysql_fetch_array($dbquery);  
   ?>
                          <tr> 
                        <td width="11%"   align="left">&nbsp;</td>
                           
                            <td  colspan="2"  align="left"><input type="radio" name="nurse" id="nurse" value="<? echo $result['user_name']?>">
                              <label for="radio"><? echo $result['name']?></label>
        
                              
                              </td>
                            <td width="46%"   align="left"><? echo $result['position']?>
                            
                            <input type="hidden" name="day" id="day" value="<? echo  $day; ?>">
                            <input type="hidden" name="month" id="month" value="<? echo  $month; ?>">
                            <input type="hidden" name="year" id="year" value="<? echo $year; ?>">
                               <input type="hidden" name="user_name" id="user_name" value="<? echo  $resulte['user_name']; ?>">
                                
                            </td>
                          </tr>
    
    <?
     }                   
                      ?>  
 
                          <tr> 
                        
                            <td colspan="4"  align="center"><input name="submit" type="submit" class="style2" id="submit" value="เพิ่ม"></td>
                           
                          </tr>
                                                    </form>
                                                    <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                        </tr>
                          <tr> 
                            <td colspan="4" align="center">
                            
                            
                                   <table  width="100%" border="1" cellpadding="0" cellspacing="0">
                            <tr bgcolor="#33CCFF"> 
                            <td width="19%"><div align="center"><strong>วันที่</strong></div></td>
                             <td width="7%"><div align="center"><strong>เวร</strong></div></td>  
                             <td width="29%"><div align="center"><strong>ชื่อ-สกุล</strong></div></td>  
                              <td width="11%"><div align="center"><span style="text-align: center"><strong>ประเภท</strong></span></div></td>
                               <td width="30%"><div align="center"><strong>ตำแน่ง</strong></div></td>
                                 <td width="4%"><div align="center"><strong>&nbsp;</strong></div></td>
                              </tr>
                            
                          	  <?
						
						    $sql="SELECT * FROM  rbh_nursework  where  month(work_date) = $month and year(work_date)=$year and day(work_date)=$day and ward='$ward' and work_time='EVN' order by work_date   ";
					echo   $sql."<br>";
			 $dbquery = mysql_db_query($dbname, $sql);
			
			 $num_rows = mysql_num_rows($dbquery);
	 $i=0;
  			while ($i < $num_rows) 
 				      {
		$i++;			  
   $result = mysql_fetch_array($dbquery);  
   
   
       ?>
						  
						   <tr <? if($i%2!=0){ echo "bgcolor=#CCFFFF"; }?> > 
                           <td>&nbsp;<? echo date ("d-m-Y ",strtotime($result['work_date'])); ?></td>
                            <td>&nbsp;
							
							
							
							<? if($result['work_time']=='EVN' ) { echo "ดึก"; } ?>
                            <? if($result['work_time']=='MOR' ) { echo "เช้า"; } ?>
                            <? if($result['work_time']=='AFT' ) { echo "บ่าย"; } ?>
                            
                            
                            
                            </td>
                             <td>&nbsp;<? echo  $result['name'] ?></td> 
                              <td>&nbsp;<? echo  $result['typework'] ?></td>
                              <td>&nbsp;<? echo  $result['position'] ?></td>
                              <td>&nbsp;<a href="del.php?daydel=<? echo $day;?>&id=<? echo  $result['nursework_id'];?>">ลบ</a></td>
                              </tr>

                          <?    }  ?>
                            
                              <?
						
						    $sql="SELECT * FROM  rbh_nursework  where  month(work_date) = $month and year(work_date)=$year and day(work_date)=$day and ward='$ward' and work_time='MOR' order by work_date   ";
					 echo	 $sql."<br>"	;	
			 $dbquery = mysql_db_query($dbname, $sql);
			
			 $num_rows = mysql_num_rows($dbquery);
	 $i=0;
  			while ($i < $num_rows) 
 				      {
		$i++;			  
   $result = mysql_fetch_array($dbquery);  
   
   
       ?>
						  
						   <tr <? if($i%2!=0){ echo "bgcolor=#CCFFFF"; }?> > 
                           <td>&nbsp;<? echo date ("d-m-Y ",strtotime($result['work_date'])); ?></td>
                            <td>&nbsp;
							
							
							
							<? if($result['work_time']=='EVN' ) { echo "ดึก"; } ?>
                            <? if($result['work_time']=='MOR' ) { echo "เช้า"; } ?>
                            <? if($result['work_time']=='AFT' ) { echo "บ่าย"; } ?>
                            
                            
                            
                            </td>
                             <td>&nbsp;<? echo  $result['name'] ?></td> 
                              <td>&nbsp;<? echo  $result['typework'] ?></td>
                              <td>&nbsp;<? echo  $result['position'] ?></td><td>&nbsp;<a href="del.php?daydel=<? echo $day;?>&id=<? echo  $result['nursework_id'];?>">ลบ</a></td>
                              </tr>

                          <?    }  ?>
                          
                          
                           <?
						
						    $sql="SELECT * FROM  rbh_nursework  where  month(work_date) = $month and year(work_date)=$year and day(work_date)=$day and ward='$ward' and work_time='AFT' order by work_date   ";
					 echo	 $sql."<br>"	;	
			 $dbquery = mysql_db_query($dbname, $sql);
			
			 $num_rows = mysql_num_rows($dbquery);
	 $i=0;
  			while ($i < $num_rows) 
 				      {
		$i++;			  
   $result = mysql_fetch_array($dbquery);  
   
   
       ?>
						  
						   <tr <? if($i%2!=0){ echo "bgcolor=#CCFFFF"; }?> > 
                           <td>&nbsp;<? echo date ("d-m-Y ",strtotime($result['work_date'])); ?></td>
                            <td>&nbsp;
							
							
							
							<? if($result['work_time']=='EVN' ) { echo "ดึก"; } ?>
                            <? if($result['work_time']=='MOR' ) { echo "เช้า"; } ?>
                            <? if($result['work_time']=='AFT' ) { echo "บ่าย"; } ?>
                            
                            
                            
                            </td>
                             <td>&nbsp;<? echo  $result['name'] ?></td> 
                              <td>&nbsp;<? echo  $result['typework'] ?></td>
                              <td>&nbsp;<? echo  $result['position'] ?></td><td>&nbsp;<a href="del.php?daydel=<? echo $day;?>&id=<? echo  $result['nursework_id'];?>">ลบ</a></td>
                              </tr>

                          <?    }  ?>
                            
                            
                            
                            </table>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            </td>
                          </tr>
                          
                         
                          
                         
                            
                            	 
                            
                            
                          
                          
                            
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                            
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                            
                          <tr> 
                            <td colspan="4" align="center">---------------------------------------------------------------------------------</td>
                          </tr>
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                           <form action="add.php?dayday=<? echo $day;?>" method="post">
                              <tr> 
                            <td colspan="4" align="center">
                          <label for="textfield">ชื่อ-สุกล:</label>
                              <input type="text" name="search" id="search"><input type="submit" name="submit2" id="submit2" value="ค้นหาบุคลากรนอกหน่วยงาน">
                            
                     &nbsp;</td>
                          </tr>
                          
                          </form>
                          
                          <? 
						  $searchtext = $_POST['search'];
						  
						  if($searchtext != null && $searchtext != '') {?>
                            <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                            <form  action="save.php"  method="post"  > 
                          <tr> 
                            <td colspan="4" align="center" >วันที่ : <strong><font color="#FF0000" size="3"><? echo $day ;?></font></strong>
                              <label for="select2">เวร:</label>
                              
                              <select name="work_time" id="select2"  class="style3">
                              <option value="EVN">ดึก</option>
                              <option value="MOR">เช้า</option>
                              <option value="AFT">บ่าย</option>
                              </select> 
                              
                              <label for="select2">ประเภทการปฏิบัติงาน:</label>
                              
                              <select name="work_type" id="work_type"  class="style3">
                              <option value="ปกติ">ปกติ</option>
                              <option value="ครึ่งเวร">ครึ่งเวร</option>
                              <option value="เสมี่ยน">เสมี่ยน</option>
                              <option value="OT1">OT1</option>
                              <option value="OT2">OT2</option>
                              <option value="OT3">OT3</option>
                              <option value="OTBD">OTBD</option>
                              <option value="onCall">onCall</option>
                              
                              </select> 
                              
                              </td>
                        </tr>
                              <?
						    $sql="SELECT * FROM  hos_user  where  user_name like 'rbh%' and  name like '%$search%' order by position_g_code ";
					 
			 $dbquery = mysql_db_query($dbname, $sql);
			
			 $num_rows = mysql_num_rows($dbquery);
	 $i=0;
  			while ($i < $num_rows) 
 				      {
		$i++;			  
   $result = mysql_fetch_array($dbquery);  
   ?>
                          <tr> 
                        <td width="11%"   align="left">&nbsp;</td>
                           
                            <td  colspan="2"  align="left"><input type="radio" name="nurse" id="nurse" value="<? echo $result['user_name']?>">
                              <label for="radio"><? echo $result['name']?></label>
        
                              
                              </td>
                            <td width="46%"   align="left"><? echo $result['position']?>
                            
                            <input type="hidden" name="day" id="day" value="<? echo  $day; ?>">
                            <input type="hidden" name="month" id="month" value="<? echo  $month; ?>">
                            <input type="hidden" name="year" id="year" value="<? echo $year; ?>">
                               <input type="hidden" name="user_name" id="user_name" value="<? echo  $resulte['user_name']; ?>">
                                
                            </td>
                          </tr>
    
    <?
     }                   
                      ?>  
                      
                       <tr> 
                        
                            <td colspan="4"  align="center"><input name="submit" type="submit" class="style2" id="submit" value="เพิ่ม"></td>
                           
                          </tr>
                      </form>
                      <? }?>
                              <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                         
                          <tr align="center" valign="top"> 
                            <td colspan="4"></td>
                          </tr>
                      </table>
</section>
<?php include "../footer.php";?>

