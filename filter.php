<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Find Flights</title>
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
    <h2>All Flights:</h2>
    <div id="filter">
        <form action="filter.php" method="get" accept-charset="utf-8">
            filter:
            <input type="text" placeholder="airline code" name="airline_code" id="airline_code_input" />
            <input type="text" placeholder="day (format:2020-01-01)" name="day" id="day" />
            <input type="submit" value="search" />

            <div>
                <table border="1">
                    <tr>
                        <th>Flight Number</th>
                        <th>Flight Depart City</th>
                        <th>Flight Arrive City</th>
                    </tr>
                    <?php
                    require 'util/daos.php';

                    if ($_GET['airline_code'] == '') {
                        return;
                    }
                    $dao = new Dao();
                    $day = $_GET['day'];
                    if (!preg_match("/^[0-9][0-9][0-9][0-9]\-[0-9][0-9]\-[0-9][0-9]$/", $day)) {
                        echo '<script type="text/javascript">alert("Ops! It seems that you have input a wrong format!")</script>';
                        return;
                    }
                    $flightArray = $dao->queryByDayAndAirline($day, $_GET['airline_code']);
                    if (sizeof($flightArray) == 0) {
                        echo '</table><div id = "ops"><img src="img/nothing.png" height="300"/><br/>Ops! There is nothing find here!</div>';
                        return;
                    }
                    foreach ($flightArray as $flight) {
                        echo "<tr>";
                        echo "<th>";
                        echo $flight->FlightNumber;
                        echo "</th>";
                        echo "<th>";
                        echo $flight->DepartCity;
                        echo "</th>";
                        echo "<th>";
                        echo $flight->ArriveCity;
                        echo "</th>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </form>
    </div>
</body>

</html>
