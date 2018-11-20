<?php
    include "../conn/pdomysql.php";
    $mysql = new pdomysql();
    $type = $_REQUEST['type'];
    $sqlN = "SELECT items AS fooditems FROM rbh_items_food WHERE '$type' IN (type1,type2,type3,type4,type5) AND food='N'";
    $dbqueryN = $mysql->selectAll($sqlN);
    foreach ($dbqueryN as $row) {
        $result[] = $row;
    }
    echo json_encode($result);


    ?>