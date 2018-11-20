<?php
    session_start();
    include "header.php";
    include "conn/pdomysql.php";
    date_default_timezone_set('Asia/Bangkok');
    $mysql = new pdomysql();
    $dateNow = date("Y-m-d");
    $hn = $_REQUEST['hn'];
    include "conn/rbh.php";
    $rbh = new rbh();
?>

<script  type="text/javascript">
    $(document).ready(function(){
        $('#foodtype').change(function(){
            var foodtype = $("#foodtype").val();
            if (foodtype == 1 || foodtype == 2 || foodtype == 3){
                $("#divchk").css("display", "block");
                $("#divradio").css("display", "none");
                $("#div6").css("display", "none");
                $("#div7").css("display", "none");
                $("#div8").css("display", "none");
            }else if (foodtype == 4 || foodtype == 5){
                $("#divradio").css("display", "block");
                $("#divchk").css("display", "none");
                $("#div6").css("display", "none");
                $("#div7").css("display", "none");
                $("#div8").css("display", "none");
            }else if (foodtype == 6){
                $("#div6").css("display", "block");
            }else if (foodtype == 7){
                $("#div7").css("display", "block");
            }else if (foodtype == 8){
                $("#div8").css("display", "block");
            }
        });
    });
</script>

<style type="text/css">
    textarea{ resize: none;}
    #divchk, #divradio, #div6, #div7, #div8{ display: none;}
