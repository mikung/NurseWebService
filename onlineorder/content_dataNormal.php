<?php
    include "../conn/pdomysql.php";
    $mysql = new pdomysql();
    $type = $_REQUEST['type'];

    ?>

<table class="col-sm-8 offset-sm-2 table-bordered">
    <tr>
    <tr style="height: 50px;">
        <td width="50%" class="bg bg-info" align="center">อาหารทั่วไป</td>
        <td width="50%" class="bg bg-info" align="center">อาหารเฉพาะโรค</td>
    </tr>
    <td width="50%" valign="top">
        <table class="table-borderless" id="foodNormal">
            <tbody>
            <?php
                $sqlN = "SELECT items AS fooditems FROM rbh_items_food WHERE '$type' IN (type1,type2,type3,type4,type5) AND food='N'";
                $dbqueryN = $mysql->selectAll($sqlN);
                foreach ($dbqueryN as $row) { ?>
                 <tr>
                     <td>
                         <input type='checkbox' class='minimal' name='normalfood[]'
                                value='<?= $row['fooditems']?>'>&nbsp;<?= $row['fooditems']?>
                     </td>
                 </tr>
            <?php } ?>
            </tbody>
        </table>
    </td>

    <td width="50%" valign="top">
        <table class="table-borderless" id="foodSpecific">
            <?php
            $sqlN = "SELECT items AS fooditems FROM rbh_items_food WHERE '$type' IN (type1,type2,type3,type4,type5) AND food='S'";
            $dbqueryN = $mysql->selectAll($sqlN);
            foreach ($dbqueryN as $row) { ?>
                <tr>
                    <td>
                        <input type='checkbox' class='minimal' name='normalfood[]'
                               value='<?= $row['fooditems']?>'>&nbsp;<?= $row['fooditems']?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </td>
    </tr>
</table>
