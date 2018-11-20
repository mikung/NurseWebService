<? session_start();
 include "../header.php";
 include_once("../conn/setdb32.php");
require_once('calendar/calendar/classes/tc_calendar.php');
  $month = date("m");
  $year = date("Y");
  $ward =$_SESSION['ward_s'];
 
$sql="SELECT * FROM  rbh_nurse_unit  where  unit_id = '$ward'  ";
					 
			 $dbquery = mysql_db_query($dbname, $sql);
			
   $result = mysql_fetch_array($dbquery);  

 $wardname = $result['name'];
  
 ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ตารางเวร</h1>
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
                              
                       
                          <form  action="add.php"  method="post"  >
                          <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                        </tr>
                          <tr> 
                            <td width="22%" height="29"  align="right">เพิ่มการปฏิบัติงาน&nbsp;</td>
                            <td width="78%" colspan="3"  align="left">&nbsp;
                              วันที่:
                              <select name="day" id="day" class="style3">
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                               <option value="7">7</option>
                               <option value="8">8</option>
                               <option value="9">9</option>
                               <option value="10">10</option>
                               <option value="11">11</option>
                               <option value="12">12</option>
                               <option value="13">13</option>
                               <option value="14">14</option>
                               <option value="15">15</option>
                               <option value="16">16</option>
                               <option value="17">17</option>
                               <option value="18">18</option>
                               <option value="19">19</option>
                               <option value="20">20</option>
                               <option value="21">21</option>
                               <option value="22">22</option>
                               <option value="23">23</option>
                               <option value="24">24</option>
                               <option value="25">25</option>
                               <option value="26">26</option>
                               <option value="27">27</option>
                               <option value="28">28</option>
                               <option value="29">29</option>
                               <option value="30">30</option>
                               <option value="31">31</option> 
                              </select>
                              <input name="submit" type="submit" class="style2" id="submit" value="ต่อไป"></td>
                           
                          </tr>
                                                    </form>
                                                    <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                        </tr>
                          <tr> 
                            <td colspan="4" align="center">
                            
                            
                                   <table  width="100%" border="1" cellpadding="0" cellspacing="0">
                            <tr bgcolor="#33CCFF"> 
                            <td width="17%"><div align="center"><strong>วันที่</strong></div></td>
                             <td width="8%"><div align="center"><strong>เวร</strong></div></td>  
                             <td width="35%"><div align="center"><strong>ชื่อ-สกุล</strong></div></td>  
                              <td width="11%"><div align="center"><span style="text-align: center"><strong>ประเภท</strong></span></div></td>
                               <td width="29%"><div align="center"><strong>ตำแน่ง</strong></div></td>
                              </tr>
                            
                            
                            
                            
                            
                            	  <?
						
						    $sql="SELECT * FROM  rbh_nursework  where  month(work_date) = $month and year(work_date)=$year  and ward='$ward' order by work_date,work_time  ";
					 
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
                              </tr>

                          <?    }  ?>
          
                            </table>
    
                            </td>
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