</style>  

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Blank Page</h1>
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
    <!-- Default box -->
    <div class="card card-info card-outline">
        <div class="card-header">            
            <h3 class="card-title">ระบบสั่งอาหารออนไลน์ </h3>
            <!-- tools box -->
            <div class="card-tools">
                <p>วันที่ <?= $rbh->thaiDate('','long') ?></p>
            </div>
            <!-- /. tools -->
        </div>
        <div class="card-body"> 
            <div class="table-responsive" style="text-align: center;">
                <table class="col-sm-8 offset-sm-2 table-borderless " id="tableData" >
                    <tr>
                        <td width="50%" align="right"><strong>HN :&nbsp;</strong></td>
                        <td width="50%" align="left">&nbsp;<?= $hn; ?></td>
                    </tr>

                    <tr>
                        <td width="50%" align="right"><strong>ชื่อ-นามสกุล :&nbsp;</strong></td>
                        <td width="50%" align="left">&nbsp;<?= $ptname?></td>
                    </tr>

                    <tr>
                        <td width="50%" align="right"><strong>อาหาร :&nbsp;</strong></td>
                        <td width="50%" align="left"> 
                            <?php 
                                $sql= "SELECT * FROM rbh_foodtype order by id ASC";
                                $result = $mysql->selectAll($sql);
                                if ($result) { ?>
                                    <select id="foodtype" name="foodtype" class="form-control form-control-sm" style="width:auto;">
                                    <option value=""></option>
                                <?php   foreach ($result as $row) { ?>                                       
                                        <option value= "<?= $row['id'] ?>"><?=$row['foodtype'] ?></option>
                                <?php   }?>
                                    </select>
                            <?php } ?>                                      
                        </td> 
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                </table>      
            </div>


            <!-- DIV CHECKBOX -->
                <div id="divchk" class="table-responsive">
                    <table class="col-sm-8 offset-sm-2 table-bordered">
                        <tr>
                            <tr style="height: 50px;">
                                <td width="50%" class="bg bg-info" align="center">อาหารทั่วไป</td>
                                <td width="50%" class="bg bg-info" align="center">อาหารเฉพาะโรค</td>
                            </tr>
                            <td width="50%" valign="top">
                                <table class="table-borderless">
                                    <?php 
                                        $sqlN = "SELECT items FROM rbh_items_food WHERE 1 IN (type1,type2,type3,type4,type5) AND food='N'";
                                        $dbqueryN = $mysql->selectAll($sqlN);
                                        foreach ($dbqueryN as $row) {
                                    ?>
                                        <tr>
                                            <td valign="top">
                                                <input type="checkbox" class="minimal" name="normalfood[]" value="<?= $row['items']?>" ><?= "&nbsp;".$row['items'] ?>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </table>
                            </td>

                            <td width="50%" valign="top">
                                <table class="table-borderless">                            
                                    <?php 
                                        $sqlS = "SELECT items FROM rbh_items_food WHERE 1 IN (type1,type2,type3,type4,type5) AND food='S'";
                                        $dbqueryS = $mysql->selectAll($sqlS);
                                        foreach ($dbqueryS as $rs) {                                
                                    ?>
                                        <tr>
                                            <td valign="top">
                                                <input type="checkbox" class="minimal" name="specialfood[]" value="<?= $rs['items']?>"><?= '&nbsp'.$rs['items'] ?>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>
                </div>
            <!-- END DIV CHECKBOX -->

            <!-- DIV RADIO -->
                <div id="divradio" class="table-responsive">
                    <table class="col-sm-8 offset-sm-2 table-bordered">
                        <tr>
                            <tr style="height: 50px;">
                                <td width="50%" class="bg bg-info" align="center">อาหารทั่วไป</td>
                                <td width="50%" class="bg bg-info" align="center">อาหารเฉพาะโรค</td>
                            </tr>
                            <td width="50%" valign="top">
                                <table class="table-borderless">
                                    <?php 
                                        $sqlN = "SELECT items FROM rbh_items_food WHERE 2 IN (type1,type2,type3,type4,type5) AND food='N'";
                                        $dbqueryN = $mysql->selectAll($sqlN);
                                        foreach ($dbqueryN as $row) {
                                    ?>
                                        <tr>
                                            <td valign="top">
                                                <input type="radio" class="minimal" name="normalfood[]" value="<?= $row['items']?>" ><?= "&nbsp;".$row['items'] ?>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </table>
                            </td>

                            <td width="50%" valign="top">
                                <table class="table-borderless">                            
                                    <?php 
                                        $sqlS = "SELECT items FROM rbh_items_food WHERE 2 IN (type1,type2,type3,type4,type5) AND food='S'";
                                        $dbqueryS = $mysql->selectAll($sqlS);
                                        foreach ($dbqueryS as $rs) {                                
                                    ?>
                                        <tr>
                                            <td valign="top">
                                                <input type="checkbox" class="minimal" name="specialfood[]" value="<?= $rs['items']?>"><?= '&nbsp'.$rs['items'] ?>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>
                </div>
            <!-- END DIV RADIO -->

            <!-- TYPE 6 -->
                <div id="div6" class="table-responsive">
                    <table class="col-sm-8 offset-sm-2 table-borderless">
                        <tr style="height: 50px;"><td colspan="3" class="bg-info">&nbsp;ความเข้มข้น</td></tr>
                        <tr>
                            <td width="33%"><input type="radio" class="minimal" name="intensity" value="1:1" >&nbsp;1:1</td>
                            <td width="33%"><input type="radio" class="minimal" name="intensity" value="1:2:1" >&nbsp;1:2:1</td>
                            <td width="33%"><input type="radio" class="minimal" name="intensity" value="1:5:1" >&nbsp;1:5:1</td>
                        </tr>
                        <tr>
                            <td><input type="radio" class="minimal" name="intensity" value="2:1" >&nbsp;2:1</td>
                            <td><input type="radio" class="minimal" name="intensity" value="อื่นๆ" >&nbsp;อื่นๆ</td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>

                        <tr style="height: 50px;"><td colspan="3" class="bg-info">&nbsp;สูตรอาหาร</td></tr>
                        
                        <tr style="height: 40px;"><td colspan="3" class="text-info">Complete Diet</td></tr>
                        <tr>
                            <td><input type="radio" class="minimal" name="recipe" value="Nutren Optimem" >&nbsp;Nutren Optimem</td>
                            <td><input type="radio" class="minimal" name="recipe" value="Isocal" >&nbsp;Isocal</td>
                            <td><input type="radio" class="minimal" name="recipe" value="Ensure" >&nbsp;Ensure</td>
                        </tr>
                        <tr>
                            <td><input type="radio" class="minimal" name="recipe" value="Blendera MF" >&nbsp;Blendera MF</td>
                            <td colspan="2">
                                <input type="radio" class="minimal" name="recipe" value="Nutren Junior(สำหรับเด็ก 1-10 ปี)" >&nbsp;Nutren Junior(สำหรับเด็ก 1-10 ปี)
                            </td>
                        </tr>

                        <tr style="height: 40px;"><td colspan="3" class="text-info">Diabeic Formula</td></tr>
                        <tr>
                            <td><input type="radio" class="minimal" name="recipe" value="Gen Dm" >&nbsp;Gen DM</td>
                            <td><input type="radio" class="minimal" name="recipe" value="Glucerna" >&nbsp;Glucerna</td>
                        </tr>

                        <tr style="height: 40px;"><td colspan="3" class="text-info">Immune Formula</td></tr>
                        <tr><td colspan="3"><input type="radio" class="minimal" name="recipe" value="Neomune" >&nbsp;Neomune</td></tr>
                                    
                        <tr style="height: 40px;"><td colspan="3" class="text-info">Hepatic Formula</td></tr>
                        <tr><td colspan="3"><input type="radio" class="minimal" name="recipe" value="Aminoleban" >&nbsp;Aminoleban</td></tr>
                                    
                        <tr style="height: 40px;"><td colspan="3" class="text-info">Elementel Diet</td></tr>
                        <tr>
                            <td><input type="radio" name="recipe" class="minimal" value="Peptamen(แนบใบขออนุมัติ)" >&nbsp;Peptamen(แนบใบขออนุมัติ)</td>
                            <td><input type="radio" name="recipe" class="minimal" value="Pan-Enteral" >&nbsp;Pan-Enteral</td></tr>
                        <tr>

                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr style="height: 50px;">
                            <td colspan="3" class="bg-info">
                                &nbsp;ปริมาณอาหาร
                                <input  name="amount" type="text"  style="width:70px;">&nbsp;C.C.&nbsp;X
                                <input style="width:70px;" type="text"  name="meal">&nbsp;มื้อ
                            </td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                    </table>
                    <p>&nbsp;</p>
                </div>
            <!-- END TYPE 6 -->

            <!-- TYPE 7 -->
                <div id="div7"  class="table-responsive">
                    <table class="col-sm-8 offset-sm-2 table-bordered">
                    	<tr style="height: 40px;">
                    		<td class="bg-info">&nbsp;นมผงดัดแปลงสูตรปกติ</td>
                        	<td width="25%"><input type="radio" class="minimal" name="recipe" value="S-26">&nbsp;S-26</td>
                        	<td width="25%"><input type="radio" class="minimal" name="recipe" value="Bebe">&nbsp;Bebe</td>
                        	
                        </tr>

                        <tr style="height: 40px;">
                        	<td class="bg-info">&nbsp;นมผงดัดแปลงสูตรแพ้โปรตีนนมวัว</td>
                        	<td colspan="2"><input type="radio" class="minimal" name="recipe" value="Nutramigen">&nbsp;Nutramigen</td>
                        </tr>

                        <tr style="height: 40px;">
                        	<td class="bg-info">&nbsp;นมผงดัดแปลงสูตร Lectose free</td>
                        	<td colspan="2"><input type="radio" class="minimal" name="recipe" value="EnFalac Lactose free">&nbsp;EnFalac Lactose free</td>
                        </tr>
                        
                        <tr style="height: 40px;">
                        	<td class="bg-info">&nbsp;นมผงดัดแปลงสูตรคลอดก่อนกำหนดและน้ำหนักแรกเกิดต่ำกว่า 1800 กรัม</td>
                        	<td colspan="2"><input type="radio" class="minimal" name="recipe" value="EnFalac Premature">&nbsp;EnFalac Premature</td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>
                </div>
            <!-- END TYPE 7 -->

            <!-- TYPE 8 -->
                <div id="div8"  class="table-responsive">
                    <table class="col-sm-8 offset-sm-2 table-bordered">
                    	<tr style="height: 50px;"><td colspan="3" class="bg-info">&nbsp;ความเข้มข้น</td></tr>
                        <tr>
                            <td width="33%"><input type="radio" class="minimal" name="intensity" value="1:1" >&nbsp;1:1</td>
                            <td width="33%"><input type="radio" class="minimal" name="intensity" value="1:2:1" >&nbsp;1:2:1</td>
                            <td width="33%"><input type="radio" class="minimal" name="intensity" value="1:5:1" >&nbsp;1:5:1</td>
                        </tr>
                        <tr>
                            <td><input type="radio" class="minimal" name="intensity" value="2:1" >&nbsp;2:1</td>
                            <td><input type="radio" class="minimal" name="intensity" value="อื่นๆ" >&nbsp;อื่นๆ</td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>

                        <tr style="height: 50px;"><td colspan="3" class="bg-info">&nbsp;สูตรอาหาร</td></tr>
                        <tr>
                            <td width="33%"><input type="radio" name="recipe" value="ปกติ" >ปกติ</td>
                            <td width="33%"><input type="radio" name="recipe" value="หวานน้อย" >หวานน้อย</td>
                            <td width="33%"><input type="radio" name="recipe" value="แพ้นม" >แพ้นม</td>
                        </tr>
                        <tr><td><input type="radio" name="recipe" value="ไต">ไต</td></tr>
                        <tr><td colspan="3">&nbsp;</td></tr>

                        <tr style="height: 50px;">
                            <td colspan="3" class="bg-info">
                                &nbsp;ปริมาณอาหาร
                                <input  name="amount" type="text" style="width:70px;">&nbsp;C.C.&nbsp;X
                                <input style="width:70px;" type="text"  name="meal">&nbsp;มื้อ
                            </td>
                        </tr>
                        <tr><td colspan="3" align="left" valign="top">มื้อเช้า&nbsp;<input style="width:70px; type="text" name="breakfast">&nbsp;Feed</td></tr>
                        <tr><td colspan="3" align="left" valign="top">มื้อกลางวัน&nbsp;<input style="width:70px; type="text" name="lunch">&nbsp;Feed</td></tr>
                        <tr><td colspan="3" align="left" valign="top">มื้อเย็น&nbsp;<input  style="width:70px;type="text" name="dinner">&nbsp;Feed</td></tr>
                    </table>
                    <p>&nbsp;</p>
                </div>
            <!-- END TYPE 8 -->

            <div class="table-responsive">
                <table class="col-sm-8 offset-sm-2 table-borderless">
                    <tr>
                        <td width="30%">&nbsp;</td>
                        <td width="20%" align="right"><strong>อาหารอื่นๆหรือเพิ่มเติม :&nbsp;</strong></td>
                        <td width="50%" align="left" valign="top">
                            <textarea name="extrafood" rows="6" class="form-control" style="width: 400px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>                        
                        <td class="text text-danger">
                            <strong>*** การพิมพ์รายการอาหารเพิ่มเติม กรุณาเว้นวรรคคำด้วยนะครับ<br>ถ้าไม่เว้นวรรคอาจทำให้รายการอาหารขึ้นไม่ครบ ***</strong>
                        </td>
                    </tr>
                    <tr><td colspan="3">&nbsp;</td></tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="minimal" name="irc" value="checked" >
                        &nbsp;IRC เพิ่ม 1 ถาด ธรรมดาให้ญาติ</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="minimal" name="onlyuse" value="checked" >
                        &nbsp;ผู้ป่วยติดเชื้อ/ดื้อยา/ผู้ป่วย TB ใช้ภาชนะแล้วทิ้ง</td>
                    </tr>
                    <tr><td colspan="3">&nbsp;</td></tr>
                    <tr>                        
                        <td colspan="3" align="center">
                            <button type="submit" class="btn btn-success">บันทึก</button>
                            <button type="button" class="btn btn-danger">ยกเลิก</button>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card --> 
   
</section>
<?php include "footer.php";?>
