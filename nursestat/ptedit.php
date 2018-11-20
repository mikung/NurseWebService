<? session_start();
 include "../header.php";
 include_once("../conn/setdb32.php");
require_once('calendar/calendar/classes/tc_calendar.php');  

$an = $_GET['an'];
$hn = $_GET['hn'];


$sql="SELECT p.fname as fname , p.lname as lname , r.level as level,r.respirator as respirator  FROM  patient p left outer join rbh_nursept_item r on r.hn = p.hn  where  p.hn = '$hn'  ";

					 
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
<script language="javascript" src="calendar/calendar/calendar.js"  ></script>
<link href="calendar/calendar/calendar.css" rel="stylesheet" type="text/css" >
<section class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
                        </tr>
                                    
                           <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                             
                       
                          <form  action="ptsave.php"  method="post"  >
                            <tr> 
                        
                            <td colspan="4"  align="center">&nbsp;HN:<? echo $hn; ?> &nbsp;&nbsp;&nbsp;&nbsp; AN:<? echo $an; ?>                             
                              <input type="hidden" name="an" id="an" value="<? echo  $an; ?>"> <input type="hidden" name="hn" id="hn" value="<? echo   $result['hn']; ?>"> 
                              </td>
                           
                          </tr>
                          <tr> 
                            <td height="30" colspan="4" align="center" >ชื่อ-สกุล : <strong><font color="#FF0000" size="3"><? echo $result['fname']; ?> &nbsp;&nbsp;<? echo $result['lname']; ?></font></strong></td>
                        </tr>
                         <tr> 
                        
                            <td height="54" colspan="4"   align="center">ประเภทผู้ป่วย:
                              
                              <select name="level" id="level">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              </select>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              เครื่องช่วยหายใจ:
                              
                              <select name="res" id="res">
                              <option value="no">ไม่ใส่</option>
                              <option value="Bird">Bird</option>
                              <option value="Volume Ward">Volume WARD</option>
                              <option value="Volume ICU">Volume ICU</option>
                              <option value="Volume PED">Volume PED</option>
                              <option value="Volume Bipap">Volume Bipap</option>
                              </select>
                              
                              
                              </td>
                           
                          </tr>
                       
                       
 
                          <tr> 
                        
                            <td colspan="4"  align="center"><input name="submit" type="submit" class="style2" id="submit" value="บันทึก"></td>
                           
                          </tr>
                          </form>
                                                    <tr> 
                            <td colspan="4" align="center"><strong>&nbsp;</strong></td>
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
                      </table></section>
<?php include "../footer.php";?>

