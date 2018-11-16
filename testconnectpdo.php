<?php include "header.php";
error_reporting(E_ALL);
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

<section class="content">
<div class="container">
    <!-- iCheck -->
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">iCheck - Checkbox &amp; Radio Inputs</h3>
        </div>
        <div class="card-body">
            <!-- Minimal style -->

            <!-- checkbox -->
            <div class="form-group">
                <label>
                    <input type="checkbox" class="minimal" checked>
                </label>
                <label>
                    <input type="checkbox" class="minimal">
                </label>
                <label>
                    <input type="checkbox" class="minimal" disabled>
                    Minimal skin checkbox
                </label>
            </div>

            <!-- radio -->
            <div class="form-group">
                <label>
                    <input type="radio" name="r1" class="minimal" checked>
                </label>
                <label>
                    <input type="radio" name="r1" class="minimal">
                </label>
                <label>
                    <input type="radio" name="r1" class="minimal" disabled>
                    Minimal skin radio
                </label>
            </div>

            <!-- Minimal red style -->

            <!-- checkbox -->
            <div class="form-group">
                <label>
                    <input type="checkbox" class="minimal-red" checked>
                </label>
                <label>
                    <input type="checkbox" class="minimal-red">
                </label>
                <label>
                    <input type="checkbox" class="minimal-red" disabled>
                    Minimal red skin checkbox
                </label>
            </div>

            <!-- radio -->
            <div class="form-group">
                <label>
                    <input type="radio" name="r2" class="minimal-red" checked>
                </label>
                <label>
                    <input type="radio" name="r2" class="minimal-red">
                </label>
                <label>
                    <input type="radio" name="r2" class="minimal-red" disabled>
                    Minimal red skin radio
                </label>
            </div>

            <!-- Minimal red style -->

            <!-- checkbox -->
            <div class="form-group">
                <label>
                    <input type="checkbox" class="flat-red" checked>
                </label>
                <label>
                    <input type="checkbox" class="flat-red">
                </label>
                <label>
                    <input type="checkbox" class="flat-red" disabled>
                    Flat green skin checkbox
                </label>
            </div>

            <!-- radio -->
            <div class="form-group">
                <label>
                    <input type="radio" name="r3" class="flat-red" checked>
                </label>
                <label>
                    <input type="radio" name="r3" class="flat-red">
                </label>
                <label>
                    <input type="radio" name="r3" class="flat-red" disabled>
                    Flat green skin radio
                </label>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Many more skins available. <a href="http://fronteed.com/iCheck/">Documentation</a>
            <div class="row">
                <input type="checkbox" class="minimal">test
            </div>
        </div>

        <?php include "conn/rbh.php";
        $thaidate = new rbh();
        echo $thaidate->thaiDate("","shortTime");
        ?>
    </div>
</div>



</section>


<?php include "footer.php"; ?>
