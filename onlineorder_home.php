<?php
    session_start();
    include "header.php";
    include "conn/pdomysql.php";
    date_default_timezone_set('Asia/Bangkok');
    $mysql = new pdomysql();
    $ward = $_SESSION['hos_user']['ward'];
    $dateNow = date("Y-m-d");


 

    function dateThai($strDate){
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("m",strtotime($strDate));
        $strDay= date("d",strtotime($strDate));
        
        $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม",
                  "มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

?>

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
    <h2 style="text-align: center; margin-top: 15px;">ระบบสั่งอาหารออนไลน์</h2>   
    <h4 style="text-align: center; margin-bottom: 15px;">วันที่ <?=  dateThai($dateNow); ?></h4>
    <!-- Default box -->
    <div class="card card-info card-outline">
        <div class="card-header">
            <?php 
                $sqlWard = "SELECT COUNT(*) AS amountPT, u.name As wardname
                            FROM ipt i  
                            LEFT OUTER JOIN rbh_nurse_unit u ON i.ward = u.unit_id  
                            WHERE i.dchdate IS NULL AND i.ward = '$ward'";
                $res = $mysql->selectOne($sqlWard);
            ?>
            <h3 class="card-title">WARD : <?= $res['wardname'];?></h3>
            <!-- tools box -->
            <div class="card-tools">
                <p>จำนวนคนไข้ในหอผู้ป่วย <?= $res['amountPT'];?> คน</p>
            </div>
            <!-- /. tools -->
        </div>
        <div class="card-body">         
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead style="text-align: center;">
                    <tr role="row">
                        <th>เตียง</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ประเภทอาหาร</th>
                        <th>อาหารเพิ่มเติม</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT a.bedno, i.dchdate, i.hn, i.an, CONCAT(p.pname,p.fname,'  ',p.lname)AS ptname, 
                                t.id, t.short, o.food_extra
                                FROM ipt i  LEFT OUTER JOIN iptadm a ON i.an = a.an
                                LEFT OUTER JOIN patient p ON i.hn = p.hn
                                LEFT OUTER JOIN rbh_onlineorder o ON p.hn = o.hn
                                LEFT OUTER JOIN rbh_foodtype t ON o.food_type = t.id
                                WHERE i.dchdate IS NULL AND i.ward = '$ward'
                                ORDER BY i.an ASC";

                        $result = $mysql->selectAll($sql);
                        if ($result) {
                            foreach ($result as $row) {?>
                               <tr>
                                    <td align="center"><?= $row['bedno'] ?></td>
                                    <td align="left"><?= $row['ptname'] ?></td>
                                    <td align="center"><?= $row['short'] ?></td>
                                    <td align="center"><?= $row['food_extra']?></td>
                                    <td align="center"><a href="onlineorder_page2.php?hn=<?= $row['hn'] ?>&ptname=<?= $row['ptname'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                </tr>
                    <?php
                            }
                        }else {
                            echo "<tr><td colspan='5'>Nothing matched your query.</td></tr>";
                        }
                    ?>
                </tbody>
              </table>
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

