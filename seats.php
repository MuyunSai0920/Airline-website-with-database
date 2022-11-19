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
    <h2>See the Seats:</h2>
    <div>
        <form action="seats.php" method="get" accept-charset="utf-8">
            Input a day to see the seats:
            <input type="text" placeholder="day (format:2020-01-01)" name="day" id="day" />
            <input type="submit" value="submit" />

            <div>
                <?php
                require 'util/daos.php';
                $dao = new Dao();
                if ($_GET['day'] == '') {
                    return;
                }

                $day = $_GET['day'];
                if (!preg_match("/^[0-9][0-9][0-9][0-9]\-[0-9][0-9]\-[0-9][0-9]$/", $day)) {
                    echo '<script type="text/javascript">alert("Ops! It seems that you have input a wrong format!")</script>';
                    return;
                }
                $seats = $dao->queryAvailableSeatsOnOneDay($day);
                if ($seats == -1) {
                    echo '</table><div id = "ops"><img src="img/nothing.png" height="300"/><br/>Ops! There is no flight at ' . $day . '</div>';
                    return;
                }
                echo "<span style='font-weight:bold;'>Average Seats on $day is: $seats</span>"
                ?>
            </div>
        </form>
    </div>
</body>

</html>
