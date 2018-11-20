<?php
/**
 * Created by PhpStorm.
 * User: Mikung
 * Date: 09/11/2561
 * Time: 08:52
 */
session_start();
header("Content-type: image/jpeg");
echo $_SESSION['opduser']['picture'];