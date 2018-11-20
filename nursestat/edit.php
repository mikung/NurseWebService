<? session_start();
 include "../header.php";
 include_once("../conn/setdb32.php");
 
require_once('calendar/calendar/classes/tc_calendar.php');
  $d_id=$_GET['d_id'];


$datetime = date ("Y-m-d");
$b = explode("-", $datetime);
$b[0];
$b[1];
$b[2];


$sqle="select  * from opduser where loginname='$d_id' ";
$dbquerye = mysql_db_query($dbname, $sqle);  
 $resulte = mysql_fetch_array($dbquerye);  
 
 $sql1="select  * from hos_user where user_name='$d_id' ";
$dbquery1 = mysql_db_query($dbname, $sql1);  
 $result1 = mysql_fetch_array($dbquery1); 
 $unit_id = $result1['ward'];
  $position_id  = $result1['position_id'];
  
 ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>แก้ไขข้อมูลบุคลากร</h1>
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
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                          </tr>
                          <? if($error == 'Y') {?>
                           <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                          </tr>
                           <tr> 
                            <td colspan="4" align="center" ><strong style="font-size: 24px; color: #F00;" ><marquee behavior="alternate" width="10%">>></marquee>
                              <span style="font-size: 20px">กรุณาใส่ข้อมูลในช่องที่มีเครื่องหมาย *** ให้ครบถ้วน</span>
                              <marquee behavior="alternate" width="10%"><<</marquee></strong></td>
                          </tr>
                           <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                          </tr>
                          
                          <? } ?>
                          
                       
                          <form name="form1" action="setunit.php"  method="post"  >
                          <tr> 
                            <td width="32%" height="29"  align="right">UserName:</td>
                            <td  align="left" colspan="3">&nbsp;<? echo $resulte['loginname'] ?><input type="hidden" name="loginname" id="loginname" value="<? echo  $resulte['loginname']; ?>">&nbsp;&nbsp;&nbsp;</td>
                           
                          </tr>
                           <tr> 
                            <td width="32%" height="31"  align="right">ชื่อ-สกุล:</td>
                            <td  colspan="3" align="left">&nbsp;<? echo   $resulte['name']; ?><input type="hidden" name="name" id="name" value="<? echo  $resulte['name']; ?>"></td>
                           
                          </tr>
                          <tr> 
                            <td width="32%" height="31" align="right">&nbsp;ตำแหน่ง:</td>
                            <td colspan="3"  align="left"><select  name="position_id" id="position_id" class="style2">
				  <option value="-">-</option>
				  <?
			 $sql = "select  *  from  rbh_nurse_position  where status = 'Y' order by position_id";
             $dbquery = mysql_db_query($dbname, $sql);
			 $num_rows = mysql_num_rows($dbquery);
			 $i=0;
  			while ($i < $num_rows) 
 				      {
    			 $result = mysql_fetch_array($dbquery); 
						   ?> 
                            <option  <? if($result['position_id'] ==  $position_id ) { echo "selected" ;}?>            value="<? echo  $result['position_id']?>"  ><? echo  $result['name']?></option>
							<?
							$i++;
						}
							
				  ?>
				  </select></td>
                            
                          </tr>
                          
                           <tr> 
                            <td width="32%" height="31" align="right">&nbsp;หน่วยงาน:</td>
                            <td colspan="3"  align="left"><select  name="unit_id" id="unit_id" class="style2">
				  <option value="-">-</option>
				  <?
			 $sql = "select  *  from  rbh_nurse_unit  where status = 'Y' order by unit_id";
             $dbquery = mysql_db_query($dbname, $sql);
			 $num_rows = mysql_num_rows($dbquery);
			 $i=0;
  			while ($i < $num_rows) 
 				      {
    			 $result = mysql_fetch_array($dbquery); 
						   ?> 
                            <option <? if($result['unit_id'] ==  $unit_id ) { echo "selected" ;}?>  value="<? echo  $result['unit_id']?>"  ><? echo  $result['name']?></option>
							<?
							$i++;
						}
							
				  ?>
				  </select></td>
                            
                          </tr>
                          <tr> 
                            <td width="32%" height="31" align="right">&nbsp;ประเภทการจ้าง:</td>
                            <td colspan="3"  align="left"><select  name="prtype" id="unit_id" class="style2">
				  <option value="-">-</option>
				 <option value="ข้าราชการ">ข้าราชการ</option>
                  <option value="พนักงานราชการ">พนักงานราชการ</option>
                   <option value="พนักงาน พกส">พนักงาน พกส</option>
                   <option value="ลูกจ้างชั่วคราว">ลูกจ้างชั่วคราว</option>
                    <option value="ลูกจ้างประจำ">ลูกจ้างประจำ</option>
                    
				  </select></td>
                            
                          </tr>
                           <tr class="smalltxt"> 
                             <td colspan="2" align="left">&nbsp;</td>
                             
                             <td width="68%" colspan="2" align="left">&nbsp;</td>
                             
                           </tr>          
                          <tr> 
                            <td colspan="4" align="center"> <input name="button" type="submit" class="style2" id="button" value="   บันทึก   "></td>
                          </tr>
                          
                          <tr> 
                           <td colspan="4" align="center">&nbsp;</td>
                         
                            
                          </tr>
                            </form>
                             <tr> 
                         <td colspan="4" align="center">&nbsp;</td>
                           
                          </tr>
                           <tr> 
                            <td colspan="4" align="left">&nbsp;</td>
                            
                          </tr>
                        <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                        </tr>
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                         
                          <tr align="center" valign="top"> 
                            <td colspan="4"></td>
                          </tr>
                      </table>
</section>
<?php include "../footer.php";?>

