<?php
require '../util/daos.php';

$dao = new Dao();

$FlightNumber = $_POST['FlightNumber'];
$AirlineCode = $_POST['AirlineCode'];
$DepartAirportCode = $_POST['DepartAirportCode'];
$ArriveAirportCode = $_POST['ArriveAirportCode'];
$FlightDay = $_POST['FlightDay'];
$FlightDepartActualTime = $_POST['FlightDepartActualTime'];
$FlightDepartScheduledTime = $_POST['FlightDepartScheduledTime'];
$FlightArrivesActualTime = $_POST['FlightArrivesActualTime'];
$FlightArrivesScheduledTime = $_POST['FlightArrivesScheduledTime'];
$AvailableSeats = $_POST['AvailableSeats'];

if (!preg_match("/^[0-9][0-9]\:[0-9][0-9]\:[0-9][0-9]$/", $FlightDepartActualTime)) {
    echo '<script type="text/javascript">alert("Ops! It seems that you have input a wrong format in FlightDepartActualTime!");window.location.href = "../add.php"</script>';
    return;
}
if (!preg_match("/^[0-9][0-9]\:[0-9][0-9]\:[0-9][0-9]$/", $FlightDepartScheduledTime)) {
    echo '<script type="text/javascript">alert("Ops! It seems that you have input a wrong format in FlightDepartScheduledTime!");window.location.href = "../add.php"</script>';
    return;
}
if (!preg_match("/^[0-9][0-9]\:[0-9][0-9]\:[0-9][0-9]$/", $FlightArrivesActualTime)) {
    echo '<script type="text/javascript">alert("Ops! It seems that you have input a wrong format in FlightArrivesActualTime!");window.location.href = "../add.php"</script>';
    return;
}
if (!preg_match("/^[0-9][0-9]\:[0-9][0-9]\:[0-9][0-9]$/", $FlightArrivesScheduledTime)) {
    echo '<script type="text/javascript">alert("Ops! It seems that you have input a wrong format in FlightArrivesScheduledTime!");window.location.href = "../add.php"</script>';
    return;
}


if (!preg_match("/^[0-9][0-9][0-9][0-9]\-[0-9][0-9]\-[0-9][0-9]$/", $FlightDay)) {
    echo '<script type="text/javascript">alert("Ops! It seems that you have input a wrong format in FlightDay!");window.location.href = "../add.php"</script>';
    return;
}

$dao->addFlight(
    $FlightNumber,
    $AirlineCode,
    $DepartAirportCode,
    $ArriveAirportCode,
    $FlightDay,
    $FlightDepartActualTime,
    $FlightDepartScheduledTime,
    $FlightArrivesActualTime,
    $FlightArrivesScheduledTime,
    $AvailableSeats
);
echo '<script type="text/javascript">alert("add successful!");window.location.href = "../airline.php"</script>';
