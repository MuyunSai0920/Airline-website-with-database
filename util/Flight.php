<?php
class Flight
{
    // All of them are string
    var $FlightNumber;
    var $AirlineCode;
    var $AirplaneID;
    var $FlightDepartActualTime;
    var $FlightDepartScheduleTime;
    var $FlightArrivesActualTime;
    var $FlightArrivesScheduledTime;

    var $DepartCity;
    var $ArriveCity;

    var $FlightDay;

    public function __construct($paramArray)
    {
        // FlightCode; Times
        if (sizeof($paramArray) == 5) {
            $this->__construct1($paramArray[0], $paramArray[1], $paramArray[2], $paramArray[3], $paramArray[4]);
        }
        // FlightCode; Cities
        if (sizeof($paramArray) == 3) {
            $this->__construct2($paramArray[0], $paramArray[1], $paramArray[2]);
        }
    }

    private function __construct1($FlightNumber, $FlightDepartActualTime, $FlightDepartScheduleTime, $FlightArrivesActualTime, $FlightArrivesScheduledTime)
    {
        $this->FlightNumber = $FlightNumber;
        $this->FlightDepartActualTime = $FlightDepartActualTime;
        $this->FlightDepartScheduleTime = $FlightDepartScheduleTime;
        $this->FlightArrivesActualTime = $FlightArrivesActualTime;
        $this->FlightArrivesScheduledTime = $FlightArrivesScheduledTime;
    }

    private function __construct2($FlightNumber, $DepartCity, $ArriveCity)
    {
        $this->FlightNumber = $FlightNumber;
        $this->DepartCity = $DepartCity;
        $this->ArriveCity = $ArriveCity;
    }
}
