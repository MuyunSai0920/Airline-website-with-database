<?php
require '../util/daos.php';

$dao = new Dao();
$time = $_GET["time"];
if (!preg_match("/^[0-9][0-9]\:[0-9][0-9]\:[0-9][0-9]$/", $time)) {
    echo '<script type="text/javascript">alert("Ops! It seems that you have input a wrong format!");window.location.href = "../airline.php"</script>';
    return;
}
$dao->modifyDepartActualTime($time, $_GET["FlightNumber"]);
echo '<script type="text/javascript">window.location.href = "../airline.php"</script>';
