<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>airline</title>
    <style type="text/css">
    </style>
    <script type="text/javascript">
        function show(index) {
            var modify = document.getElementById("modify_" + index);
            modify.style.display = 'unset';
        }
    </script>
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
    <h2>Find Flights:</h2>
    <div>
        <table border="1">
            <tr>
                <th>Flight Number</th>
                <th>Flight Depart Actual Time</th>
                <th>Flight Depart Scheduled Time</th>
                <th>Flight Arrives Actual Time</th>
                <th>Flight Arrives Scheduled Time</th>
            </tr>
            <?php
            require 'util/daos.php';

            $dao = new Dao();
            $flightArray = $dao->queryAllFlights();
            $i = 0;
            foreach ($flightArray as $flight) {
                $i++;
                echo "<tr>";
                echo "<th>";
                echo $flight->FlightNumber;
                echo "</th>";
                echo "<th>";
                echo $flight->FlightDepartActualTime;
            ?>
                <img src="img/modify.png" height="20" onclick="show(<?php echo "$i" ?>)" />
                <div style="display: none;" id="modify_<?php echo "$i" ?>">
                    <form action="action/modify.php" method="get" accept-charset="utf-8">
                        <input type="text" id="time" name="time" placeholder="actual time (format: 10:00:00)" /><br />
                        <input type="text" id="FlightNumber" name="FlightNumber" value="<?php echo "$flight->FlightNumber" ?>" /><br />
                        <input type="submit" value="submit" />
                    </form>
                </div>
            <?php
                echo "</th>";
                echo "<th>";
                echo $flight->FlightDepartScheduleTime;
                echo "</th>";
                echo "<th>";
                echo $flight->FlightArrivesActualTime;
                echo "</th>";
                echo "<th>";
                echo $flight->FlightArrivesScheduledTime;
                echo "</th>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>
