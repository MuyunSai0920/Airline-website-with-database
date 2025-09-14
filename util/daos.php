<?php
require 'Flight.php';

class Dao
{
    var $dbms = 'mysql';
    var $host = 'localhost';
    var $dbName = 'airlineDB';
    var $user = 'root';
    var $pass = '';

    var $dsn;
    var $db;

    public function __construct()
    {
        try {
            $this->dsn = "$this->dbms:host=$this->host;dbname=$this->dbName";
            $this->db = new PDO($this->dsn, $this->user, $this->pass, array(PDO::ATTR_PERSISTENT => true));
        } catch (PDOException $e) {
            die("Error!: " . $e->getMessage() . "<br/>");
        }
    }

    public function execCommand($command)
    {
        error_log($command);
        return $this->db->query($command);
    }

    public function queryAllFlights()
    {
        $resFlight = $this->execCommand("select `FlightNumber`,`FlightDepartActualTime`,`FlightDepartScheduledTime`,`FlightArrivesActualTime`,`FlightArrivesScheduledTime` from `Flight`");
        $flightArray = array();
        foreach ($resFlight as $row) {
            $FlightNumber = $row['FlightNumber'];
            $FlightDepartActualTime = $row['FlightDepartActualTime'];
            $FlightDepartScheduledTime = $row['FlightDepartScheduledTime'];
            $FlightArrivesActualTime = $row['FlightArrivesActualTime'];
            $FlightArrivesScheduledTime = $row['FlightArrivesScheduledTime'];

            $paramArray = array($FlightNumber, $FlightDepartActualTime, $FlightDepartScheduledTime, $FlightArrivesActualTime, $FlightArrivesScheduledTime);
            array_push($flightArray, new Flight($paramArray));
        }
        return $flightArray;
    }

    public function queryByDayAndAirline($day, $airline)
    {

        $resFlight = $this->execCommand("select `Flight`.`FlightNumber`, `Flight`.`DepartAirportCode`, `Flight`.`ArriveAirportCode` from `Flight`, `DayForFlight` where `Flight`.`AirlineCode` = '" . $airline . "' and `DayForFlight`.`FlightDay` = '" . $day . "' and `Flight`.`FlightNumber` = `DayForFlight`.`FlightNumber`");
        $flightArray = array();
        foreach ($resFlight as $row) {
            $FlightNumber = $row['FlightNumber'];
            $DepartCity = $this->execCommand("select `AirportLocationCity` from `Airport` where `AirportCode` = '" . $row['DepartAirportCode'] . "'");
            $ArriveCity = $this->execCommand("select `AirportLocationCity` from `Airport` where `AirportCode` = '" . $row['ArriveAirportCode'] . "'");
            foreach ($DepartCity as $de_row) {
                $departCity = $de_row['AirportLocationCity'];
            }
            foreach ($ArriveCity as $ar_row) {
                $arriveCity = $ar_row['AirportLocationCity'];
            }

            $paramArray = array($FlightNumber, $departCity, $arriveCity);
            array_push($flightArray, new Flight($paramArray));
        }
        return $flightArray;
    }

    public function queryAirlines()
    {
        $resAirline = $this->execCommand("select AirlineCode from `Airline`");
        $airlineCode = array();
        foreach ($resAirline as $row) {
            array_push($airlineCode, $row['AirlineCode']);
        }
        return $airlineCode;
    }

    public function queryAirports()
    {
        $resAirport = $this->execCommand("select AirportCode from `Airport`");
        $airportCode = array();
        foreach ($resAirport as $row) {
            array_push($airportCode, $row['AirportCode']);
        }
        return $airportCode;
    }

    public function queryAvailableSeatsOnOneDay($day)
    {
        $resSeats = $this->execCommand("select `Flight`.`AvailableSeats` from `Flight`, `DayForFlight` where `DayForFlight`.`FlightDay` = '$day' and `Flight`.`FlightNumber` = `DayForFlight`.`FlightNumber`");
        $seats = 0;
        $i = 0;
        foreach ($resSeats as $row) {
            $seats += $row['AvailableSeats'];
            $i++;
        }
        if ($i == 0) {
            return -1;
        } else {
            return $seats / $i;
        }
    }

    public function addFlight(
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
    ) {
        $this->execCommand("
insert into `Flight` (
        FlightNumber,
        AirlineCode,
        DepartAirportCode,
        ArriveAirportCode,
        FlightDepartActualTime,
        FlightDepartScheduledTime,
        FlightArrivesActualTime,
        FlightArrivesScheduledTime,
        AvailableSeats
) values (
        '$FlightNumber',
        '$AirlineCode',
        '$DepartAirportCode',
        '$ArriveAirportCode',
        '$FlightDepartActualTime',
        '$FlightDepartScheduledTime',
        '$FlightArrivesActualTime',
        '$FlightArrivesScheduledTime',
        '$AvailableSeats'
)
");
        $this->execCommand("insert into `DayForFlight` (FlightNumber, FlightDay) values ('$FlightNumber', '$FlightDay')");
    }
    public function modifyDepartActualTime($realTime, $FlightNumber)
    {
        $this->execCommand("update `Flight` set `FlightDepartActualTime` = '" . $realTime . "' where `FlightNumber` = '" . $FlightNumber . "'");
    }
}
