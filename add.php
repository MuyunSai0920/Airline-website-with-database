<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Add Flights</title>
</head>

<body>
    <img src="img/logo.png" alt="logo" width="1000" /><br />
    <h1>Flight Query System</h1>
    <ul>
        <li><a href="airline.php">All Flights</a></li>
        <li><a href="filter.php">Find Flights</a></li>
        <li><a href="add.php">Add Flights</a></li>
        <li><a href="seats.php">See the Seats</a></li>
    </ul>
    <h2>Add Flights:</h2>
    <div>
        <form action="action/add.php" method="post" accept-charset="utf-8">
            <?php
            require 'util/daos.php';
            $dao = new Dao();

            $airlineCodes = $dao->queryAirlines();
            $airportCodes = $dao->queryAirports();

            ?>
            Flight Number: <input type="text" placeholder="" name="FlightNumber" id="FlightNumber" /><br />
            Airline Code:
            <select id="AirlineCode" name="AirlineCode">
                <?php
                foreach ($airlineCodes as $airline) {
                    echo "<option value='$airline'>$airline</option>";
                }
                ?>
            </select><br />
            Depart Airport Code:
            <select id="DepartAirportCode" name="DepartAirportCode">
                <?php
                foreach ($airportCodes as $airport) {
                    echo "<option value='$airport'>$airport</option>";
                }
                ?>
            </select><br />
            Arrive Airport Code:
            <select id="ArriveAirportCode" name="ArriveAirportCode">
                <?php
                foreach ($airportCodes as $airport) {
                    echo "<option value='$airport'>$airport</option>";
                }
                ?>
            </select><br />
            Flight Day: <input type="text" placeholder="format:2020-01-01" name="FlightDay" id="FlightDay" /><br />
            Flight Depart Actual Time: <input type="text" placeholder="format:10:00:00" name="FlightDepartActualTime" id="FlightDepartActualTime" /><br />
            Flight Depart Schedule Time: <input type="text" placeholder="format:10:00:00" name="FlightDepartScheduledTime" id="FlightDepartScheduledTime" /><br />
            Flight Arrives Actual Time: <input type="text" placeholder="format:10:00:00" name="FlightArrivesActualTime" id="FlightArrivesActualTime" /><br />
            Flight Arrives Schedule Time: <input type="text" placeholder="format:10:00:00" name="FlightArrivesScheduledTime" id="FlightArrivesScheduledTime" /><br />
            Available Seats: <input type="text" name="AvailableSeats" id="AvailableSeats" /><br />
            <input type="submit" value="submit" />
            <input type="reset" value="reset" />
        </form>
    </div>
</body>

</html>
