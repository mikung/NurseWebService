<? session_start();
 include "../header.php";
 include_once("../conn/setdb32.php");
 $nowdate = date ("Y-m-d");
require_once('calendar/calendar/classes/tc_calendar.php');
  
  
 ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ค้นหาบุคลากร</h1>
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
                            <td colspan="4" align="center"><strong>ค้นหาชื่อบุคลากรที่ต้องการแก้ไข</strong></td>
                          </tr>
                                <? if($error!=null  && $error!='') {?>
                          <tr align="center"> 
                            <td  colspan="4" ><strong><font color="#FF0000" size="2">ไม่พบ  กรุณาใส่ ชื่อหรือนามสกุลใหม่</font></strong></td>
                          </tr>
                          <? }?>
                       
                          <form  action="pr.php"  method="post"  >
                          <tr> 
                            <td width="22%" height="29"  align="right">ชื่อ หรือ นามสกุล:</td>
                            <td width="78%" colspan="3"  align="left">&nbsp;
                             
                            <input type="text" name="search" id="search">
                            <input type="submit" name="submit" id="submit" value="ต่อไป"></td>
                           
                          </tr>
                                                    </form>
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                          <tr> 
                <td colspan="4"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                    <tr bgcolor="#66CCCC"> 
                      <td width="13%"><div align="center"><font color="#000000" size="2"><strong>username</strong></font></div></td>
                      <td width="28%"><div align="center"><font color="#000000" size="2"><strong>ชื่อ-สกุล</strong></font></div></td>
                      <td width="6%"><div align="center"><font color="#000000" size="2"><strong>&nbsp;</strong></font></div></td>
                      </tr>
			<?
			$search = $_POST['search'];	 	
			if( $search!=null  &&  $search !='' )
			{ 
			$sql="SELECT * FROM opduser  where name like '%$search%' and loginname like 'rbh%' ";
			 $dbquery = mysql_db_query($dbname, $sql);
			 $num_rows = mysql_num_rows($dbquery);
			 $i=0;
  			while ($i < $num_rows) 
 				      {
    			 $result = mysql_fetch_array($dbquery); 
						   ?> 
													<tr> 
													  <td><div align="center">&nbsp;<? echo  $result['loginname']?></div></td>
													  <td>&nbsp;<? echo  $result['name'];?></td>
													  <td align="center"><strong style="font-size: 12px; font-weight: bolder; font-style: italic; color: #090;"><a href="edit.php?d_id=<? echo $result['loginname']; ?>" >แก้ไข</a></strong></td>
                                                    </tr>           
							<?
							$i++;
						}
						}
						
				  ?>
					
                  
                  </table></td>
              </tr>
                         <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td colspan="4" align="center"><strong>รายการอับเดรตล่าสุด</strong></td>
                          </tr>
                          <tr> 
                            <td colspan="4" align="center"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                    <tr bgcolor="#66CCCC"> 
                      <td width="13%"><div align="center"><font color="#000000" size="2"><strong>username</strong></font></div></td>
                      <td width="28%"><div align="center"><font color="#000000" size="2"><strong>ชื่อ-สกุล</strong></font></div></td>
                      <td width="6%"><div align="center"><font color="#000000" size="2"><strong>upadte</strong></font></div></td>
                      </tr>
			<?
			
			$sql="SELECT * FROM hos_user  where  user_name like 'rbh%' order by update_date DESC limit 20 ";
			 $dbquery = mysql_db_query($dbname, $sql);
			 $num_rows = mysql_num_rows($dbquery);
			 $i=0;
  			while ($i < $num_rows) 
 				      {
    			 $result = mysql_fetch_array($dbquery); 
						   ?> 
													<tr> 
													  <td><div align="center">&nbsp;<? echo  $result['user_name']?></div></td>
													  <td>&nbsp;<? echo  $result['name'];?></td>
													  <td align="center"><strong style="font-size: 12px; font-weight: bolder; font-style: italic; color: #090;"><? echo date ("d-m-Y hh:mm",strtotime($result['update_date']));?></strong></td>
                                                    </tr>           
							<?
							$i++;
						
						}
						mysql_close();		
				  ?>
					
                  
                  </table></td>
                          </tr>
                          <tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr><tr> 
                            <td colspan="4" align="center">&nbsp;</td>
                          </tr>
                          
                          <tr align="center" valign="top"> 
                            <td colspan="4"></td>
                          </tr>
                      </table>
</section>
<?php include "../footer.php";?>

